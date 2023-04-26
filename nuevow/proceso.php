<?php  session_start();

require ('config.php');

?> 

<!DOCTYPE HTML>
  <html>
  <head>
      <meta charset="UTF-8">
      <title>Incoming Inspection</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="styles.css">
  </head>   

<?php   /* AQUI SE MUESTRA UN MENU DIFERENTE DEPENDIENDO DEL NIVEL DE USUARIO. */ 

   if (isset($_SESSION['level']) and $_SESSION['level']=='Administrator') {   ?>   
          <div class="menux">
                <a class="menu" href="index.php" >New Request</a>
                <a class="menu" href="info.php">Info</a>
                <a class="menu" href="users.php">Admin</a>
                <a class="menu" href="metrics.php">Metrics</a>
                <a class="logout" href="logout.php">Logout</a>
          </div> 
      <?php } else { ?>
          <div class="menux">
              <a class="menu" href="index.php" >New Request</a>
              <a class="menu" href="info.php">Info</a>
              <a class="logout" href="logout.php">Logout</a>
          </div> 
      <?php } // FIN DEL MENU // ?>

 <?php

echo "<div style='width:80%;background:transparent;
            text-align:center;position:absolute;top:20%;left:5%;padding:30px;color:yellow;
            border-radius:20px;border:double;border-color:yellow'>";

    if (isset($_GET['idx'])) {
          $idx=$_GET['idx'];

        if (isset($_GET['order'])) {
          
          $order=$_GET['order'];
          $sql= "SELECT acceptedBy,dateAccepted FROM orders WHERE id='$order' AND acceptedBy<>'' OR acceptedBy<>NULL";
          $result = mysqli_query($conn, $sql);
          $total = mysqli_num_rows($result);
            
          if ($total>0) {

            $row = mysqli_fetch_row($result);
            $inspector= inspectorx($conn, $row[0]);
            echo " <div class='mensajes'> Sorry ". $inspector ." <br> has taken this order before you at <br> $row[1] </div>";

          }else{
            $ahora = date("Y-m-d H:i:s"); 
            $sql= "UPDATE orders SET acceptedBy='$idx', dateAccepted='$ahora' WHERE id='$order'";
            mysqli_query($conn, $sql);
            echo " <div class='mensajes'> You have taken this order successfully </div>" ;
          }

        } else {
          $order="";
        }

        if (isset($_GET['orderx']) and isset($_GET['idx'])) {
          
          $orderx=$_GET['orderx'];  $idx=$_GET['idx'];
          echo " <div class='mensajes'>Order No: ".$orderx."</div>" ;
      
            $sql= "SELECT acceptedBy,dateAccepted,here_or_coming FROM orders WHERE id='$orderx' AND acceptedBy<>'' OR acceptedBy<>NULL";
            $result = mysqli_query($conn, $sql);
            $total = mysqli_num_rows($result);

            $row = mysqli_fetch_row($result);

          if ($total>0) {
            
            $inspector= inspectorx($conn, $row[0]);
            echo " <div class='mensajes'> Sorry ". $inspector ." <br> has taken this order before you at <br> $row[1] </div>";

          }else{

              $sql= "SELECT here_or_coming FROM orders WHERE id='$orderx'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_row($result);

            if ($row[0]=="coming") {
              echo " <div class='mensajes'> This order has not arrived yet</div>" ;
            } else {
              $ahora = date("Y-m-d H:i:s"); 
              $sql= "UPDATE orders SET acceptedBy='$idx', dateAccepted='$ahora' WHERE id='$orderx'";
              mysqli_query($conn, $sql);
              echo " <div class='mensajes'> You have taken this order successfully </div>" ;
            }
            
          }

        } else {
          $orderx="";
        }

    }

    if (isset($_GET['orderx']) and isset($_GET['idx2'])) {
      
        $orderx=$_GET['orderx'];  
        $sql= "UPDATE orders SET here_or_coming='here' WHERE id='$orderx'";
        mysqli_query($conn, $sql);
        echo " <div class='mensajes'> You have updated this order successfully</div>" ;
    } else {
        $orderx="";
    }

echo "</div>";
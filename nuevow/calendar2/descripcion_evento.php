<?php

    

    include '../config.php'; 

    include 'funciones.php';


    if (isset($_GET['idx'])) {
        $id  = evaluar($_GET['idx']);
    } else {
        $id  = evaluar($_GET['id']);
    }
    

    $bd  = $conexion->query("SELECT * FROM agenda2 WHERE id=$id");

    $row = $bd->fetch_assoc();

    if (isset($row['title']) or isset($row['title2']) or isset($row['title3']) or isset($row['title4']) 
            or isset($row['title5']) or isset($row['title6']) or isset($row['title7']) or isset($row['title8']) 
                or isset($row['title9']) or isset($row['title10']) or isset($row['title11']) 
                or isset($row['title12']) or isset($row['title13']) or isset($row['title14'])) {

                $titulo=$row['title'];
                $titulo2=$row['title2'];
                $titulo3=$row['title3'];
                $titulo4=$row['title4'];
                $titulo5=$row['title5'];
                $titulo6=$row['title6'];
                $titulo7=$row['title7'];
                $titulo8=$row['title8'];
                $titulo9=$row['title9'];
                $titulo10=$row['title10'];
                $titulo11=$row['title11'];
                $titulo12=$row['title12'];
                $titulo13=$row['title13'];
                $titulo14=$row['title14'];

                $evento=$row['body'];
                $inicio=$row['inicio_normal'];

                /* $final=$row['final_normal']; */

            if (isset($_POST['Delete_evento'])) 
            {
                $id  = evaluar($_GET['id']);
                $sql = "DELETE FROM agenda2 WHERE id = $id";
                if ($conexion->query($sql)) 
                {
                    echo "Event removed";
                    
                }
                else
                {
                    echo "<h1>The event could not be deleted</h1>";
                }
            }

        } else {
            echo "<h1>This event is already deleted.</h1>";
        }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$titulo?></title>
          <link rel="stylesheet" type="text/css" href="<?=$base_url2?>css/bootstrap.min.css">
</head>
<body>

  <?php 

    if (isset($row['title']) or isset($row['title2']) or isset($row['title3']) or isset($row['title4']) 
            or isset($row['title5']) or isset($row['title6']) or isset($row['title7']) or isset($row['title8']) 
            or isset($row['title9']) or isset($row['title10']) or isset($row['title11']) 
            or isset($row['title12']) or isset($row['title13']) or isset($row['title14'])) { ?>
        <div id="infox">

                <table style="width:80%;margin-left:7%">
                    <tr> <td>
                        <?php if ($titulo<>"") { ?> <span style="background-color:aqua;padding:0.5rem"><?=$titulo?></span><br><br> <?php } 
                        if ($titulo2<>"") { ?> <span style="background-color:cornflowerblue;padding:0.5rem"><?=$titulo2?></span><br><br> <?php } 
                        if ($titulo3<>"") { ?> <span style="background-color:greenyellow;padding:0.5rem"><?=$titulo3?></span><br><br> <?php } 
                        if ($titulo4<>"") { ?> <span style="background-color:darksalmon;padding:0.5rem"><?=$titulo4?></span><br><br> <?php } 
                        if ($titulo5<>"") { ?> <span style="background-color:rgb(228, 218, 77);padding:0.5rem"><?=$titulo5?></span><br><br> <?php } 
                        if ($titulo6<>"") { ?> <span style="background-color:rgb(220, 110, 235);padding:0.5rem"><?=$titulo6?></span><br><br> <?php } ?>
                    </td><td>
                    <?php if ($titulo7<>"") { ?> <span style="background-color:rgb(47, 127, 138);padding:0.5rem"><?=$titulo7?></span><br><br> <?php } 
                        if ($titulo8<>"") { ?> <span style="background-color:rgb(231, 142, 169);padding:0.5rem"><?=$titulo8?></span><br><br> <?php } 
                        if ($titulo9<>"") { ?> <span style="background-color:rgb(69, 167, 77);padding:0.5rem"><?=$titulo9?></span><br><br> <?php } 
                        if ($titulo10<>"") { ?> <span style="background-color:rgb(196, 196, 224);padding:0.5rem"><?=$titulo10?></span><br><br> <?php } 
                        if ($titulo11<>"") { ?> <span style="background-color:rgb(239, 154, 247);padding:0.5rem"><?=$titulo11?></span><br><br> <?php } 
                        if ($titulo12<>"") { ?> <span style="background-color:rgb(75, 235, 75);padding:0.5rem"><?=$titulo12?></span><br><br> <?php } 
                        if ($titulo13<>"") { ?> <span style="background-color:rgb(124, 145, 238);padding:0.5rem"><?=$titulo13?></span><br><br> <?php } 
                        if ($titulo14<>"") { ?> <span style="background-color:rgb(243, 235, 129);padding:0.5rem"><?=$titulo14?></span><br><br> <?php } 
                        
                        ?>
                    </td> </tr>
                </table>
 
                <?php if (isset($_GET['id'])) { ?>
                        <hr>
                        <b>Start date:</b> <?=$inicio?> <br>
                        <b>Comments:</b><p><?=$evento?></p>
                <?php }  ?>
     
                <form id='eliminarx' action="" method="post">
                    <div class="modal-footer">
                        <button type="submit"  onclick="eliminaw()" class="btn btn-danger"  name="Delete_evento">Delete</button>
                    </div>
                </form>

        </div>
      
    <?php } ?>       

</body>

    <script>

        function eliminaw(){
            document.getElementById("infox").style.display ="none";
            document.getElementById("eliminarx").submit();
        }


    </script>

</html>

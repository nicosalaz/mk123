<?php

    

    include '../config.php'; 

    include 'funciones.php';


    if (isset($_GET['idx'])) {
        $id  = evaluar($_GET['idx']);
    } else {
        $id  = evaluar($_GET['id']);
    }
    

    $bd  = $conexion->query("SELECT * FROM agenda WHERE id=$id");

    $row = $bd->fetch_assoc();

    if (isset($row['title']) or isset($row['title2']) or isset($row['title3']) or isset($row['title4'])) {
        $titulo=$row['title'];
        $titulo2=$row['title2'];
        $titulo3=$row['title3'];
        $titulo4=$row['title4'];
        $evento=$row['body'];
        $inicio=$row['inicio_normal'];
        /* $final=$row['final_normal']; */
    
        if (isset($_POST['Delete_evento'])) {
            $id  = evaluar($_GET['id']);
            $sql = "DELETE FROM agenda WHERE id = $id";
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
          <link rel="stylesheet" type="text/css" href="<?=$base_url?>css/bootstrap.min.css">
</head>
<body>
    
     <?php

    if (isset($row['title']) or isset($row['title2']) or isset($row['title3']) or isset($row['title4'])) { ?>
            <div id="infox">
                
                <table style="width:80%;margin-left:7%">
                    <tr> <td>
                        <?php if ($titulo<>"") { ?> <span style="background-color:aqua;padding:0.5rem"><?=$titulo?></span><br><br> <?php } 
                        if ($titulo2<>"") { ?> <span style="background-color:cornflowerblue;padding:0.5rem"><?=$titulo2?></span><br><br> <?php } 
                        if ($titulo3<>"") { ?> <span style="background-color:greenyellow;padding:0.5rem"><?=$titulo3?></span><br><br> <?php } 
                        if ($titulo4<>"") { ?> <span style="background-color:darksalmon;padding:0.5rem"><?=$titulo4?></span><br><br> <?php } ?>
                    </td> </tr>
                </table>
            
            <?php  
                if (isset($_GET['id'])) { ?>
                    <hr>
                    <b>Start date:</b> <?=$inicio?> <br>
                    <b>Comments:.</b><p><?=$evento?></p>
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

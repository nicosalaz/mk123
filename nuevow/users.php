<?php  session_start();
      $valido="si";
    if (isset($_SESSION['level']) and $_SESSION['level']<>"administrator") {
      echo "<h2 style='width:100%;text-align:center;margin-top:5rem'>This function is only for Administrator Level</h2>";
        $valido="no";
    } 


?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Employee Timecard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="stylesheets/globals.css">
    <link rel="stylesheet" href="stylesheets/typography.css">
    <link rel="stylesheet" href="stylesheets/grid.css">
    <link rel="stylesheet" href="stylesheets/ui.css">
    <link rel="stylesheet" href="stylesheets/forms.css">
    <link rel="stylesheet" href="stylesheets/orbit.css">
    <link rel="stylesheet" href="stylesheets/reveal.css">
    <link rel="stylesheet" href="stylesheets/mobile.css">
    <link rel="stylesheet" href="stylesheets/app.css">
    <link rel="stylesheet" href="responsive-tables.css">
    
    <script src="javascripts/jquery.min.js"></script>
    <script src="responsive-tables.js"></script>


</head>

<?php

    if (!isset($_SESSION['username'])) {
            
        header('Location: login.php'); 

      } else {

          require ('config.php'); 

      if(isset($_POST["usuario"])) {

          if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"]) &&
          preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario"]) &&
          preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])){

              $encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

              $datos = array("nombre" => $_POST["nombre"],
                          "usuario" => $_POST["usuario"],
                          "password" => $encriptar,
                          "levelPerfil" => $_POST["levelPerfil"],
                          "email" => $_POST["email"]);

                  $nombre= $datos["nombre"]; $usuario= $datos["usuario"];
                  $password= $datos["password"]; $levelPerfil= $datos["levelPerfil"];
                  $email= $datos["email"];
              
                    $sql="INSERT INTO users (nombre, usuario, pass, levelPerfil, email) 
                    VALUES ('$nombre', '$usuario', '$password', '$levelPerfil', '$email')";			
 
                  $stmt = conectar()->prepare($sql);
          
                  if($stmt->execute()){   
                      echo '<script> alert("¡The user has been saved correctly!"); </script>';
                  }else{
                      echo '<script> alert("Something wrong"); </script>';
                  }
          
                  /*  $stmt->close();   $stmt = null; */
              }else{

                  echo '<script> window.location = "usuarios"; </script>';

              }

          }

       }  

      if ($valido=="si") {
        

      
      ?>


      <div class="container" id="modalAddUsuario" style="width:20rem;text-align:center">

          <form role="form" method="post" enctype="multipart/form-data">

                <h2 class="section-heading">Add User</h2>
   
              <button type="button" class="close" data-dismiss="modal" onclick=modalAddUsuario.style.display='none'>&times;</button>

              <p> <span style='width:20rem'>Name </span> 
                <span> 
                  <input type="text" name="nombre" id="nombre" required/>          
                </span> 
              </p>
              <p> <span style='width:20rem'>Username </span> 
                <span> 
                  <input type="text" name="usuario" id="usuario" required/>          
                </span> 
              </p>
              <p> <span style='width:20rem'>Password </span> 
                <span> 
                  <input type="text" name="password" id="password" required/>          
                </span> 
              </p>
              <p> <span style='width:20rem'>Email </span> 
                <span> 
                  <input type="text" name="email" id="email" required/>          
                </span> 
              </p>
              <p> <span style='width:20rem'>Level Perfil</span> 
                <span> 
                    <select id="levelPerfil" name="levelPerfil" style="margin-left:10%;width:80%" required>
                      <option value="">Select Profile</option>
                      <option value="administrator">Administrator</option>
                      <option value="supervisor">Supervisor</option>
                      <option value="operator">Operator</option>
                    </select>
                </span> 
              </p>
              <p>
                <span> 
                <button type="submit" class="btn btn-warning">Save</button>        
                </span> 
              </p>
          </form>
      </div>

          <?php   
          
              $sql= "SELECT * FROM users";
              $result = mysqli_query($conn, $sql);
              $totusers = mysqli_num_rows($result);

          ?>

                <div class="container" style="margin:2rem">
                      <br>
                  <table class="responsive" style="margin:5rem">
                      <thead>
                        <tr><th colspan="4"> 
                        
                          <input style='margin-left:50%' type="button" value='Add User'
                                  class='btn btn-primary' onclick=modalAddUsuario.style.display='block'>
                        
                      <thead>
                        <tr>
                          <th class="titulox2" style='width:30%'>Name</th>
                          <th class="titulox2">User Name</th>
                          <th class="titulox2">Level Profile</th>
                          <th class="titulox2">Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  if ($totusers>0) {

                            while($fila = mysqli_fetch_array($result) ){
                        
                                $idx= $fila[0]; $nombre= $fila[1]; $usuario= $fila[2]; $levelPerfil= $fila[4]; $email= $fila[5];   

                                echo "<tr>
                                      <th style='width:30%'>$nombre</th>
                                      <td style='width:20%'>$usuario</td>
                                      <td style='width:20%'>$levelPerfil</td>
                                      <td>$email</td>
                                    </tr>";            
                            } 
                        }   ?>

                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan='4' style='text-align:center'>  </td>
                        </tr>
                      </tfoot>
                  </table> <br>
                </div>

  <?php } ?>



    


<?php  session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--build:css css/styles.min.css-->
    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
        integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylesheets/globals.css">
    <link rel="stylesheet" href="stylesheets/app.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>


    <?php  require 'config.php';

$mensaje="";

    if(isset($_POST['userx']) and isset($_POST['passwordx'])) {
        $user= $_POST['userx']; 
        
        $password = crypt($_POST["passwordx"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        $sql= "SELECT * FROM users WHERE usuario='$user' AND pass='$password'";
        $result = mysqli_query($conn, $sql);
        $total = mysqli_num_rows($result);

        if ($total>0) {
            $row = mysqli_fetch_row($result);
            $_SESSION['username']=$user;
            $_SESSION['iduser']= $row[0];
            $_SESSION['level']= $row[4];
            $mensaje .= "<li>welcome ".$_SESSION['level']."</li>";
            echo "<script languaje='javascript'>window.parent.location.reload();</script>";           
        }  else {
          $mensaje .= "<h2>This Username is not Registered <br> Please Try Again  </h2>";
        }

    }

echo "<h2 style='width:100%;text-align:center'>".$mensaje."</h2>";

?>



    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <form class="bg-light p-5 rounded shadow" method="post" enctype="multipart/form-data"
                    action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <h2 class="section-heading text-center mb-4">Login</h2>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="userx" name="userx" placeholder="User" value=""
                            required>
                        <label for="userx">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="passwordx" name="passwordx"
                            placeholder="Password" value="" required>
                        <label for="passwordx">Password</label>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>
</body>

</html>
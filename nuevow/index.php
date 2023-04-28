<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en" xmlns:mso="urn:schemas-microsoft-com:office:office"
    xmlns:msdt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title></title>


    <!-- <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="stylesheets/globals.css">
    <link rel="stylesheet" href="stylesheets/typography.css">
    <link rel="stylesheet" href="stylesheets/grid.css">
    <link rel="stylesheet" href="stylesheets/ui.css">
    <link rel="stylesheet" href="stylesheets/forms.css">
    <link rel="stylesheet" href="stylesheets/orbit.css">
    <link rel="stylesheet" href="stylesheets/reveal.css">
    <link rel="stylesheet" href="stylesheets/mobile.css">
    <link rel="stylesheet" href="stylesheets/app.css">
    <link rel="stylesheet" href="responsive-tables.css">  -->
    <!-- Bootstrap CSS -->

    <script src="javascripts/jquery.min.js"></script>
    <script src="responsive-tables.js"></script>


</head>

<?php 

        $nivelx=""; $userx="";

      if (!isset($_SESSION['username']) OR !isset($_SESSION['level'])) {
        echo "<body onload=go_section('section-4')>";
      }else if (isset($_GET['opc']) and !isset($_GET['lotn'])) {
        $nivelx=$_SESSION['level']; $userx=$_SESSION['username'];
        $opc= $_GET['opc']; $lotn='sintotal';
        echo "<body onload=go_section('$opc')>";
      } else if (isset($_GET['opc']) and isset($_GET['lotn'])){
        $nivelx=$_SESSION['level']; $userx=$_SESSION['username'];
        $opc= $_GET['opc']; $lotn=$_GET['lotn'];
        echo "<body onload=go_section('$opc'),cerrarsection()>";
      } else{
        $nivelx=$_SESSION['level']; $userx=$_SESSION['username'];
        $lotn='sintotal';
        echo "<body onload=go_section('section-2'),cerrarsection()>";
      }

      include 'funciones.php';
      require 'config.php';
      
  ?>

<style>
.cursor-pointer {
    cursor: pointer;
}
</style>


</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav  w-100  d-flex justify-content-around align-items-center ">

                    <li class="p-0 m-0 cursor-pointer">
                        <a class="navbar-brand" href="#">Mkdir</a>
                    </li>

                    <li class="nav-item p-0 m-0 cursor-pointer">
                        <a class="nav-link" onclick="go_section('section-5')">Equipment Cleaning</a>
                    </li>
                    <li class="nav-item p-0 m-0 cursor-pointer">
                        <a class="nav-link" onclick="go_section('section-1')">Cleaning Room</a>
                    </li>
                    <li class="nav-item p-0 m-0 cursor-pointer">
                        <a class="nav-link" onclick="go_section('section-2')">Filling Process</a>
                    </li>
                    <li class="nav-item p-0 m-0 cursor-pointer">
                        <a class="nav-link" onclick="go_section('section-3')">Filling Daily</a>
                    </li>
                    <li class="nav-item dropdown p-0 m-0 cursor-pointer">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" onclick="go_section('section-4')">Login</a></li>
                            <li><a class="dropdown-item" onclick="go_section('section-6')">Users</a></li>
                            <li><a class="dropdown-item" onclick="go_section('logout')">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Section 1 -->
    <!-- <nav class="navbar center">
        <a class="navbar-link" onclick="go_section('section-5')">Equipment Cleaning</a>
        <a class="navbar-link" onclick="go_section('section-1')">Cleaning Room</a>
        <a class="navbar-link" onclick="go_section('section-2')">Filling Process</a>
        <a class="navbar-link" onclick="go_section('section-3')">Filling Daily</a>
        <a class="navbar-link" onclick="go_section('section-4')">Login</a>
      </nav> -->

    <input type="hidden" name="concolor" id="concolor">

    <div><?php echo  $nivelx."  -  ".$userx ?></div>

    <input type="hidden" name="opcionx" id="opcionx" value="home">


    <section class="section-1 center" id="section-5" style="display: none;">

        <iframe src="calendar2" frameborder="0" width="110%" height="1000"></iframe>

    </section>


    <section class="section-1 center" id="section-1" style="display: none;">

        <iframe src="calendar" frameborder="0" width="110%" height="1000"></iframe>

    </section>


    <?php   


    $sqlz= "SELECT * FROM problems_process";
    $result3 = mysqli_query($conn, $sqlz);
    if ($result3) {
      if (mysqli_num_rows($result3)) {
                  
          while($row3 = mysqli_fetch_array($result3) ){ 
                
              $sqlzb= "SELECT nombre FROM users WHERE id='".$row3['usuario']."'";
              $resultb = mysqli_query($conn, $sqlzb);
              if (mysqli_num_rows($resultb)) {
                  $row = mysqli_fetch_assoc($resultb);
                  $usuario= $row['nombre'];  
                  $datosx[$row3['id']]['user']=$usuario;
                  $datosx[$row3['id']]['fecha']=$row3['fecha'];
                  $datosx[$row3['id']]['hora']=$row3['hora'];
                  $datosx[$row3['id']]['valor']=$row3['valor'];
                  $datosx[$row3['id']]['problem']=$row3['problem'];
                  $datosx[$row3['id']]['color']=$row3['color'];
                  
              }
                           
          }
        }
      }


?>

    <!-- 
       <div class="hide" id="rmenu">
  <ol>
    <li style="background:black">
      <a onclick="go_section('section-2b')" style='font-size:2rem;color:black;margin-left:1rem'>Add Process</a>
    </li>
  </ol>
</div>

  <div class="hide" id="rmenu2" style="display:none;">
      <a onclick="go_section('section-2c')" style='font-size:2rem;color:black;margin-left:1rem'>Add Process Status.</a>
      <hr>
      <div id='salidaMensaje' style="background:white;color:black;padding:0.2rem;display:block"></div>
  </div>

  <div class="hide" id="rmenu3">
      <a onclick="go_section('section-2c')" style='font-size:2rem;color:black;margin-left:1rem'>Add Process Status</a>
      <hr>
      <div id='salidaMensaje2' style="background:white;color:black;padding:0.2rem;display:block"></div>
  </div>   -->


    <!-- Section 2 -->
    <section class="section-2 container-fluid d-flex flex-column text-center" style="" id="section-2" style="display: none;">
        <?php echo $nivelx. " - " .$userx; ?>
        <div class="row" style="">
        <h1 class="section-heading section-2-heading">Filling Process</h1>
        </div>
        <div class="row align-self-center w-100 mt-1 mb-1">
            <div class="col-10 w-100">
                <button class="btn btn-primary" style="z-index: 5" data-bs-toggle="modal" data-bs-target="#modalAddProcess" onclick="go_section('section-2b')">
                    Add Process
                </button>
            </div> 
        </div>
        <select class="form-select mt-1 mb-5" name="savedx2" id="savedx2" onchange="verhistorico(opcionx.value,this.value)" style="width:15rem;align-self: center;">
            <option value=''></option>
            <?php  $sqlzb= "SELECT DISTINCT lot_number FROM process WHERE saved='SI'";
                  $resultb = mysqli_query($conn, $sqlzb);
                      while($rowx = mysqli_fetch_array($resultb) ){ 
                        $lotnumber= $rowx[0];
                        echo "<option value='$lotnumber'>$lotnumber</option>"; 
                    } ?>
            <option value='sintotal'>Current</option>

        </select>


        <div class="table-responsive">
            <table class="table table-bordered border-black">
                <thead class="bg-info h-auto">
                    <tr>
                        <th class="titulox2 p-0 m-0 align-middle">Start Date</th>
                        <th class="titulox2 p-0 m-0 align-middle">Lot Number</th>
                        <th class="titulox2 p-0 m-0 align-middle">Pick List</th>
                        <th class="titulox2 p-0 m-0 align-middle">Ware house</th>
                        <th class="titulox2 p-0 m-0 align-middle">Material Stage</th>
                        <th class="titulox2 p-0 m-0 align-middle">Room Clearence</th>
                        <th class="titulox2 p-0 m-0 align-middle">Balance Weight</th>
                        <th class="titulox2 p-0 m-0 align-middle">Visual Inspection</th>
                        <th class="titulox2 p-0 m-0 align-middle">Set-upLine</th>
                        <th class="titulox2 p-0 m-0 align-middle">Sub-divide</th>
                        <th class="titulox2 p-0 m-0 align-middle">Start-up Gravimetrics</th>
                        <th class="titulox2 p-0 m-0 align-middle">Challenges</th>
                        <th class="titulox2 p-0 m-0 align-middle">First Blister</th>
                        <th class="titulox2 p-0 m-0 align-middle">Counter</th>
                        <th class="titulox2 p-0 m-0 align-middle">Total Blister inShippers</th>
                        <th class="titulox2 p-0 m-0 align-middle">Reserve Release Samples</th>
                        <th class="titulox2 p-0 m-0 align-middle">Target Weight</th>
                        <th class="titulox2 p-0 m-0 align-middle">QC Sample</th>
                        <th class="titulox2 p-0 m-0 align-middle">Production Yield</th>
                        <th class="titulox2 p-0 m-0 align-middle">Process Yield</th>
                        <th class="titulox2 p-0 m-0 align-middle">End Date</th>

                    </tr>
                </thead>
                <tbody>

                    <?php 
           
           $sqlx= "SHOW COLUMNS FROM process;";     
           $resultx = mysqli_query($conn, $sqlx);
               $X=0;
           while($rowx = mysqli_fetch_assoc($resultx) ){ 
                $columna2[$X]=$rowx['Field'];
                $X++;
           }
           $totalfilas="0";

           if (isset($lotn) AND $lotn<> 'sintotal') {
            $sql= "SELECT * FROM process WHERE lot_number = '$lotn'";
            $result1 = mysqli_query($conn, $sql);
            $totalfilas = mysqli_num_rows($result1);
          } else if (isset($lotn) AND $lotn == 'sintotal') {
            $sql= "SELECT * FROM process WHERE saved <> 'SI' ORDER BY id DESC";
            $result1 = mysqli_query($conn, $sql);
            $totalfilas = mysqli_num_rows($result1);
          }

        
            if ($totalfilas>0) {
                        $j=0;
                while($fila = mysqli_fetch_array($result1) ){ 
                        $j++; $valor="";
                        $datex = date('m-d-Y', strtotime($fila[1]));
                        $start_date[$j] = $datex;
                        $lotnumber1[$j]= $fila[2]; ?>
                    <tr onmouseover="loteelegido('<?php echo $lotnumber1[$j] ?>')">
                        <td style='font-size:1.3rem'><?php echo $start_date[$j] ?></td>
                        <td><?php echo $lotnumber1[$j] ?></td>

                        <?php for ($i=3; $i < 21; $i++) { 
                      
                          if ($fila[$i]<>"") {  

                                  $celda=$fila[$i];  
                                if ( isset($datosx[$celda]['user']) ) {

                                      $user1=$datosx[$celda]['user'];
                                      $color1=$datosx[$celda]['color']; 
                                      $fecha1=$datosx[$celda]['fecha'];
                                      $hora1=$datosx[$celda]['hora'];
                                      $valor1=$datosx[$celda]['valor']; 
                                      $problem1=$datosx[$celda]['problem']; 
                                      /* $repaired1=$datosx[$celda]['repaired']; */ 
                                      $mensaje1=  "User: ".$user1."<br> Date: ".$fecha1."<br> Hour: ".$hora1."<br> Comment: ".$problem1; 

                                  } else {

                                    $user1=""; $color1=""; $fecha1=""; $hora1=""; $problem1=""; $repaired1="";  $mensaje1= "";
                                    
                                  }  
                                    $color2="white";

                                  if ($columna2[$i]=='counter') {  $color1="white"; $color2="black";}
                                  if ($columna2[$i]=='total_blister_in_shippers') {  $color1="white"; $color2="black";}
                                  if ($columna2[$i]=='reserve_release_samples') {   $color1="white"; $color2="black";}
                                  if ($columna2[$i]=='qc_sample') {   $color1="white"; $color2="black";}
                                  if ($columna2[$i]=='production_yield') {   $color1="white"; $color2="black";}
                                  if ($columna2[$i]=='process_yield') {   $color1="white"; $color2="black";}

                                if ($color1=="red") { ?>

                        <td style='background:red;color:<?php echo $color2?>;text-align:center'
                            onmouseover="showdatay('<?php echo $mensaje1 ?>'),celdaelegida('<?php echo $columna2[$i] ?>','<?php echo $color1 ?>')">
                            <?php echo $valor1 ?></td>

                        <?php } else {
                                     
                                     /* if ($columna2[$i]<>'counter' AND $columna2[$i]<>'total_blister_in_shippers'){ */ ?>

                        <td style='background:<?php echo $color1 ?>;color:<?php echo $color2?>;text-align:center'
                            onmouseover="showdatay('<?php echo $mensaje1 ?>'),celdaelegida('<?php echo $columna2[$i] ?>','<?php echo $color1 ?>')">
                            <?php echo $valor1 ?></td>

                        <?php /* }  else { */ ?>
                        <!-- <td style='background:<?php echo $color1 ?>;color:<?php echo $color2?>;text-align:center'><?php echo $valor1 ?></td> -->
                        <?php /* } */ 
                                  
                                } 
                                                                                          
                             } else {
                                     if ($fila[$i-1]=="") {
                                        $colorx="nocolor";
                                     } else {
                                        $colorx="white";
                                     }
                                     
                                ?><td
                            onmouseover="showdatay(''),celdaelegida('<?php echo $columna2[$i] ?>','<?php echo $colorx ?>')">
                        </td><?php 
                              
                              }

                          }
                                                                             
                            if ($fila['end_date']<= "1900-01-01") {
                               
                                if ($fila[$i-1]<>"") { ?>

                        <td> <button style='padding:5px;color:red' onclick="finalizar('<?php echo $lotnumber1[$j] ?>')">
                                End </button> </td>
                        <?php } else { ?>
                        <td> </td>
                        <?php  }  echo "</tr>";

                            } else {
                              
                                  $fechafin = date('m-d-Y', strtotime($fila['end_date']));
                                  echo "<td> $fechafin </td></tr>";
                            }
                            

                      } ?>

                        <?php }
                
                ?>
                <tbody>
            </table>
        </div>

    </section>

    <!-- Section 3 -->
    <section class="section-2" id="section-3" style="display: none;">

        <iframe name="fillingdaily" src="daily.php" scrolling="no" frameborder="0" width="100%" height="5000"></iframe>

    </section>
    <!-- End of Section 3 -->

    <!-- Section 4 -->
    <!-- <section class="section-2b" id="section-2b" style="display:none">
        <button class="botonx" style="margin-left:50%" onclick="cerrarsection()">X</button>
        <h2 class="section-heading ">Add Process</h2>
        <div class="container">
            <form class="contact-form center" id="f_filling1" method="post" action="consultas.php"
                enctype="multipart/form-data" target="consultasx">
                <input type="hidden" name="filling1" id="filling1" value='X' />
                <input type="text" placeholder="Lot Number" name="lot_number1" id="lot_number1" />
                <input type="button" value="Submit" class="contact-form-btn"
                    onclick="enviarform('f_filling1','section-2')" />
            </form>
        </div>
    </section> -->
    <!-- modal add process -->
    <div class="modal fade" id="modalAddProcess" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Process</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="contact-form center" id="f_filling1" method="post" action="consultas.php"
                    enctype="multipart/form-data" target="consultasx">
                    <input class="form-control" type="hidden" name="filling1" id="filling1" value="X" />
                    <label class="form-label" for="lot_number1">Lot Number</label>
                    <input class="form-control" type="text" placeholder="Lot Number" name="lot_number1" id="lot_number1" />
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="enviarform('f_filling1','section-2')">Submit</button>
            </div>
          </div>
        </div>
      </div>

    <section class="section-2c" id="section-2c" style="display:none">
        <button class="botonx" style="margin-left:50%" onclick="cerrarsection()">X</button>
        <h2 class="section-heading">Add Process Status</h2>
        <div class="container">
            <form class="contact-form center" id="f_filling4" method="post" action="consultas.php"
                enctype="multipart/form-data" target="consultasx">
                <input type="hidden" name="filling4" id="filling4" value='X' />
                <!-- <div style="border:none"> -->
                <p> <span> Lot Number </span> <br>
                    <span>
                        <input type="text" name="lot_number4" id="lot_number4" readonly />
                    </span>
                </p>
                <p> <span> Cell </span> <br>
                    <span>
                        <input type="text" name="cell4" id="cell4" input-lg" readonly />
                    </span>
                </p>
                <p id="colorx2">
                    <span> Color </span> <br>
                    <span>
                        <select name="color4" id="color4">
                            <option value="green" style='background:green'>Green</option>
                            <option value="yellow" style='background:yellow'>Yellow</option>
                            <option value="red" style='background:red'>Red</option>
                        </select>
                    </span>
                </p>

                <p id="valores"><span collspan> Value </span> <br>
                    <span>
                        <input type="text" placeholder="Value" name="valor" id="valor" />
                    </span>
                </p>

                <p><span collspan> Comments </span> <br>
                    <span>
                        <textarea placeholder="Comments" name="problem4" id="problem4" rows='3'></textarea>
                    </span>
                </p>
                <!-- </div> -->

                <input type="button" value="Submit" class="contact-form-btn"
                    onclick="enviarform('f_filling4','section-2')" />
            </form>
        </div>
    </section>

    <form id="finaliza" method="post" action="consultas.php" enctype="multipart/form-data" target="consultasx">
        <input type="hidden" name="lotnumber" id="lotnumber" style="font-size:10rem" />
    </form>

    <!-- ////////////////////////////////////////////  -->


    <!-- Section 4 -->
    <section class="section-4 " id="section-4" style="width:100vw;height:100vh">

        <div class="container-fluid    d-flex justify-content-center align-items-center">

            <iframe name="loginx" src="login.php" width="770" height="600"></iframe>

        </div>
    </section>
    <!-- End of Section 4 -->

    <!-- Section 6 -->
    <section class="section-6" id="section-6" style="display: none;">

        <div class="container">

            <iframe style="padding:2rem" name="usersx" src="users.php" scrolling="no" frameborder="0" width="770"
                height="400"></iframe>

        </div>
    </section>
    <!-- End of Section 6 -->


    <!-- <section class="section-7" id="section-7">    
       <div class="container">
         <iframe style="padding:2rem" name="logoutx" src="logout.php" scrolling="no" frameborder="0" width="600" height="500"></iframe>
       </div>
     </section> -->


    <iframe name="consultasx" src="consultas.php" frameborder="0" style="height:0.1rem"></iframe>

    <!-- Bootstrap JavaScript y dependencias -->



</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
</script>
<script src="script.js"></script>


<script src="contextmenu.js"></script>

<script>
function cerrarsection() {
    document.getElementById("section-2b").style.display = "none";
    document.getElementById("section-2c").style.display = "none";
    document.getElementById("section-2").style.display = "flex";
}
</script>

</html>
<?php  session_start(); ?>

<!DOCTYPE html>
<html lang="en" xmlns:mso="urn:schemas-microsoft-com:office:office"
  xmlns:msdt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title></title>
  <!-- <link rel="stylesheet" href="style.css" /> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <!-- <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    /> -->

  <!-- <link rel="stylesheet" href="stylesheets/globals.css">
  <link rel="stylesheet" href="stylesheets/typography.css">
  <link rel="stylesheet" href="stylesheets/grid.css">
  <link rel="stylesheet" href="stylesheets/ui.css">
  <link rel="stylesheet" href="stylesheets/forms.css">
  <link rel="stylesheet" href="stylesheets/orbit.css">
  <link rel="stylesheet" href="stylesheets/reveal.css">
  <link rel="stylesheet" href="stylesheets/mobile.css">
  <link rel="stylesheet" href="stylesheets/app.css">
  <link rel="stylesheet" href="responsive-tables.css"> -->

  <script src="javascripts/jquery.min.js"></script>
  <script src="responsive-tables.js"></script>

</head>

<?php 

      if (isset($_GET['opc']) and !isset($_GET['lotn'])) {
        $opc= $_GET['opc']; $lotn='sintotal';
        echo "<body onload=go_section2('$opc')>";
      } else if (isset($_GET['opc']) and isset($_GET['lotn'])){
        $opc= $_GET['opc']; $lotn=$_GET['lotn'];
        echo "<body onload=go_section2('$opc'),cerrarsection()>";
      } else{
        $lotn='sintotal';
        echo "<body onload=go_section2('section-3'),cerrarsection()>";
      }

      include 'funciones.php';
      
  ?>

<?php  require 'config.php';
  
  
  if (isset($_POST["filling3"])) {
        
    $shift = $_POST["shift3"] ;
    $lot_number = $_POST["lot_number3"] ;

    if ($shift<>"" and $lot_number<>"") {
    
        $fecha = date("Y-m-d"); $hora= date('h:i:s A');
        /* $idx= $_POST["idx"]; */
        $container= $_POST["container"];
        $end_counter= $_SESSION['username']; //  $_POST["end_counter"];
        $blisters_shippers_shift_end= $_POST["blisters_shippers_shift_end"];
        $filler_counter_shift_end= $_POST["filler_counter_shift_end"];
        $filler_counter_rejects=   $_POST["filler_counter_rejects"];
        $unprinted_blisters_in_pcf= $_POST["unprinted_blisters_in_pcf"];
        $printed_blisters_in_pcf= $_POST["printed_blisters_in_pcf"];
        $shift_lenght= $_POST["shift_lenght"];
        $gravimetrics_1000U= $_POST["gravimetrics_1000U"];
        $frit_change= $_POST["frit_change"];

        $cell_1 = $_POST["cell_1"]; $p_cell_1 = $_POST["p_cell_1"];
        $cell_2 = $_POST["cell_2"]; $p_cell_2 = $_POST["p_cell_2"];
        $cell_3 = $_POST["cell_3"]; $p_cell_3 = $_POST["p_cell_3"];
        $cell_4 = $_POST["cell_4"]; $p_cell_4 = $_POST["p_cell_4"];
        $cell_5 = $_POST["cell_5"]; $p_cell_5 = $_POST["p_cell_5"];
        $cell_6 = $_POST["cell_6"]; $p_cell_6 = $_POST["p_cell_6"];
        $cell_7 = $_POST["cell_7"]; $p_cell_7 = $_POST["p_cell_7"];

        $klockner = $_POST["klockner"];
        $p_klockner = $_POST["p_klockner"];
        $printer = $_POST["printer"];
        $p_printer = $_POST["p_printer"];
        $leak_test = $_POST["leak_test"];
        $p_leak_test = $_POST["p_leak_test"];
        $unplanned_other = $_POST["unplanned_other"];
        $p_unplanned_other = $_POST["p_unplanned_other"];
        $comments = $_POST["comments"];

        $sql="UPDATE `status` SET `container` = '$container',`end_counter` = '$end_counter', `blisters_shippers_shift_end` = '$blisters_shippers_shift_end', 
        `filler_counter_shift_end` = '$filler_counter_shift_end', `filler_counter_rejects` = '$filler_counter_rejects', `unprinted_blisters_in_pcf` = '$unprinted_blisters_in_pcf', 
        `printed_blisters_in_pcf` = '$printed_blisters_in_pcf', `shift_lenght` = '$shift_lenght', `gravimetrics_1000U` = '$gravimetrics_1000U', `frit_change` = '$frit_change', 
        `cell_1` = '$cell_1', `p_cell_1` = '$p_cell_1', `cell_2` = '$cell_2', `p_cell_2` = '$p_cell_2', `cell_3` = '$cell_3', `p_cell_3` = '$p_cell_3', 
        `cell_4` = '$cell_4', `p_cell_4` = '$p_cell_4', `cell_5` = '$cell_5', `p_cell_5` = '$p_cell_5', `cell_6` = '$cell_6', `p_cell_6` = '$p_cell_6', 
        `cell_7` = '$cell_7', `p_cell_7` = '$p_cell_7', `klockner` = '$klockner', `p_klockner` = '$p_klockner', `printer` = '$printer', `p_printer` = '$p_printer', 
        `leak_test` = '$leak_test', `p_leak_test` = '$p_leak_test', `unplanned_other` = '$unplanned_other', `p_unplanned_other` = '$p_unplanned_other'
        WHERE lot_number='$lot_number' AND shift='$shift'";                       
        $result = mysqli_query($conn, $sql);

          $comments=  str_replace('"', '', $comments);
          $comments=  str_replace('(', '', $comments);
          $comments=  str_replace(')', '', $comments);

        $sql2="UPDATE `observations` SET `observation` = '$comments' 
                WHERE shift='$shift' AND lot_number='$lot_number'";                       
        $result2 = mysqli_query($conn, $sql2);

    }
}
  
  
  ?>




<div class="container-fluid d-flex flex-column bg-body-secondary p-0 m-0">
  <!-- Section 1 -->

  <!-- Section 3 -->
  <section class="section-3" id="section-3">
    <div class="container-fluid d-flex flex-column">
      <div class="row">
        <input type="hidden" name="opcionx2" id="opcionx2" value="home">
        <h1 class="w-100 text-center">Filling Daily Status</h1>
        <input type="hidden" name="concolor" id="concolor">
      </div>
      <div class="row">
        <div class="w-100 d-flex justify-content-center">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddProc"
            onclick="openModal()">Add Status</button>
          <!--  onclick="go_section2('section-3b')"  onclick="openModal('#modalAddProc')"  -->
        </div>
      </div>
      <div class="row pt-3 pb-3 d-flex justify-content-center">
        <div class="col-2">
          <select class="form-select" name="savedx" id="savedx" onchange="verhistorico2(opcionx2.value,this.value)">
            <option value=''></option>
            <?php  $sqlzb= "SELECT DISTINCT lot_number FROM status WHERE saved='SI'";
                    $resultb = mysqli_query($conn, $sqlzb);
                        while($rowx = mysqli_fetch_array($resultb) ){ 
                          $lotnumber= $rowx[0];
                          echo "<option value='$lotnumber'>$lotnumber</option>"; 
                      } ?>
            <option value='sintotal'>Current</option>

          </select>
        </div>
      </div>
      <div class="table-responsive w-100">

        <table class="table table-bordered border-dark w-100">
          <thead class="bg-dark ">
            <tr>
              <th class="text-white text-center">Shift</th>
              <th class="text-white text-center">Lot<br> Number</th>
              <th class="text-white text-center">Container</th>
              <th class="text-white text-center">Supervisor</th>
              <th class="text-white text-center">Blisters <br> Shippers <br>Shift End</th>
              <th class="text-white text-center">Filler <br>Counter <br> Shift End</th>
              <th class="text-white text-center">Filler<br> Counter <br> Rejects</th>
              <th class="text-white text-center">Unprinted<br> Blisters <br>in PCF</th>
              <th class="text-white text-center">Printed <br> Blisters<br> in PCF</th>
              <th class="text-white text-center">Shift <br> Lenght</th>
              <th class="text-white text-center">Gravimetrics <br> /1000U</th>
              <th class="text-white text-center">Frit <br> Change</th>
              <th class="text-white text-center">Cell<br>1</th>
              <th class="text-white text-center">Cell<br>2</th>
              <th class="text-white text-center">Cell<br>3</th>
              <th class="text-white text-center">Cell<br>4</th>
              <th class="text-white text-center">Cell<br>5</th>
              <th class="text-white text-center">Cell<br>6</th>
              <th class="text-white text-center">Cell<br>7</th>
              <th class="text-white text-center">Klockner</th>
              <th class="text-white text-center">Printer</th>
              <th class="text-white text-center">Leak <br> test</th>
              <th class="text-white text-center">Unplanned <br> Other</th>
              <th class="text-white text-center">Total <br> Time</th>
            </tr>
          </thead>
          <tbody>

            <?php 
                      
                    function tiempox($X){
                        $result="no";
                        if ($X=='cell_1') {$result="si";}
                        if ($X=='cell_2') {$result="si";}
                        if ($X=='cell_3') {$result="si";}
                        if ($X=='cell_4') {$result="si";}
                        if ($X=='cell_5') {$result="si";}
                        if ($X=='cell_6') {$result="si";}
                        if ($X=='cell_7') {$result="si";}
                        if ($X=='klockner') {$result="si";}
                        if ($X=='printer') {$result="si";}
                        if ($X=='leak_test') {$result="si";}
                        if ($X=='unplanned_other') {$result="si";}
                        return $result;
                    }
        
                    function vercomment($conn, $S,$L){
                          $sqlzb= "SELECT observation FROM observations WHERE shift='".$S."' AND lot_number='".$L."'";
                            /* echo $sqlzb; */
                            $resultb = mysqli_query($conn, $sqlzb);
                              if (mysqli_num_rows($resultb)) {
                                  $row = mysqli_fetch_assoc($resultb);
                                  if (isset($row['observation']) ) {
                                    $observation= $row['observation'];
                                  } else {
                                    $observation= "";
                                  }
                                    /* echo $observation; */
                                    return $observation; 
                              }
                        }
                    
                    function traemensaje($conn, $shift,$lot,$column){
        
                        $sqlx= "SHOW COLUMNS FROM status;";     
                        $resultx = mysqli_query($conn, $sqlx);
                            $mensaje="";
                          while($rowx = mysqli_fetch_assoc($resultx) ){ 
                                $campo= $rowx['Field'];
                              if ($campo == "p_".$column) {
                                
                                  $sqlz= "SELECT $campo FROM status WHERE shift='$shift' AND lot_number='$lot'";
                                  $result = mysqli_query($conn, $sqlz);
                                  if (mysqli_num_rows($result)) {
                                      $row = mysqli_fetch_assoc($result);
                                      $mensaje= $row[$campo];  
                                  }
                              }
                          }
                          return $mensaje;
                      }
                    
                        $sqlx= "SHOW COLUMNS FROM status;";     
                        $resultx = mysqli_query($conn, $sqlx);
                            $X=0; $opciones="";
                        while($rowx = mysqli_fetch_assoc($resultx) ){ 
          
                            $comentario=  substr($rowx['Field'], 0, 2);
                            if ($comentario <> "p_") {
                              $opciones= $opciones.",".$rowx['Field'];
                              $columna[$X]=$rowx['Field'];
                              $X++;
                            } 
                          
                        }
                        
                        $opciones = substr($opciones, 1);
                        $totalfilas="0";
          
                        if (isset($lotn) AND $lotn<> 'sintotal') {
                          $sql= "SELECT $opciones FROM status WHERE lot_number = '$lotn'";
                          $result2 = mysqli_query($conn, $sql);
                          $totalfilas = mysqli_num_rows($result2);
                        } else if (isset($lotn) AND $lotn == 'sintotal') {
                          $sql= "SELECT $opciones FROM status WHERE saved <> 'SI' ORDER BY id DESC";
                          $result2 = mysqli_query($conn, $sql);
                          $totalfilas = mysqli_num_rows($result2);
                        }
            
                      
                        if ($totalfilas>0) {
                                $j=0;
                          while($fila = mysqli_fetch_array($result2) ){ 
          
                              $j++;
                              $shiftx2[$j]= $fila[1];
                              $lotnumber2[$j]= $fila[2]; ?>
            <tr class="h-auto text-center"
              onmouseover="loteelegido2('<?php echo $shiftx2[$j] ?>','<?php echo $lotnumber2[$j] ?>')">
              <?php 
                                      $comentario= vercomment($conn,$shiftx2[$j],$lotnumber2[$j]); 
                                    
                              if ($shiftx2[$j]=="Total" AND $lotn <> ""){ ?>
              <td>
                <?php echo $shiftx2[$j] ?>
              </td>
              <td style='background:silver'></td>
              <?php } else {  ?>
              <td>
                <?php  
                                      if ($shiftx2[$j]>0) {      ?>
                <button class="btn btn-info" onclick="vercomentario(`<?php echo $comentario ?>`)">
                  <?php echo $shiftx2[$j] ?>
                </button>
                <?php } else { 
                                        echo $shiftx2[$j];
                                      } ?>

              </td>
              <td> <button onclick="observationsw()" style="background-color: blueviolet; color: white;" class="btn">
                  <?php echo $lotnumber2[$j]?>
                </button> </td>
              <?php } ?>

              <?php $tot_time=0; 
                                for ($i=3; $i < 24; $i++) { 
                                      
                                  if ($fila[$i]<>"") {  
                                      $celda=$fila[$i]; 
                                      
                                        if (tiempox($columna[$i])=='si') {$tot_time= $tot_time + $celda;}
          
                                              $mensaje1= traemensaje($conn,$shiftx2[$j],$lotnumber2[$j],$columna[$i]);
          
                                        if ($mensaje1=="") {
                                          $color1="white";
                                            if ($celda=="0") {
                                              $celda="";
                                            }
                                        } else {
                                          $color1="red";
                                        }
                                        
                                        if ($color1=="red") { ?>
              <td class="uno bg-danger text-white" title="<?php echo $celda ?>"
                onmouseover="showdatayb(`<?php echo $mensaje1 ?>`)" onclick="celdaelegida2(event)">
                <?php echo $celda ?>
              </td>
              <?php } else { 
                                              if ($fila['shift']=='Total') { ?>

              <td class="dos" title="<?php echo $celda ?>">
                <?php echo $celda ?>
              </td>

              <?php } else { ?>
              <td class="tres" title="<?php echo $celda ?>" onmouseover="showdatayb(`<?php echo $mensaje1 ?>`)"
                onclick="celdaelegida2(event)">
                <?php if ($celda<>"") { ?>
                <?php echo $celda ?>
                <?php  } ?>
              </td>
              <?php } ?>

              <?php } ?>

              <?php 
                                      } else {
          
                                            if ($fila[$i-1]=="") {
                                              $colorx="nocolor";
                                            } else {
                                              $colorx="white";
                                            } 
                                  if ($fila['shift']=='Total') { ?>

              <td class="dos" style="background-color: green; color: white;" title="<?php echo $celda ?>"></td>

              <?php } else { ?>

              <td></td>

              <?php  } 
          
                                  }
                                                  
                                } 
                                  echo "<td class='dos' title='$tot_time' style='background-color: gray; color: white;'>$tot_time</td>";
                                echo "</tr>";
          
                          } 
                          
                        }  
                      ?>
            <tr>
              <td colspan="24">
                <textarea name="commentsx" id="commentsx" style='width:100%;height:10rem'></textarea>
              </td>
            </tr>
          <tbody>
        </table>
      </div>
    </div>

  </section>
  <!-- End of Section 3 -->



  <!-- <div class="hide" id="rmenu3b" style='background:beige;height:10rem'>

    <div id='salidaMensaje2b' style="background:white;color:black;padding:0.2rem"></div>

  </div>


  <div class="hide" id="rmenu2b">
    <a onclick="go_section2('section-3c')" style='font-size:2rem;color:black;margin-left:1rem'>Add Observation</a>
    <hr>
    <div id='salidaMensajeb' style="background:white;color:black;padding:0.2rem"></div>
  </div>

  <div class="hide" id="rmenub">
    <ol>
      <li style="background:black">
        <a onclick="go_section2('section-3b')" style='font-size:2rem;color:black;margin-left:1rem'>Add Status</a>
      </li>
    </ol>
  </div> -->

  <section class="section-3c" id="section-3c"
    style="width: auto;height: auto ;display:none;background-color: aquamarine; display: flex; flex-flow: column">
    <div class="row w-100 bg-black d-flex justify-content-end">
        <button class="btn btn-danger text-center" style="width: 50px;" onclick="cerrarsection()">X</button>
    </div>
    </div>
    <iframe id="observationsx" name="observationsx" src="observations.php" scrolling="no" frameborder="0" width="100%"
      height="1300" style="padding: 0; margin: 0;"></iframe>
  </section>

  <section class="section-3b" id="section-3b" style="display:none">
    <button class="botonx" style="margin-left:50%" onclick="cerrarsection()">X</button>
    <h2 class="section-heading">Add Status</h2>
    <div class="container">
      <form class="contact-form center" id="f_filling2" method="post" action="consultas.php"
        enctype="multipart/form-data" target="consultasx">
        <input type="hidden" name="filling2" id="filling2" value='X' />
        <input type="text" placeholder="Shift" name="shift2" id="shift2" />
        <input type="text" placeholder="Lot Number" name="lot_number2" id="lot_number2" />
        <input type="button" value="Submit" class="contact-form-btn" onclick="enviarform('f_filling2','section-3')" />
      </form>
    </div>
  </section>
  <!-- MODAL -->

  <form id="finaliza" method="post" action="consultas.php" enctype="multipart/form-data" target="consultasx">
    <input type="hidden" name="lotnumber" id="lotnumber" style="font-size:10rem" />
  </form>

  <!-- 
    <form id="historizar" method="post" action="consultas.php" enctype="multipart/form-data" target="consultasx">       
      <input type="hidden" name="lotnumberw" id="lotnumberw" />
    </form>
  -->


  <iframe name="consultasx" src="consultas.php" frameborder="0" style="height:1rem"></iframe>

</div>

<form id="consultaobservations" action="observations.php" method="post" target="observationsx" style='display:none'>
  <input type="text" name="shiftx" id="shiftx" />
  <input type="text" name="lotnumberx" id="lotnumberx" />
</form>

<script src="script.js"></script>
<!-- <script src="contextmenu2.js"></script> -->

<script>

  function derecha(e) {
    if (navigator.appName == 'Netscape' && (e.which == 3 || e.which == 2)) {
      alert('Right button disabled');
      return false;
    }

    else if (navigator.appName == 'Microsoft Internet Explorer' && (event.button == 2)) {
      alert('Right button disabled');
    }
  }
  /* document.onmousedown=derecha */


  function go_section2(X) {
    /* var W=  */
    document.getElementById("opcionx2").value = X;
    document.getElementById("section-3").style.display = "none";
    document.getElementById("section-3b").style.display = "none";
    document.getElementById("section-3c").style.display = "none";
    document.getElementById(X).style.display = "flex";

  }

  function observationsw() {
    /* alert("bien"); */
    document.getElementById("consultaobservations").submit();
    document.getElementById("section-3c").style.display = "flex";
    document.getElementById("section-3").style.display = "none";

  }

  function cerrarsection() {
    document.getElementById("section-3b").style.display = "none";
    document.getElementById("section-3c").style.display = "none";
    document.getElementById("section-3").style.display = "flex";
  }

  function verhistorico2(S, X) {
    location.href = '?opc=' + S + '&lotn=' + X;
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
  integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
  </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
  integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
  </script>

</body>

</html>
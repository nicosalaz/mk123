<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>XXXXX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!--build:css css/styles.min.css-->
  <!--<link href="https://fonts.googleapis.com/css?family=Lato|Roboto+Slab" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" 
      integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"> -->
  <!-- <link rel="stylesheet" href="styles2.css">  
  <link rel="stylesheet" href="stylesheets/globals.css">
  <link rel="stylesheet" href="responsive-tables.css"> -->
</head>

<body style="width: auto;height: auto; padding: 0; margin: 0;align-self: center;">

  <?php  require 'config.php';
    
    if (isset($_POST['shiftx']) and isset($_POST['lotnumberx'])) {
    
      $shiftx= $_POST['shiftx'];
      $lotnumberx= $_POST['lotnumberx'];

      $sqlw= "SELECT * FROM status WHERE lot_number='$lotnumberx' AND shift='$shiftx'";
      $resultw = mysqli_query($conn, $sqlw);
       
      if ($resultw) {
          if (mysqli_num_rows($resultw)) {
            $row = mysqli_fetch_assoc($resultw);
            $container= $row["container"];
            $end_counter= $row["end_counter"];
            $blisters_shippers_shift_end= $row["blisters_shippers_shift_end"];
            $filler_counter_shift_end= $row["filler_counter_shift_end"];
            $filler_counter_rejects=   $row["filler_counter_rejects"];
            $unprinted_blisters_in_pcf= $row["unprinted_blisters_in_pcf"];
            $printed_blisters_in_pcf= $row["printed_blisters_in_pcf"];
            $shift_lenght= $row["shift_lenght"];
            $gravimetrics_1000U= $row["gravimetrics_1000U"];
            $frit_change= $row["frit_change"];

            $cell_1 = $row["cell_1"]; $p_cell_1 = $row["p_cell_1"];
            $cell_2 = $row["cell_2"]; $p_cell_2 = $row["p_cell_2"];
            $cell_3 = $row["cell_3"]; $p_cell_3 = $row["p_cell_3"];
            $cell_4 = $row["cell_4"]; $p_cell_4 = $row["p_cell_4"];
            $cell_5 = $row["cell_5"]; $p_cell_5 = $row["p_cell_5"];
            $cell_6 = $row["cell_6"]; $p_cell_6 = $row["p_cell_6"];
            $cell_7 = $row["cell_7"]; $p_cell_7 = $row["p_cell_7"];

            $klockner = $row["klockner"];
            $p_klockner = $row["p_klockner"];
            $printer = $row["printer"];
            $p_printer = $row["p_printer"];
            $leak_test = $row["leak_test"];
            $p_leak_test = $row["p_leak_test"];
            $unplanned_other = $row["unplanned_other"];
            $p_unplanned_other = $row["p_unplanned_other"];

            $sql2= "SELECT observation FROM observations WHERE shift='$shiftx' AND lot_number='$lotnumberx'";
            $result2 = mysqli_query($conn, $sql2);
            if ($row2 = mysqli_fetch_row($result2)) {
              if ( isset($row2[0]) ) {
                $comments = $row2[0];
              } else {
                $comments = "";
              }
              
            }else {
              $comments = "";
            }


          }
      }

  ?>


  <form class="form-control p-0 border-0" id="f_filling3" method="post" action="daily.php"
    enctype="multipart/form-data">
    <input type="hidden" name="filling3" id="filling3" value='X' />
    <!-- <input type="hidden" name="idx" id="idx"/> -->

    <div class="container-fluid d-flex flex-column justify-content-center" style="width: 100vw;">
      <div class="row pt-3" style="width: 100vw;">
        <div class="col-4">
          <div class="row p-0 m-0">
            <div class="card p-0">
              <div class="card-header w-100 text-center text-white fw-bold bg-dark">
                <h3>Batch Data...</h3>
              </div>
              <div class="card-body">
                <div class="row container-fluid">
                  <div class="col-4">
                    <label class="form-label fw-bold" for="shift3">Shift</label>
                    <input class="form-control" type="text" name="shift3" id="shift3" value='<?php echo $shiftx ?>'>
                  </div>
                  <div class="col-4">
                    <label class="form-label fw-bold" for="lot_number3">Lot number</label>
                    <input class="form-control" type="text" name="lot_number3" id="lot_number3"
                      value='<?php echo $lotnumberx ?>'>
                  </div>
                  <div class="col-4">
                    <label class="form-label fw-bold" for="container">Container</label>
                    <input class="form-control" type="text" name="container" id="container"
                      value='<?php echo $container ?>'>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label class="form-label fw-bold" for="end_counter">Supervisor</label>
                    <input class="form-control" type="text" name="end_counter" id="end_counter"
                      value='<?php echo $end_counter ?>'>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label class="form-label fw-bold" for="blisters_shippers_shift_end">Blisters Shippers Shift
                      End</label>
                    <input class="form-control" type="text" name="blisters_shippers_shift_end"
                      id="blisters_shippers_shift_end" value='<?php echo $blisters_shippers_shift_end ?>'>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label class="form-label fw-bold" for="filler_counter_shift_end">Filler Counter Shift End</label>
                    <input class="form-control" type="text" name="filler_counter_shift_end"
                      id="filler_counter_shift_end" value='<?php echo $filler_counter_shift_end ?>'>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label class="form-label fw-bold" for="unprinted_blisters_in_pcf">Unprinted Blisters in PCF</label>
                    <input class="form-control" type="text" name="unprinted_blisters_in_pcf"
                      id="unprinted_blisters_in_pcf" value='<?php echo $unprinted_blisters_in_pcf ?>'>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label class="form-label fw-bold" for="printed_blisters_in_pcf">Printed Blisters in PCF</label>
                    <input class="form-control" type="text" name="printed_blisters_in_pcf" id="printed_blisters_in_pcf"
                      value='<?php echo $printed_blisters_in_pcf ?>'>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-header w-100 text-center text-white fw-bold bg-dark">
              <h3>Filler</h3>
            </div>
            <div class="card-body">
              <!-- row 1 -->
              <div class="row">
                <label class="form-label fw-bold" for="">Cell 1</label>
              </div>
              <div class="row">
                <div class="col-3">
                  <input class="form-control" type="text" name="cell_1" id="cell_1" value='<?php echo $cell_1 ?>'>
                </div>
                <div class="col-9">
                  <textarea class="form-control" name="p_cell_1" id="p_cell_1" cols="10"
                    rows="1"><?php echo $p_cell_1 ?></textarea>
                </div>
              </div>
              <!-- row 2 -->
              <div class="row">
                <label class="form-label fw-bold" for="">Cell 2</label>
              </div>
              <div class="row">
                <div class="col-3">
                  <input class="form-control" type="text" name="cell_2" id="cell_2" value='<?php echo $cell_2 ?>'>
                </div>
                <div class="col-9">
                  <textarea class="form-control" name="p_cell_2" id="p_cell_2" cols="10"
                    rows="1"><?php echo $p_cell_2 ?></textarea>
                </div>
              </div>
              <!-- row 3 -->
              <div class="row">
                <label class="form-label fw-bold" for="">Cell 3</label>
              </div>
              <div class="row">
                <div class="col-3">
                  <input class="form-control" type="text" name="cell_3" id="cell_3" value='<?php echo $cell_3 ?>'>
                </div>
                <div class="col-9">
                  <textarea class="form-control" name="p_cell_3" id="p_cell_3" cols="10"
                    rows="1"><?php echo $p_cell_3 ?></textarea>
                </div>
              </div>
              <!-- row 4 -->
              <div class="row">
                <label class="form-label fw-bold" for="">Cell 4</label>
              </div>
              <div class="row">
                <div class="col-3">
                  <input class="form-control" type="text" name="cell_4" id="cell_4" value='<?php echo $cell_4 ?>'>
                </div>
                <div class="col-9">
                  <textarea class="form-control" name="p_cell_4" id="p_cell_4" cols="10"
                    rows="1"><?php echo $p_cell_4 ?></textarea>
                </div>
              </div>
              <!-- row 5 -->
              <div class="row">
                <label class="form-label fw-bold" for="">Cell 5</label>
              </div>
              <div class="row">
                <div class="col-3">
                  <input class="form-control" type="text" name="cell_5" id="cell_5" value='<?php echo $cell_5 ?>'>
                </div>
                <div class="col-9">
                  <textarea class="form-control" name="p_cell_5" id="p_cell_5" cols="10"
                    rows="1"><?php echo $p_cell_5 ?></textarea>
                </div>
              </div>
              <!-- row 6 -->
              <div class="row">
                <label class="form-label fw-bold" for="">Cell 6</label>
              </div>
              <div class="row">
                <div class="col-3">
                  <input class="form-control" type="text" name="cell_6" id="cell_6" value='<?php echo $cell_6 ?>'>
                </div>
                <div class="col-9">
                  <textarea class="form-control" name="p_cell_6" id="p_cell_6" cols="10"
                    rows="1"><?php echo $p_cell_6 ?></textarea>
                </div>
              </div>
              <!-- row 7 -->
              <div class="row">
                <label class="form-label fw-bold" for="">Cell 7</label>
              </div>
              <div class="row">
                <div class="col-3">
                  <input class="form-control" type="text" name="cell_7" id="cell_7" value='<?php echo $cell_7 ?>'>
                </div>
                <div class="col-9">
                  <textarea class="form-control" name="p_cell_7" id="p_cell_7" cols="10"
                    rows="1"><?php echo $p_cell_7 ?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-header w-100 text-center text-white fw-bold bg-dark">
              <h3>Klockner</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-3">
                  <input class="form-control" type="text" name="klockner" id="klockner" value='<?php echo $klockner ?>'>
                </div>
                <div class="col-9">
                  <textarea class="form-control" name="p_klockner" id="p_klockner" cols="10"
                  rows="1"><?php echo $p_klockner ?></textarea>
                </div>
              </div>
            </div>
            <div class="card-header w-100 text-center text-white fw-bold bg-dark">
              <h3>Printer</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-3">
                  <input class="form-control" type="text" name="printer" id="printer" value='<?php echo $printer ?>'>
                </div>
                <div class="col-9">
                  <textarea class="form-control" name="p_printer" id="p_printer" cols="10"
                  rows="1"><?php echo $p_printer ?></textarea>
                </div>
              </div>
            </div>
            <div class="card-header w-100 text-center text-white fw-bold bg-dark">
              <h3>Leak Test</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-3">
                  <input class="form-control" type="text" name="leak_test" id="leak_test" value='<?php echo $leak_test ?>'>
                </div>
                <div class="col-9">
                  <textarea class="form-control" name="p_leak_test" id="p_leak_test" cols="10"
                  rows="1"><?php echo $p_leak_test ?></textarea>
                </div>
              </div>
            </div>
            <div class="card-header w-100 text-center text-white fw-bold bg-dark">
              <h3>Unplanned Other</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-3">
                  <input class="form-control" name="unplanned_other" id="unplanned_other" value='<?php echo $unplanned_other ?>'>
                </div>
                <div class="col-9">
                  <textarea class="form-control" name="p_unplanned_other" id="p_unplanned_other" cols="10"
                  rows="1"><?php echo $p_unplanned_other ?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 pt-2 pb-2">
        <div class="card p-0">
          <div class="card-header w-100 text-center text-white fw-bold bg-dark">
            <h3>Production Data</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-4">
                <label class="form-label fw-bold" for="shift_lenght">Shift Lenght</label>
                <input class="form-control" type="text" name="shift_lenght" id="shift_lenght"
                  value='<?php echo $shift_lenght ?>'>
              </div>
              <div class="col-4">
                <label class="form-label fw-bold" for="gravimetrics_1000U">Gravimetrics / 1000U</label>
                <input class="form-control" type="text" name="gravimetrics_1000U" id="gravimetrics_1000U"
                  value='<?php echo $gravimetrics_1000U ?>'>
              </div>
              <div class="col-4">
                <label class="form-label fw-bold" for="printed_blisters_in_pcf">Frit Change</label>
                <input class="form-control" type="text" name="frit_change" id="frit_change"
                  value='<?php echo $frit_change ?>'>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-12">
                <label class="form-label fw-bold" for="gravimetrics_1000U">Gravimetrics / 1000U</label>
                <input class="form-control" type="text" name="gravimetrics_1000U" id="gravimetrics_1000U"
                  value='<?php echo $gravimetrics_1000U ?>'>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <label class="form-label fw-bold" for="printed_blisters_in_pcf">Frit Change</label>
                <input class="form-control" type="text" name="frit_change" id="frit_change"
                  value='<?php echo $frit_change ?>'>
              </div>
            </div> -->
          </div>
        </div>
      </div>
      <div class="col-12">
        <label class="fw-bold" for="comments">Comments</label>
        <textarea class="form-control" name="comments" id="comments" cols="100" rows="5"><?php echo $comments ?></textarea>
      </div>
      <div class="col-12 d-flex justify-content-center pt-3">
        <button type="submit" class="btn btn-primary" onclick="enviarformx('f_filling3')">Submit</button>
      </div>
    </div>

    <!-- <div class="row">

      <div class="main">

        <div class="dummy-img">

          <table id="batch" style='width:99%;margin-bottom:-0.5rem'>
            <tr>
              <td colspan='2' class="titulox">Batch Data...</td>
            </tr>
            <tr>
              <td>Shift</td>
              <td> <input type="text" name="shift3" id="shift3" value='<?php echo $shiftx ?>'> </td>
            </tr>
            <tr>
              <td>Lot number</td>
              <td> <input type="text" name="lot_number3" id="lot_number3" value='<?php echo $lotnumberx ?>'></td>
            </tr>
            <tr>
              <td>Container</td>
              <td> <input type="text" name="container" id="container" value='<?php echo $container ?>'></td>
            </tr>
            <tr>
              <td>Supervisor</td>
              <td> <input type="text" name="end_counter" id="end_counter" value='<?php echo $end_counter ?>'></td>
            </tr>
            <tr>
              <td>Blisters Shippers Shift End</td>
              <td> <input type="text" name="blisters_shippers_shift_end" id="blisters_shippers_shift_end"
                  value='<?php echo $blisters_shippers_shift_end ?>'></td>
            </tr>
            <tr>
              <td>Filler Counter Shift End</td>
              <td> <input type="text" name="filler_counter_shift_end" id="filler_counter_shift_end"
                  value='<?php echo $filler_counter_shift_end ?>'></td>
            </tr>
            <tr>
              <td>Filler Counter Rejects</td>
              <td> <input type="text" name="filler_counter_rejects" id="filler_counter_rejects"
                  value='<?php echo $filler_counter_rejects ?>'></td>
            </tr>
            <tr>
              <td>Unprinted Blisters in PCF</td>
              <td> <input type="text" name="unprinted_blisters_in_pcf" id="unprinted_blisters_in_pcf"
                  value='<?php echo $unprinted_blisters_in_pcf ?>'></td>
            </tr>
            <tr>
              <td>Printed Blisters in PCF</td>
              <td> <input type="text" name="printed_blisters_in_pcf" id="printed_blisters_in_pcf"
                  value='<?php echo $printed_blisters_in_pcf ?>'></td>
            </tr>
          </table>


        </div><br> -->


        <!-- <div class="dummy-img">

          <table id="production" style='width:99%;margin-top:-0.5rem'>
            <tr>
              <td colspan='2' class="titulox">Production Data</td>
            </tr>
            <tr>
              <td>Shift Lenght</td>
              <td><input type="text" name="shift_lenght" id="shift_lenght" value='<?php echo $shift_lenght ?>'></td>
            </tr>
            <tr>
              <td>Gravimetrics / 1000U</td>
              <td><input type="text" name="gravimetrics_1000U" id="gravimetrics_1000U"
                  value='<?php echo $gravimetrics_1000U ?>'></td>
            </tr>
            <tr>
              <td>Frit Change</td>
              <td><input type="text" name="frit_change" id="frit_change" value='<?php echo $frit_change ?>'></td>
            </tr>
          </table>

        </div>

      </div> -->


        <!-- <div class="main">
          <div class="dummy-img">

            <table id="filler" style='width:99%'>
              <tr>
                <td colspan='3' class="titulox">Filler</td>
              </tr>
              <tr>
                <td width='15%'>Cell 1</td>
                <td width='20%'> <input class='numerox' type="text" name="cell_1" id="cell_1"
                    value='<?php echo $cell_1 ?>'> </td>
                <td> <textarea class='texto2' name="p_cell_1" id="p_cell_1" cols="10"
                    rows="1"><?php echo $p_cell_1 ?></textarea> </td>
              </tr>
              <tr>
                <td>Cell 2</td>
                <td><input class='numerox' type="text" name="cell_2" id="cell_2" value='<?php echo $cell_2 ?>'></td>
                <td><textarea class='texto2' name="p_cell_2" id="p_cell_2" cols="10"
                    rows="1"><?php echo $p_cell_2 ?></textarea></td>
              </tr>
              <tr>
                <td>Cell 3</td>
                <td><input class='numerox' type="text" name="cell_3" id="cell_3" value='<?php echo $cell_3 ?>'></td>
                <td><textarea class='texto2' name="p_cell_3" id="p_cell_3" cols="10"
                    rows="1"><?php echo $p_cell_3 ?></textarea></td>
              </tr>
              <tr>
                <td>Cell 4</td>
                <td><input class='numerox' type="text" name="cell_4" id="cell_4" value='<?php echo $cell_4 ?>'></td>
                <td><textarea class='texto2' name="p_cell_4" id="p_cell_4" cols="10"
                    rows="1"><?php echo $p_cell_4 ?></textarea></td>
              </tr>
              <tr>
                <td>Cell 5</td>
                <td><input class='numerox' type="text" name="cell_5" id="cell_5" value='<?php echo $cell_5 ?>'></td>
                <td><textarea class='texto2' name="p_cell_5" id="p_cell_5" cols="10"
                    rows="1"><?php echo $p_cell_5 ?></textarea></td>
              </tr>
              <tr>
                <td>Cell 6</td>
                <td><input class='numerox' type="text" name="cell_6" id="cell_6" value='<?php echo $cell_6 ?>'></td>
                <td><textarea class='texto2' name="p_cell_6" id="p_cell_6" cols="10"
                    rows="1"><?php echo $p_cell_6 ?></textarea></td>
              </tr>
              <tr>
                <td>Cell 7</td>
                <td><input class='numerox' type="text" name="cell_7" id="cell_7" value='<?php echo $cell_7 ?>'></td>
                <td><textarea class='texto2' name="p_cell_7" id="p_cell_7" cols="10"
                    rows="1"><?php echo $p_cell_7 ?></textarea></td>
              </tr>
            </table>

          </div>
        </div> -->

        <!-- <div class="main">
          <div class="dummy-img">

            <table id="klockner" style='width:99%'>
              <tr>
                <td colspan='3' class="titulox">Klockner</td>
              </tr>
              <tr>
                <td width='15%'>Klockner</td>
                <td width='20%'> <input class='numerox' type="text" name="klockner" id="klockner"
                    value='<?php echo $klockner ?>'> </td>
                <td> <textarea class='texto2' name="p_klockner" id="p_klockner" cols="10"
                    rows="1"><?php echo $p_klockner ?></textarea></td>
              </tr>
              <tr>
                <td colspan='4' class="titulox">Printer</td>
              </tr>
              <tr>
                <td>Printer</td>
                <td><input class='numerox' type="text" name="printer" id="printer" value='<?php echo $printer ?>'></td>
                <td> <textarea class='texto2' name="p_printer" id="p_printer" cols="10"
                    rows="1"><?php echo $p_printer ?></textarea></td>
              </tr>
              <tr>
                <td colspan='4' class="titulox">Leak Test</td>
              </tr>
              <tr>
                <td>Leak Test</td>
                <td><input class='numerox' type="text" name="leak_test" id="leak_test" value='<?php echo $leak_test ?>'>
                </td>
                <td> <textarea class='texto2' name="p_leak_test" id="p_leak_test" cols="10"
                    rows="1"><?php echo $p_leak_test ?></textarea></td>
              </tr>
              <tr>
                <td colspan='4' class="titulox">Unplanned Other</td>
              </tr>
              <tr>
                <td>Unplanned Other</td>
                <td><input class='numerox' type="text" name="unplanned_other" id="unplanned_other"
                    value='<?php echo $unplanned_other ?>'></td>
                <td> <textarea class='texto2' name="p_unplanned_other" id="p_unplanned_other" cols="10"
                    rows="1"><?php echo $p_unplanned_other ?></textarea> </td>
              </tr>
            </table>

          </div>
        </div>

      </div>


      <div class="row">
        <div class="main" style="width:98%">
          <div class="dummy-img">
            Comments
            <textarea style="width:99%; height:8rem !important" name="comments" id="comments" cols="100"
              rows="5"><?php echo $comments ?></textarea>

            <input type="button" value="Submit" class="contact-form-btn" onclick="enviarformx('f_filling3')" />
          </div>
        </div>
      </div> -->

  </form>

  <?php } ?>

  <script src="main.js"></script>

  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>

</body>

</html>
<?php    
session_start(); 

 require 'config.php'; 

 if (isset($_POST["filling1"])) {

    $lot_number = $_POST["lot_number1"] ;

    if ($lot_number<>"") {
       
            $sql= "INSERT INTO process (lot_number) VALUES ('$lot_number')";                       
            $result = mysqli_query($conn, $sql);

            if ($result == FALSE) {
                echo "<script languaje='javascript'>alert('Error.... please try again');</script>";
            } else {
                $filas = mysqli_affected_rows($conn);
                if ($filas > 0){

                    $sql2= "INSERT INTO status (shift, lot_number) VALUES ('1','$lot_number')";
                    $result = mysqli_query($conn, $sql2);
                    // echo "<script languaje='javascript'>alert('the information entered successfully');</script>";

                    $sql3= "INSERT INTO observations (shift, lot_number) VALUES ('1', '$lot_number')";
                    $result = mysqli_query($conn, $sql3);
                } 
            }

        } else {
            echo "<script languaje='javascript'>alert('Fill all the fields and try again');</script>";
        }

 }
       
 if (isset($_POST["filling2"])) {
    
    $shift = $_POST["shift2"] ;
    $lot_number = $_POST["lot_number2"] ;
    $fecha = date("Y-m-d");

    if ($shift<>"" and $lot_number<>"") {
       
            $sql= "INSERT INTO status (shift, lot_number, fecha) VALUES ('$shift', '$lot_number', '$fecha')";
            $result = mysqli_query($conn, $sql);

            if ($result == FALSE) {
                echo "<script languaje='javascript'>alert('Error.... please try again');</script>";
            } else {
                $filas = mysqli_affected_rows($conn);
            
                if ($filas > 0){
                    
                    $sql2= "INSERT INTO observations (shift, lot_number) VALUES ('$shift', '$lot_number')";
                    $result = mysqli_query($conn, $sql2);
                    //$id=mysqli_insert_id($conn);
                    // echo "<script languaje='javascript'>alert('the information entered successfully');</script>";
                } else {
                    if ($filas < 0 ) {
                    echo "<script languaje='javascript'>alert('" . mysqli_info($result) . " Registro Exitoso');</script>";
                    }
                }
            }

        } else {
            echo "<script languaje='javascript'>alert('Fill all the fields and try again');</script>";
        }

 }


 if (isset($_POST["filling4"]) and  isset($_SESSION['iduser']) ) {
    
    $lot_number = $_POST["lot_number4"] ;

    if ($lot_number<>"") {
       
        $cell = $_POST["cell4"];
        $fecha = date("Y-m-d");
        $hora= date('h:i:s A');
        if (isset($_POST["valor"])) {
            $valor = $_POST["valor"];
        } else {
            $valor = "";
        }
        
        $problem = $_POST["problem4"];
        if (isset($_POST["color4"])) {
            $color = $_POST["color4"];
        } else {
            $color = "";
        }

        $user= $_SESSION['iduser'];

        $sql= "INSERT INTO problems_process (usuario, fecha, hora, valor,  problem, color) 
                    VALUES ('$user', '$fecha', '$hora', '$valor', '$problem', '$color')";
        
            $result = mysqli_query($conn, $sql);
            echo "<h2>".$sql."</h2>";

            if ($result == FALSE) {
                
                echo "<script languaje='javascript'>console.log('$sql');</script>";
            } else {
                $filas = mysqli_affected_rows($conn);
            
                if ($filas > 0){
                    $id=mysqli_insert_id($conn);

                    if ($cell=='first_blister') {
                            $fecha = date("Y-m-d");
                        $sql= "UPDATE process SET $cell ='$id', start_date='$fecha' WHERE lot_number='$lot_number'";  
                    } else {
                        $sql= "UPDATE process SET $cell ='$id' WHERE lot_number='$lot_number'";  
                    }
                    
                    $result = mysqli_query($conn, $sql);

                    // echo "<script languaje='javascript'>alert('the information entered successfully');</script>";
                } else {
                    if ($filas < 0 ) {
                    echo "<script languaje='javascript'>alert('" . mysqli_info($result) . " Registro Exitoso');</script>";
                    }
                }
            }

        } else {
            echo "<script languaje='javascript'>alert('Fill all the fields and try again');</script>";
        }

 }

 if (isset($_POST["tipo"])) {
    
    $tipo = $_POST["tipo"] ;
    $idx = $_POST["idx"] ;

    if ($tipo<>"" and $idx<>"") {
       
        $repaired = $_POST["repaired"];

            if ($tipo=='status') {
                $sql= "UPDATE problems_status SET repaired ='$repaired' WHERE id='$idx'";   
            } else {
                $sql= "UPDATE problems_process SET repaired ='$repaired' WHERE id='$idx'";   
            }
        
            $result = mysqli_query($conn, $sql);

            if ($result == FALSE) {

                echo "<script languaje='javascript'>alert('Error.... please try again');</script>";
            } else {
                $filas = mysqli_affected_rows($conn);
            
                if ($filas > 0){
                        // echo "<script languaje='javascript'>alert('the information entered successfully');</script>";
                } else {
                    if ($filas < 0 ) {
                        echo "<script languaje='javascript'>alert('" . mysqli_info($result) . " Registro Exitoso');</script>";
                    }
                }
            }

        } else {
            echo "<script languaje='javascript'>alert('Fill all the fields and try again');</script>";
        }

 }

 if (isset($_POST["tipob"])) {
    
    $tipo = $_POST["tipob"] ;
    $idx = $_POST["idxb"] ;

    if ($tipo<>"" and $idx<>"") {
       
        $repaired = $_POST["repairedb"];

            if ($tipo=='status') {
                $sql= "UPDATE problems_status SET repaired ='$repaired' WHERE id='$idx'";   
            } else {
                $sql= "UPDATE problems_process SET repaired ='$repaired' WHERE id='$idx'";   
            }
        
            $result = mysqli_query($conn, $sql);

            if ($result == FALSE) {

                echo "<script languaje='javascript'>alert('Error.... please try again');</script>";
            } else {
                $filas = mysqli_affected_rows($conn);
            
                if ($filas > 0){
                        // echo "<script languaje='javascript'>alert('the information entered successfully');</script>";
                } else {
                    if ($filas < 0 ) {
                        echo "<script languaje='javascript'>alert('" . mysqli_info($result) . " Registro Exitoso');</script>";
                    }
                }
            }

        } else {
            echo "<script languaje='javascript'>alert('Fill all the fields and try again');</script>";
        }

 }

    if (isset($_POST["lotnumber"])) {

        $lotnumber= $_POST["lotnumber"];

        $sql= "SELECT * FROM status WHERE lot_number='$lotnumber' AND shift='Total'";
        $result2 = mysqli_query($conn, $sql);
        $totalfilas = mysqli_num_rows($result2);

        if ($totalfilas>0) {

            echo "<script languaje='javascript'>alert('Ended Succesfully') </script>";

        } else {

                /* $sqlx= "SHOW COLUMNS FROM status;";     
                $resultx = mysqli_query($conn, $sqlx); */
                
                $sqlzb= "SELECT sum(`cell_1`)as cell1, sum(`cell_2`)as cell2, sum(`cell_3`)as cell3, 
                        sum(`cell_4`)as cell4, sum(`cell_5`)as cell5, sum(`cell_6`)as cell6, 
                        sum(`cell_7`)as cell7, sum(`klockner`)as klockner, sum(`printer`)as printer,
                        sum(`leak_test`)as leak_test, sum(`unplanned_other`)as unplanned_other FROM status WHERE lot_number='$lotnumber'";
                $resultb = mysqli_query($conn, $sqlzb);
                if (mysqli_num_rows($resultb)) {
                    $row = mysqli_fetch_assoc($resultb);
                    
                    $cell1=$row['cell1'];    $cell2=$row['cell2'];    $cell3=$row['cell3'];    $cell4=$row['cell4'];
                    $cell5=$row['cell5'];    $cell6=$row['cell6'];    $cell7=$row['cell7'];    $cell8=$row['klockner'];
                    $cell9=$row['printer'];    $cell10=$row['leak_test'];  $cell11=$row['unplanned_other'];

                    $sqlw= "INSERT INTO status (id,shift,lot_number,cell_1,cell_2,cell_3,cell_4,cell_5,cell_6,cell_7,klockner,printer,leak_test,unplanned_other) 
                    VALUES (NULL,'Total','$lotnumber','$cell1','$cell2','$cell3','$cell4','$cell5','$cell6','$cell7','$cell8','$cell9','$cell10','$cell11')";
                    mysqli_query($conn, $sqlw);


                    $sqlzx= "SELECT filler_counter_shift_end, blisters_shippers_shift_end 
                                FROM status WHERE lot_number='$lotnumber' AND filler_counter_shift_end > 0 ORDER BY id DESC LIMIT 1";
                    $resultx = mysqli_query($conn, $sqlzx);
                        if (mysqli_num_rows($resultx)) {
                            $rowx = mysqli_fetch_assoc($resultx);
                            $fillercounter = $rowx['filler_counter_shift_end'];
                            $blistershippers = $rowx['blisters_shippers_shift_end'];
                        }

                    $fechaw = date("Y-m-d");
                    $sql= "UPDATE process SET end_date ='$fechaw', saved ='SI', 
                                counter='$fillercounter', 
                                total_blister_in_shippers='$blistershippers'
                                WHERE lot_number='$lotnumber'";  
                    mysqli_query($conn, $sql);

                    $sql2= "UPDATE status SET saved ='SI' WHERE lot_number='$lotnumber'";  
                    $result= mysqli_query($conn, $sql2);

                }
                   
        }

    }


?>
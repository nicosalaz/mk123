<?php

include '../config.php'; 


$sql="SELECT * FROM agenda"; 


if ($conexion->query($sql)->num_rows)
{ 


    $datos = array(); 

    $i=0; 

    $e = $conexion->query($sql); 

    while($row=$e->fetch_array()) 
    {   
        $datos[$i] = $row; 
        $i++;
    }

    // Transformamos los datos encontrado en la BD al formato JSON
        echo json_encode(
                array(
                    "success" => 1,
                    "result" => $datos
                )
            );

    }
    else
    {
        echo "No hay datos"; 
    }


?>

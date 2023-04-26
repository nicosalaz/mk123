<?php  session_start(); 

        require 'config.php';  // INTEGRAMOS LAS CONEXIONES QUE HAY EN ESTE ARCHIVO //

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Metrics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css">

    <script type="text/javascript" src="loader.js"></script>   <!-- LIBRERIA PARA HACER LAS GRAFICAS -->

</head>

<?php   /* TOMA LOS PARAMETROS QUE VIENEN POR LA URL Y LOS ALMACENA EN VARIABLES HASTA LA LINEA 50 */

        if (!isset($_GET['tipo2']) or $_GET['tipo2']=="") {
            $tipo2= "columns";
        } else {
            $tipo2=$_GET['tipo2'];     
        } 

        if (!isset($_GET['monthx']) or $_GET['monthx']=="") {
            $monthx= date("Y-m-d");
        } else {
            $monthx=$_GET['monthx'];           
        }
        if (!isset($_GET['monthx2']) or $_GET['monthx2']=="") {
            $monthx2= date("Y-m-d");
        } else {
            $monthx2=$_GET['monthx2'];           
        }
        for ($i=1; $i < 21; $i++) { 
            $fechax[$i]=""; $totalx[$i]="";
        }

        if (!isset($_GET['tipo']) or $_GET['tipo']=="") {
            $tipo= "Required";
            $tipox= "dateRequired";
        } else if($_GET['tipo']=="Required"){
            $tipo= "Required";
            $tipox= "dateRequired";     
        } else if($_GET['tipo']=="Finish") {
            $tipo= "Finish";
            $tipox= "dateFinish";     
        } 
            /* SEGUN LOS PARAMETROS QUE VIENEN POR LA URL SE HACEN LAS CONSULTAS PARA OBTENER LOS DATOS DE LA GRAFICA */

        if(isset($_GET['tipo']) and $_GET['tipo']=="Vendor") {
            $tipo= "Vendor";  $tipox= "vendor";  
            $sql= "SELECT vendor, COUNT(id) as total
            FROM `orders` WHERE dateRequired >='$monthx 01:01:01' AND dateRequired <='$monthx2 23:30:30'   
            GROUP BY vendor ORDER BY total DESC";
        } else if(isset($_GET['tipo']) and $_GET['tipo']=="Accepted") {
            $tipo= "Accepted"; $tipox= "acceptedBy";     
            $sql= "SELECT nombre, COUNT(orders.id) as total 
            FROM `orders` left join users on orders.acceptedBy= users.id
            WHERE dateAccepted >='$monthx 01:01:01'  AND dateAccepted <='$monthx2 23:30:30'  
            GROUP BY acceptedBy";
        } else{
            $sql= "SELECT DATE_FORMAT($tipox,'%M/%d') as fecha, COUNT(id) as total
            FROM `orders` WHERE $tipox >='$monthx 01:01:01' AND  $tipox <='$monthx2 23:30:30'  
            GROUP BY DATE_FORMAT($tipox,'%M/%d/%Y') ORDER BY dateRequired  ASC";
        }
        
        $result1 = mysqli_query($conn, $sql);
        $totalfilas = mysqli_num_rows($result1);

        if ($totalfilas>0) {
                    $j=0;
            while($fila = mysqli_fetch_array($result1) ){  
                    $j++;
                    $fechax[$j]=$fila[0];  /* SE LLENAN LAS MATRICES DE FECHA Y TOTAL PARA LAS GRAFICAS */
                    $totalx[$j]=$fila[1]; 
            }
        }

?>

<div class="menux">
              <a class="menu" href="index.php" >New Request</a>
              <a class="menu" href="info.php">Info</a>
              <a class="logout" href="logout.php">Logout</a>
          </div> 


          <div class="row" style="text-align:center;margin:0.2% !important">

<div class="col-sm-6" style='margin-left:120px'>

    <div class="input-group">
     
        <input class="form-control input-sm" style='width:130px;height:40px;padding:2px;float:left;' 
                type="date" name="fsn_month" id="fsn_month" value="<?php echo $monthx?>">

        <input class="form-control input-sm" style='width:130px;height:40px;padding:2px;float:left;' 
                type="date" name="fsn_month2" id="fsn_month2" value="<?php echo $monthx2?>">


        <select class="form-control input-sm"  
                    style='width:80px;height:40px;padding:2px;float:left;' id="tipo" name="tipo">
            <option value="<?php echo $tipo?>"><?php echo $tipo?></option>
            <option value="Required">Required</option>
            <option value="Finish">Finish</option>
            <option value="Vendor">Vendor</option>
            <option value="Accepted">Accepted By</option>
        </select>   

        <select class="form-control input-sm"  
                    style='width:80px;height:40px;padding:2px;float:left;' id="tipo2" name="tipo2">
            <option value="<?php echo $tipo2?>"><?php echo $tipo2?></option>
            <option value="columns">Columns</option>
            <option value="lines">Lines</option>
            <option value="bars">Bars</option>
        </select>
                                <!-- BOTON PARA ACTIVAR LA FUNCION QUE MUESTRA LA GRAFICA ENVIANDO LOS PARAMETROS -->
            <button style="margin-left:30px" onclick="cambiames(fsn_month.value,fsn_month2.value,tipo.value,tipo2.value)">View</button>

    </div>

</div>


</div>


    <script type="text/javascript">

            function cambiames(X,X2,T,T2){    
                window.location = "metrics.php?monthx="+X+"&monthx2="+X2+"&tipo="+T+"&tipo2="+T2;        
            }

            google.charts.load("current", {packages:['corechart']});
            google.charts.setOnLoadCallback(drawChart);
         

        function drawChart() {

            <?php  if ($fechax[20]<>"") {  /* SE PREGUNTA POR EL CONTENIDO DE LAS MATRICES SI TIENE ALGUN VALOR */  ?>
                                            /* EN CASO DE TENER UN VALOR EN ESTE CASO EN EL INDICE 20 
                                                SE FORMA UNA MATRIZ CON LOS DATOS QUE HAY HASTA EL ITEM 20  */
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"],
                    ['<?php echo $fechax[6]?>', <?php echo $totalx[6]?>, "pink"],
                    ['<?php echo $fechax[7]?>', <?php echo $totalx[7]?>, "red"],
                    ['<?php echo $fechax[8]?>', <?php echo $totalx[8]?>, "blue"],
                    ['<?php echo $fechax[9]?>', <?php echo $totalx[9]?>, "purple"],
                    ['<?php echo $fechax[10]?>', <?php echo $totalx[10]?>, "gold"],
                    ['<?php echo $fechax[11]?>', <?php echo $totalx[11]?>, "yellowGreen"],
                    ['<?php echo $fechax[12]?>', <?php echo $totalx[12]?>, "maroon"],
                    ['<?php echo $fechax[13]?>', <?php echo $totalx[13]?>, "pink"],
                    ['<?php echo $fechax[14]?>', <?php echo $totalx[14]?>, "red"],
                    ['<?php echo $fechax[15]?>', <?php echo $totalx[15]?>, "blue"],
                    ['<?php echo $fechax[16]?>', <?php echo $totalx[16]?>, "silver"],
                    ['<?php echo $fechax[17]?>', <?php echo $totalx[17]?>, "gold"],
                    ['<?php echo $fechax[18]?>', <?php echo $totalx[18]?>, "green"],
                    ['<?php echo $fechax[19]?>', <?php echo $totalx[19]?>, "maroon"],
                    ['<?php echo $fechax[20]?>', <?php echo $totalx[20]?>, "pink"]
                ]);
                <?php } else if($fechax[19]<>""){  /* SE PREGUNTA POR EL CONTENIDO DE LAS MATRICES SI TIENE ALGUN VALOR */  ?>
                                            /* EN CASO DE TENER UN VALOR EN ESTE CASO EN EL INDICE 19 
                                                SE FORMA UNA MATRIZ CON LOS DATOS QUE HAY HASTA EL ITEM 19  */  ?>

                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"],
                    ['<?php echo $fechax[6]?>', <?php echo $totalx[6]?>, "pink"],
                    ['<?php echo $fechax[7]?>', <?php echo $totalx[7]?>, "red"],
                    ['<?php echo $fechax[8]?>', <?php echo $totalx[8]?>, "blue"],
                    ['<?php echo $fechax[9]?>', <?php echo $totalx[9]?>, "purple"],
                    ['<?php echo $fechax[10]?>', <?php echo $totalx[10]?>, "gold"],
                    ['<?php echo $fechax[11]?>', <?php echo $totalx[11]?>, "yellowGreen"],
                    ['<?php echo $fechax[12]?>', <?php echo $totalx[12]?>, "maroon"],
                    ['<?php echo $fechax[13]?>', <?php echo $totalx[13]?>, "pink"],
                    ['<?php echo $fechax[14]?>', <?php echo $totalx[14]?>, "red"],
                    ['<?php echo $fechax[15]?>', <?php echo $totalx[15]?>, "blue"],
                    ['<?php echo $fechax[16]?>', <?php echo $totalx[16]?>, "silver"],
                    ['<?php echo $fechax[17]?>', <?php echo $totalx[17]?>, "gold"],
                    ['<?php echo $fechax[18]?>', <?php echo $totalx[18]?>, "green"],
                    ['<?php echo $fechax[19]?>', <?php echo $totalx[19]?>, "maroon"]
                ]);
           <?php } else if($fechax[18]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"],
                    ['<?php echo $fechax[6]?>', <?php echo $totalx[6]?>, "pink"],
                    ['<?php echo $fechax[7]?>', <?php echo $totalx[7]?>, "red"],
                    ['<?php echo $fechax[8]?>', <?php echo $totalx[8]?>, "blue"],
                    ['<?php echo $fechax[9]?>', <?php echo $totalx[9]?>, "purple"],
                    ['<?php echo $fechax[10]?>', <?php echo $totalx[10]?>, "gold"],
                    ['<?php echo $fechax[11]?>', <?php echo $totalx[11]?>, "yellowGreen"],
                    ['<?php echo $fechax[12]?>', <?php echo $totalx[12]?>, "maroon"],
                    ['<?php echo $fechax[13]?>', <?php echo $totalx[13]?>, "pink"],
                    ['<?php echo $fechax[14]?>', <?php echo $totalx[14]?>, "red"],
                    ['<?php echo $fechax[15]?>', <?php echo $totalx[15]?>, "blue"],
                    ['<?php echo $fechax[16]?>', <?php echo $totalx[16]?>, "silver"],
                    ['<?php echo $fechax[17]?>', <?php echo $totalx[17]?>, "gold"],
                    ['<?php echo $fechax[18]?>', <?php echo $totalx[18]?>, "green"]
                ]);
                <?php } else if($fechax[17]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"],
                    ['<?php echo $fechax[6]?>', <?php echo $totalx[6]?>, "pink"],
                    ['<?php echo $fechax[7]?>', <?php echo $totalx[7]?>, "red"],
                    ['<?php echo $fechax[8]?>', <?php echo $totalx[8]?>, "blue"],
                    ['<?php echo $fechax[9]?>', <?php echo $totalx[9]?>, "purple"],
                    ['<?php echo $fechax[10]?>', <?php echo $totalx[10]?>, "gold"],
                    ['<?php echo $fechax[11]?>', <?php echo $totalx[11]?>, "yellowGreen"],
                    ['<?php echo $fechax[12]?>', <?php echo $totalx[12]?>, "maroon"],
                    ['<?php echo $fechax[13]?>', <?php echo $totalx[13]?>, "pink"],
                    ['<?php echo $fechax[14]?>', <?php echo $totalx[14]?>, "red"],
                    ['<?php echo $fechax[15]?>', <?php echo $totalx[15]?>, "blue"],
                    ['<?php echo $fechax[16]?>', <?php echo $totalx[16]?>, "silver"],
                    ['<?php echo $fechax[17]?>', <?php echo $totalx[17]?>, "gold"]
                ]);
                <?php } else if($fechax[16]<>""){ ?>

                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"],
                    ['<?php echo $fechax[6]?>', <?php echo $totalx[6]?>, "pink"],
                    ['<?php echo $fechax[7]?>', <?php echo $totalx[7]?>, "red"],
                    ['<?php echo $fechax[8]?>', <?php echo $totalx[8]?>, "blue"],
                    ['<?php echo $fechax[9]?>', <?php echo $totalx[9]?>, "purple"],
                    ['<?php echo $fechax[10]?>', <?php echo $totalx[10]?>, "gold"],
                    ['<?php echo $fechax[11]?>', <?php echo $totalx[11]?>, "yellowGreen"],
                    ['<?php echo $fechax[12]?>', <?php echo $totalx[12]?>, "maroon"],
                    ['<?php echo $fechax[13]?>', <?php echo $totalx[13]?>, "pink"],
                    ['<?php echo $fechax[14]?>', <?php echo $totalx[14]?>, "red"],
                    ['<?php echo $fechax[15]?>', <?php echo $totalx[15]?>, "blue"],
                    ['<?php echo $fechax[16]?>', <?php echo $totalx[16]?>, "silver"]
                ]);
                <?php } else if($fechax[15]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"],
                    ['<?php echo $fechax[6]?>', <?php echo $totalx[6]?>, "pink"],
                    ['<?php echo $fechax[7]?>', <?php echo $totalx[7]?>, "red"],
                    ['<?php echo $fechax[8]?>', <?php echo $totalx[8]?>, "blue"],
                    ['<?php echo $fechax[9]?>', <?php echo $totalx[9]?>, "purple"],
                    ['<?php echo $fechax[10]?>', <?php echo $totalx[10]?>, "gold"],
                    ['<?php echo $fechax[11]?>', <?php echo $totalx[11]?>, "yellowGreen"],
                    ['<?php echo $fechax[12]?>', <?php echo $totalx[12]?>, "maroon"],
                    ['<?php echo $fechax[13]?>', <?php echo $totalx[13]?>, "pink"],
                    ['<?php echo $fechax[14]?>', <?php echo $totalx[14]?>, "red"],
                    ['<?php echo $fechax[15]?>', <?php echo $totalx[15]?>, "blue"]
                ]);
             <?php } else if($fechax[14]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"],
                    ['<?php echo $fechax[6]?>', <?php echo $totalx[6]?>, "pink"],
                    ['<?php echo $fechax[7]?>', <?php echo $totalx[7]?>, "red"],
                    ['<?php echo $fechax[8]?>', <?php echo $totalx[8]?>, "blue"],
                    ['<?php echo $fechax[9]?>', <?php echo $totalx[9]?>, "purple"],
                    ['<?php echo $fechax[10]?>', <?php echo $totalx[10]?>, "gold"],
                    ['<?php echo $fechax[11]?>', <?php echo $totalx[11]?>, "yellowGreen"],
                    ['<?php echo $fechax[12]?>', <?php echo $totalx[12]?>, "maroon"],
                    ['<?php echo $fechax[13]?>', <?php echo $totalx[13]?>, "pink"],
                    ['<?php echo $fechax[14]?>', <?php echo $totalx[14]?>, "red"]
                ]);
                <?php } else if($fechax[13]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"],
                    ['<?php echo $fechax[6]?>', <?php echo $totalx[6]?>, "pink"],
                    ['<?php echo $fechax[7]?>', <?php echo $totalx[7]?>, "red"],
                    ['<?php echo $fechax[8]?>', <?php echo $totalx[8]?>, "blue"],
                    ['<?php echo $fechax[9]?>', <?php echo $totalx[9]?>, "purple"],
                    ['<?php echo $fechax[10]?>', <?php echo $totalx[10]?>, "gold"],
                    ['<?php echo $fechax[11]?>', <?php echo $totalx[11]?>, "yellowGreen"],
                    ['<?php echo $fechax[12]?>', <?php echo $totalx[12]?>, "maroon"],
                    ['<?php echo $fechax[13]?>', <?php echo $totalx[13]?>, "pink"]
                ]);
                <?php } else if($fechax[12]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"],
                    ['<?php echo $fechax[6]?>', <?php echo $totalx[6]?>, "pink"],
                    ['<?php echo $fechax[7]?>', <?php echo $totalx[7]?>, "red"],
                    ['<?php echo $fechax[8]?>', <?php echo $totalx[8]?>, "blue"],
                    ['<?php echo $fechax[9]?>', <?php echo $totalx[9]?>, "purple"],
                    ['<?php echo $fechax[10]?>', <?php echo $totalx[10]?>, "gold"],
                    ['<?php echo $fechax[11]?>', <?php echo $totalx[11]?>, "yellowGreen"],
                    ['<?php echo $fechax[12]?>', <?php echo $totalx[12]?>, "maroon"]
                ]);
                <?php } else if($fechax[11]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"],
                    ['<?php echo $fechax[6]?>', <?php echo $totalx[6]?>, "pink"],
                    ['<?php echo $fechax[7]?>', <?php echo $totalx[7]?>, "red"],
                    ['<?php echo $fechax[8]?>', <?php echo $totalx[8]?>, "blue"],
                    ['<?php echo $fechax[9]?>', <?php echo $totalx[9]?>, "purple"],
                    ['<?php echo $fechax[10]?>', <?php echo $totalx[10]?>, "gold"],
                    ['<?php echo $fechax[11]?>', <?php echo $totalx[11]?>, "yellowGreen"]
                ]);
                <?php } else if($fechax[10]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"],
                    ['<?php echo $fechax[6]?>', <?php echo $totalx[6]?>, "pink"],
                    ['<?php echo $fechax[7]?>', <?php echo $totalx[7]?>, "red"],
                    ['<?php echo $fechax[8]?>', <?php echo $totalx[8]?>, "blue"],
                    ['<?php echo $fechax[9]?>', <?php echo $totalx[9]?>, "purple"],
                    ['<?php echo $fechax[10]?>', <?php echo $totalx[10]?>, "gold"]
                ]);
                <?php } else if($fechax[9]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"],
                    ['<?php echo $fechax[6]?>', <?php echo $totalx[6]?>, "pink"],
                    ['<?php echo $fechax[7]?>', <?php echo $totalx[7]?>, "red"],
                    ['<?php echo $fechax[8]?>', <?php echo $totalx[8]?>, "blue"],
                    ['<?php echo $fechax[9]?>', <?php echo $totalx[9]?>, "purple"]
                ]);
                <?php } else if($fechax[8]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"],
                    ['<?php echo $fechax[6]?>', <?php echo $totalx[6]?>, "pink"],
                    ['<?php echo $fechax[7]?>', <?php echo $totalx[7]?>, "red"],
                    ['<?php echo $fechax[8]?>', <?php echo $totalx[8]?>, "blue"]
                ]);
                <?php } else if($fechax[7]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"],
                    ['<?php echo $fechax[6]?>', <?php echo $totalx[6]?>, "pink"],
                    ['<?php echo $fechax[7]?>', <?php echo $totalx[7]?>, "red"]
                ]);
                <?php } else if($fechax[6]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"],
                    ['<?php echo $fechax[6]?>', <?php echo $totalx[6]?>, "pink"]
                ]);
                <?php } else if($fechax[5]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"],
                    ['<?php echo $fechax[5]?>', <?php echo $totalx[5]?>, "maroon"]
                ]);
                <?php } else if($fechax[4]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"],
                    ['<?php echo $fechax[4]?>', <?php echo $totalx[4]?>, "green"]
                ]);
                <?php } else if($fechax[3]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"],
                    ['<?php echo $fechax[3]?>', <?php echo $totalx[3]?>, "gold"]
                ]);
                <?php } else if($fechax[2]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"],
                    ['<?php echo $fechax[2]?>', <?php echo $totalx[2]?>, "silver"]
                ]);
                <?php } else if($fechax[1]<>""){ ?>
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ['<?php echo $fechax[1]?>', <?php echo $totalx[1]?>, "chocolate"]
                ]);
           <?php } ?>
           

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                            { calc: "stringify",
                                sourceColumn: 1,
                                type: "string",
                                role: "annotation" },
                            2]);

            var options = {  /* SE CONFIGURAN LAS OPCIONES PARA LA GRAFICA */
                title: "<?php echo $tipo?> Daily",
                width: 1200,
                height: 500,
                curveType: 'function',
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
                        /* SEGUN EL VALOR DE LA VARIABLE tipo2 SE ESCOGE EL TIPO DE GRAFICA */
            <?php if ($tipo2=='lines') { ?>
                var chart = new google.visualization.LineChart(document.getElementById("columnchart_values"));
            <?php } ?>
            <?php if ($tipo2=='columns') { ?>
                var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            <?php } ?>
            <?php if ($tipo2=='bars') { ?>
                var chart = new google.visualization.BarChart(document.getElementById("columnchart_values"));
            <?php } ?>
            
            chart.draw(view, options);
        }
  </script>
                /* ESTA ES LA SALIDA PARA LA GRAFICA */
        <div id="columnchart_values" style="width: 200px; height: 300px; margin-left:2%"></div>


</html>
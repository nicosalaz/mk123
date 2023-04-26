<?php

    include 'funciones.php';
    include 'config.php';


if (isset($_POST['from']) or isset($_POST['from2'])) 
{      /* $query1="";    $query2="";    $query3="";    $query4=""; */

    if ($_POST['from']!="") 
    {

        $Datein = date('d/m/Y H:i:s', strtotime($_POST['from']));
        $Datefi = date('d/m/Y H:i:s', strtotime($_POST['from']));
        $inicio = _formatear($Datein);
        $final  = _formatear($Datefi);
        $orderDate = date('d/m/Y H:i:s', strtotime($_POST['from']));
        $inicio_normal = $orderDate;
        $orderDate2 = date('d/m/Y H:i:s', strtotime($_POST['from']));
        $final_normal  = $orderDate2;
             $tit1=""; $tit2=""; $tit3=""; $tit4=""; $titulo="";
             
        if ( isset($_POST['pcf_level2'])) {$tit1= " level2 -";}
        if ( isset($_POST['pcf_level3'])) {$tit1= $tit1." level3 -";}
        if ( isset($_POST['pcf_soap'])) {$tit1= $tit1." soap -";}
        if ( isset($_POST['pcf_spk'])) {$tit1= $tit1." spk ";}        
            $tit1= "PCF ".$tit1; 

        if ( isset($_POST['nfs_level2'])) {$tit2= " level2 -";}
        if ( isset($_POST['nfs_level3'])) {$tit2= $tit2." level3 -";}
        if ( isset($_POST['nfs_soap'])) {$tit2= $tit2." soap -";}
        if ( isset($_POST['nfs_spk'])) {$tit2= $tit2." spk ";}        
            $tit2= "NFS ".$tit2;

        if ( isset($_POST['WD_level2'])) {$tit3= "  level2 -";}
        if ( isset($_POST['WD_level3'])) {$tit3= $tit3."  level3 -";}
        if ( isset($_POST['WD_soap'])) {$tit3= $tit3."  soap -";}
        if ( isset($_POST['WD_spk'])) {$tit3= $tit3."  spk";}        
            $tit3= "WD ".$tit3;

        if ( isset($_POST['WSD_level2'])) {$tit4= "   level2 -";}
        if ( isset($_POST['WSD_level3'])) {$tit4= $tit4."   level3 -";}
        if ( isset($_POST['WSD_soap'])) {$tit4= $tit4."   soap -";}
        if ( isset($_POST['WSD_spk'])) {$tit4= $tit4."   spk";}        
            $tit4= "WSD ".$tit4;

        $body   = evaluar($_POST['event']);
        $clase  = evaluar($_POST['class']);

        $query1="INSERT INTO agenda VALUES(null,'$tit1','$tit2','$tit3','$tit4','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal')";

        $conexion->query($query1)or die('<script type="text/javascript">alert("Horario No Disponible ")</script>');
 

        $im=$conexion->query("SELECT MAX(id) AS id FROM agenda");
        $row = $im->fetch_row();  
        $id = trim($row[0]);

        $link = "$base_url"."descripcion_evento.php?id=$id";

        $query2="UPDATE agenda SET url = '$link' WHERE id = $id";

        $conexion->query($query2); 

         
    }


    if ($_POST['from2']!="") 
    {

        $Datein  = date('d/m/Y H:i:s', strtotime($_POST['from2']));
        $Datefi  = date('d/m/Y H:i:s', strtotime($_POST['from2']));
        $inicio = _formatear($Datein);       
        $final  = _formatear($Datefi);
        $orderDate  = date('d/m/Y H:i:s', strtotime($_POST['from2']));
        $inicio_normal = $orderDate;
       
        $orderDate2  = date('d/m/Y H:i:s', strtotime($_POST['from2']));
        $final_normal  = $orderDate2;

             $tit1=""; $tit2=""; $tit3=""; $tit4="";$tit5="";$tit6="";
             $tit7="";$tit8="";$tit9="";$tit10="";$tit11="";$tit12="";$tit13="";$tit14="";

        if ( isset($_POST['LP_1'])) {$tit1= "LP #1";}
        if ( isset($_POST['LP_2'])) {$tit2= "LP #2";}
        if ( isset($_POST['LP_3'])) {$tit3= "LP #3";}
        if ( isset($_POST['LP_4'])) {$tit4= "LP #4";}        
        if ( isset($_POST['LP_5'])) {$tit5= "LP #5";}
        if ( isset($_POST['LP_6'])) {$tit6= "LP #6";}  
        if ( isset($_POST['equipment_cleanning'])) {$tit7= "Equipment Cleanning";}
        if ( isset($_POST['silverson'])) {$tit8= "Silverson";}
        if ( isset($_POST['ika'])) {$tit9= "IKA";}
        if ( isset($_POST['50_liter'])) {$tit10= "50 Liter";}   
        if ( isset($_POST['scrubber'])) {$tit11= "Scrubber";}           
        if ( isset($_POST['bosch_filling_station'])) {$tit12= "Bosch Filling Station";}           
        if ( isset($_POST['sd_micro_1'])) {$tit13= "SD Micro 1";}           
        if ( isset($_POST['sd_micro_2'])) {$tit14= "SD Micro 2";}           
     
        $body   = evaluar($_POST['event2']);
        $clase  = evaluar($_POST['class2']);

        $query3="INSERT INTO agenda2 
        VALUES(null,'$tit1','$tit2','$tit3','$tit4','$tit5','$tit6','$tit7','$tit8','$tit9','$tit10',
                '$tit11','$tit12','$tit13','$tit14','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal')";
        $conexion->query($query3)or die('<script type="text/javascript">alert("Horario No Disponible ")</script>');

        $im=$conexion->query("SELECT MAX(id) AS id FROM agenda2");
        $row = $im->fetch_row();  
        $id = trim($row[0]);

        $link = "$base_url2"."descripcion_evento.php?id=$id";

        $query4="UPDATE agenda2 SET url = '$link' WHERE id = $id";
        $conexion->query($query4); 

    }


}

?>


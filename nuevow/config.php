<?php 

error_reporting(E_ALL); ini_set('display_errors', '1');
date_default_timezone_set("America/Bogota");

    function conectar(){
        try { 
            $link=new pdo("mysql:host=localhost:3306;dbname=control_process","root",""); 
        } catch(PDOException $e) { 
            echo 'ERROR: '; 
        } 
        return $link;
    }


    define('URL', 'http://localhost:81/nuevow/');
    $servername = "localhost";
    $database = "control_process";
    $username = "root";
    $password = "";

    $conexion = new mysqli($servername, $username, $password, $database,3306);	
 $conexion->set_charset('utf8');
    if ($conexion->connect_errno) {
        echo "Error al conectar la base de datosssss {$conexion->connect_errno}";
    }
   $base_url="http://localhost:81/nuevow/calendar/";
   $base_url2="http://localhost:81/nuevow/calendar2/";

   

    $conn = mysqli_connect($servername, $username, $password, $database);

    //////////// https://www.arclab.com/en/kb/email/list-of-smtp-and-pop3-servers-mailserver-list.html ////////

    //////////// Yahoo //////////////////////
   /*  $host = 'smtp.mail.yahoo.com';   
    $servermail ='@yahoo.com';
    $portx= '587';    // or  465 for ssl   
    $clave = 'segura';
    $authentication = 'tls'; */

    //////////// Outlook //////////////////
    $host = 'smtp.live.com'; 
    $servermail ='XXXXX@hotmail.com';
    $portx= '587';      
    $clave = 'XXXXX';
    $authentication = 'StartTLS'; 

    //////////// Gmail //////////////////
    /* $host = 'smtp.gmail.com';   
    $servermail ='ma20@gmail.com';
    $portx = '587';     
    $clave = 'Lunna';
    $authentication = 'tls'; */ 
    /////////////////////////////////////////////////////////////////////////////////////////////////


    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    function inspectorx($conn,$id){

        $sql= "SELECT nombre FROM users WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_row($result)) {
            return $row[0];
        }
        
    }

?>




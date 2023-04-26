<?php  session_start();

require 'config.php'; // INTEGRAMOS LAS CONEXIONES QUE HAY EN ESTE ARCHIVO

?>
     <!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Incomming Inspection</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
     

<div id='enviarx'>

<?php

// Import PHPMailer classes into the global namespace

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

        ////// SE REQUIERE LA LIBRERIA DE PHPMAILER QUE SE ENCUENTRA EN LA CARPETA MAILER ///////

    require 'mailer/Exception.php';
    require 'mailer/PHPMailer.php';
    require 'mailer/SMTP.php';

        /////// SE CAPTURAN LOS VALORES DE LOS CAMPOS QUE VIENEN DEL FORMULARIO - New Request - Y SE INGRESAN EN VARIABLES /////////

    $clave= $_POST['clave'];
    $site= $_POST['site'];
    $order= $_POST['order'];
    $vendor = strtolower($_POST['vendor']);
    $here_or_coming = $_POST['here_or_coming'];
    $when_is_coming = $_POST['when_is_coming'];
    $tracking_number = $_POST['tracking_number'];
    $email= $_POST['email'];
    $comments = strtolower($_POST['comments']);
    $location = $_POST['location'];

    $ahora = date("Y-m-d H:i:s"); 

    if ($site=="" OR $order=="" OR $email=="") { ?>
                    
        <div class='mensajes'>Please fill all the data <br> <br> 
            <button  class="btn btn-outline-danger" onclick='goBack()'>Go Back</button>
        </div>

  <?php  } else {  ////// EN LA VARIABLE SALIDA SE ACUMULA LA INFORMACION QUE VA AL MAIL QUE SE ENVIA //////////

        $salida ="<html>";
        $salida.="Do you accept this request ?";
        $salida.="<ul><li> Part number: $order";
        $salida.="<li> Vendor: $vendor";
        $salida.="<li> Here or coming: $here_or_coming";
        $salida.="<li> Location: $location";

        if ($here_or_coming=="coming") {
            $salida.="<li> When is coming: $when_is_coming";
            $salida.="<li> Tracking Number: $tracking_number";
        }else {
            $receipt_date = date("M-d-Y", strtotime($tracking_number));
            $salida.="<li> Good Receipt Date: $receipt_date";
        }

        $salida.="<li> Request By: $email";
        $salida.="<li> Comments: $comments</ul>";
        $salida.="</html>";
    
        $sql= "SELECT id FROM orders ORDER BY id DESC limit 1";
        $result2 = mysqli_query($conn, $sql); 
        $ultimo = mysqli_fetch_array($result2);

        if ($ultimo[0]>0) {
            $ultimo=$ultimo[0] + 1;
        }else {
            $ultimo=1;
        }

            $sql= "SELECT id,nombre,email FROM users";
            $result1 = mysqli_query($conn, $sql);
            $totalinspectors = mysqli_num_rows($result1);

            if ($totalinspectors>0) {

                $enviadox="";
                $enviado = "Email sent to: ";

                while($fila = mysqli_fetch_array($result1) ){
            
                    $idx= $fila[0]; $nombre= $fila[1];  $destino= $fila[2];       
                    $boton ="<br><a href='$site/proceso.php?idx=$idx&orderx=$ultimo'>OK</a><br>";
                    $mail = new PHPMailer(true);

                            try{  /// EN LA VARIABLE MAIL VAN TODOS LOS PARAMETROS QUE SE NECESITAN PARA ENVIAR EL MENSAJE /////

                                $mail->SMTPDebug = 0;                                  
                                $mail->isSMTP();                                                                                                      
                                $mail->Host  = $host;                                                                  
                                $mail->SMTPAuth   = true;                              
                                $mail->Username   = $servermail;          
                                $mail->Password   = $clave;                         
                                $mail->SMTPSecure = $authentication;      
                                $mail->Port       = $portx;                                                      
                                $mail->setFrom($servermail, 'Hot parts for today');
                                $mail->addAddress($destino, $nombre);                  
                                $mail->isHTML(true);                                 
                                $mail->Subject = 'Accept Request';                                              
                                $mail->Body = $salida.$boton;                          
                                $mail->send();

                                $enviado.= "<li>".$destino;
                                $enviadox ="ok";                                                  

                            } catch (Exception $e) {
                                $enviado= "<div class='mensajes'> Mailer Error: {$mail->ErrorInfo}</div>";
                        }
 
                }

                if ($enviadox=="ok") {  /// SE INGRESA LA ORDEN A LA BASE DE DATOS /////

                    $sql = "INSERT INTO orders (orderNumber, vendor, here_or_coming, when_is_coming,tracking_number, email, comments, dateRequired, location) 
                    VALUES ('$order', '$vendor','$here_or_coming','$when_is_coming','$tracking_number', '$email', '$comments','$ahora','$location')";                              
                    if (mysqli_query($conn, $sql)) {
                        echo "<div class='mensajes'>Successfully<div>";
                    } else {
                        echo "<br>" . mysqli_error($conn); 
                    }
                    
                }
                echo $enviado;

            }

    
    }

    mysqli_close($conn);
    
?>
</div>



<script>
function goBack() {
  window.history.back();
}
</script>
<?php

function connect() {
    return new PDO('mysql:host=localhost;dbname=incoming', 'root', 'dic1060', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
//// CONSULTA PARA LISTAR LOS VENDORS QUE EMPIEZAN CON LAS LETRAS QUE SE ESTAN INGRESANDO /////
    if (isset($_POST['keyword'])) {  
        $keyword = '%'.$_POST['keyword'].'%';
        $sql = "SELECT * FROM vendors WHERE mail LIKE (:keyword) ORDER BY mail ASC LIMIT 0, 10";
        $query = $pdo->prepare($sql);
        $query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
        $query->execute();
        $list = $query->fetchAll();
        foreach ($list as $rs) {
            $mailx = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['mail']);
            echo '<div onclick="set_item(\''.$rs['mail'].'\')">'.$mailx.'</div>';
        }
    }
        ////////// ACTUALIZAR COMENTARIOS  //////////
    if(isset($_POST['idz'])) {

        $id= $_POST['idz'];
        $coment= $_POST['commentw'];
        $sql = "UPDATE orders SET comments3= '$coment' WHERE id='$id'";
        $query = $pdo->prepare($sql);
        $query->execute();

    }
        ////////// ACTUALIZAR HERE OR COMING ////////////
    if(isset($_POST['idw'])) {
        $id= $_POST['idw'];
        $sql = "UPDATE orders SET here_or_coming= 'here' WHERE id='$id'";
        $query = $pdo->prepare($sql);
        $query->execute();

    }

?>
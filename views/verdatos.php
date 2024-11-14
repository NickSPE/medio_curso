<?php
   require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
   require_once $_SERVER['DOCUMENT_ROOT'].'/models/conexion.php';

    session_start();
        if(!isset($_SESSION["txtusername"])){
            header('Location:'.get_urlBase('index.php'));
            exit();
        }


        $conexion =new conexion($host,$namedb,$userdb,$passworddb);
        $pdo = $conexion->obtenerconexion();
        //$query = $pdo->query("selec id,username,password,perfil from usuarios ")
        if (isset($pdo)){echo "pdo esta ok";}
        else{echo "pdo no esta ok";}
        echo "<br>";
        echo $host;
        echo "<br>";
        echo $namedb;
        echo "<br>";
        echo $userdb;
        echo "<br>";
        echo $conexion->contesta();

?>
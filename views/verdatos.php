<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/models/conexion.php';

    session_start();
    if(!isset($_SESSION["txtusername"])){
         header('Location:'.get_urlBase('index.php'));
         exit();
    }

    // Asegúrate de que estas variables estén definidas en config.php
    $conexion = new conexion($host, $namedb, $userdb, $passworddb);
    $pdo = $conexion->obtenerconexion();

    // Verifica que la conexión se haya establecido correctamente
    if ($pdo) {
         $query = $pdo->query("SELECT id, username, password, perfil FROM usuarios");

         // Asegúrate de que la consulta se haya ejecutado correctamente
         if ($query) {
              while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo "ID: " . $row['id'] . " - Username: " . $row['username'] . "<br>";
              }
         } else {
              echo "Error en la consulta SQL.";
         }
    } else {
         echo "Error al conectar con la base de datos.";
    }

    echo "<br>";
    echo $host;
    echo "<br>";
    echo $namedb;
    echo "<br>";
    echo $userdb;
    echo "<br>";
    echo $conexion->contesta();
?>
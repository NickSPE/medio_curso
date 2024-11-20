<?php
     require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
     require_once $_SERVER['DOCUMENT_ROOT'].'/models/conexion.php';

     if (session_status() == PHP_SESSION_NONE) {
          session_start();
     }
     if(!isset($_SESSION["txtusername"])){
           header('Location:'.get_urlBase('index.php'));
           exit();
     }
     if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $tmpdatusuario = $_POST["datusuario"];
     
        // Asegúrate de que estas variables estén definidas en config.php
        $conexion = new conexion($host, $namedb, $userdb, $passworddb);
        $pdo = $conexion->obtenerconexion();
        try{
            $stmt = $pdo->prepare("DELETE FROM usuarios WHERE username = ?");
            $stmt->execute([$tmpdatusuario]);
            echo "<p class='success-message'>Usuario eliminado correctamente.</p>";
        } catch (PDOException $e) {
            echo "Error al eliminar usuario: " . $e->getMessage();
        }
     }
     ?>
     <link rel="stylesheet" href="/css/estiloeliminardatos.css">

     <form action="" method="POST">
     <label for="datusuario">a quien devo eliminar</label>
     <input type="text" name="datusuario" id="datusuario">
     <br>
     <button type="submit">eliminar usuario</button>
     </form>
     
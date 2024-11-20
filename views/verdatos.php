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

     // Asegúrate de que estas variables estén definidas en config.php
     $conexion = new conexion($host, $namedb, $userdb, $passworddb);
     $pdo = $conexion->obtenerconexion();

     // Verifica que la conexión se haya establecido correctamente
     if ($pdo) {
           $query = $pdo->query("SELECT id, username, password, perfil FROM usuarios");

           // Asegúrate de que la consulta se haya ejecutado correctamente
           if ($query) {
                 echo '<table class="custom-table">';
                 echo '<link rel="stylesheet" type="text/css" href="/css/estiloverdatos.css">';
                 echo '<tr><th>id</th><th>username</th><th>password</th><th>perfil</th></tr>';
                 while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                         echo "<tr>";
                         echo "<td>" . $row['id'] . "</td>";
                         echo "<td>" . $row['username'] . "</td>";
                         echo "<td>" . $row['password'] . "</td>";
                         echo "<td>" . $row['perfil'] . "</td>";
                         echo "</tr>";
                 }
                 echo '</table>';
           } else {
                 echo "Error en la consulta SQL.";
           }
     } else {
           echo "Error al conectar con la base de datos.";
     }
?>

<?php
session_start();
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="./css/estilodashboard.css">

<body>

    <?php
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
    ?>
    Se borraron todas las variables
    <br>
    <a href="http://127.0.0.1/medio_curso/vervariables.php">Ver variables </a>
    <a href="http://127.0.0.1/medio_curso/test.php">Volver a grabar las variables</a>
</body>

</html>
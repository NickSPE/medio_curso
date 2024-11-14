<?php
// Start the session
    session_start();
?>
<!DOCTYPE html>
<html>
    <body>

        <?php
        // Set session variables
            $_SESSION["favcolor"] = "green";
            $_SESSION["favanimal"] = "cat";
            echo "Las variables ya han sido almacenadas....";
        ?>
        <br>

        <a href="http://127.0.0.1/medio_curso/vervariables.php">ir  a ver los variables</a>
    </body>
</html>
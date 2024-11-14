<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
if (isset($_SESSION["favcolor"])){
echo "Faborite color is " . $_SESSION["favcolor"]. "<br>";
echo "Faborite animal is " . $_SESSION["favanimal"]. "<.>";

} else 
{
    echo "NO EXISTE VARIABLES ";
    echo"<br>";
}
?>
<br>
PAGINA DE VER VARIABLES
<br>
<a href="http://127.0.0.1/medio_curso/vervariables.php">actualizar pagina </a>
<a href="http://127.0.0.1/medio_curso/borrarvariables.php">limpia la variable</a>
</body>
</html>
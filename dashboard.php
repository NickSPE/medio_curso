<?php
session_start();
if(!isset($_SESSION["txtusername"])){
    header("location:http://127.0.0.1/medio_curso/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/estilodashboard.css">
</head>
<body>
 <div class="menu">
    <h3> Este es el menu</h3>
    <ul>
        <li> <a href="?opcion=Inicio">Inicio</a></li>
        <li> <a href="?opcion=Ver">Ver</a></li>
        <li> <a href="?opcion=Ingresar">Ingresar</a></li>
        <li> <a href="?opcion=Modificar">Modificar</a></li>
        <li> <a href="?opcion=Eliminar">Eliminar</a></li>
        <li> <a href="http://127.0.0.1/medio_curso/logout.php">Salir del sistema</a></li>
    </ul>

 </div>
<div class="contenido">
<?php 
if(isset($_GET["opcion"])){
    $opcion =$_GET["opcion"];
    echo $opcion;
}
?>
</div>
    
</body>
</html>

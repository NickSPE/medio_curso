<?php
session_start();
if (!isset($_SESSION["txtusername"])) {
    header('location:' . get_urlBase('index.php'));
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';


// Obtenemos la opción seleccionada desde la URL
$opcion = isset($_GET['opcion']) ? $_GET['opcion'] : 'Inicio';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo get_urlBase('css/estilodashboard.css') ?>"> 
</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="?opcion=Inicio"><i class="fas fa-house"></i>Inicio</a></li>
            <li><a href="?opcion=Ver"><i class="fas fa-eye"></i>Ver</a></li>
            <li><a href="?opcion=Ingresar"><i class="fas fa-plus-circle"></i>Ingresar</a></li>
            <li><a href="?opcion=Modificar"><i class="fas fa-edit"></i>Modificar</a></li>
            <li><a href="?opcion=Eliminar"><i class="fas fa-trash"></i>Eliminar</a></li>
            <li><a href="<?php echo get_controllers('/logout.php') ?>" id="btn"><i class="fas fa-door-open"></i>Salir</a></li>
        </ul>
    </div>

    <div class="contenido">
        <?php
        // Muestra el contenido basado en la opción seleccionada
        switch ($opcion) {
            case 'Inicio':
                echo "<h3>Bienvenido al Dashboard</h3>";
                echo "<p>Selecciona una opción para comenzar.</p>";
                break;
            case 'Ver':
                echo "<h3>Bienvenido a la Sección de Ver</h3>";
                require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/controladorUsuario.php';
                break;
            case 'Ingresar':
                echo "<h3>Bienvenido a la Sección de Ingresar datos</h3>";
                require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/controladorIngresarUsuario.php';

                break;
            case 'Modificar':
                echo "<h3>Bienvenido a la Sección de Modificar</h3>";
                require_once $_SERVER['DOCUMENT_ROOT'] . '/views/modificardatos.php';
                break;
            case 'Eliminar':
                echo "<h3>Bienvenido a la Sección de Eliminar</h3>";
                require_once $_SERVER['DOCUMENT_ROOT'] . '/views/eliminardatos.php';
                break;
            default:
                echo "<h3>Opción no válida</h3>";
                echo "<p>Por favor selecciona una opción válida en el menú.</p>";
                break;
        }
        ?>
    </div>
</body>


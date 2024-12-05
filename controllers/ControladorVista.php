<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
    if (!isset($_SESSION["txtusername"])) {
            header('location:' . get_urlBase('index.php'));
            exit();
    }

    require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php'; 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaDashboard.php'; 

    $opcion = isset($_GET['opcion']) ? $_GET['opcion'] : 'Inicio';
    $contenido='';


    switch ($opcion) {
        case 'Inicio':
            $contenido = '<h3>Bienvenido al Dashboard</h3><p>Selecciona una opción para comenzar.</p>';
            break;

        case 'Ver':
            ob_start();
            include get_controllers_disk('controladorUsuario.php');
            $contenido = ob_get_clean();
            //$contenido = '<h3>Bienvenido a la Sección de Ver</h3>
            //<iframe src="' . get_controllers('controladorUsuario.php') . '"></iframe>';
            break;

        case 'Ingresar':
            ob_start();
            include get_controllers_disk('controladorIngresarUsuario.php');
            $contenido = ob_get_clean();
            //$contenido = '<h3>Bienvenido a la Sección de Ingresar datos</h3>
            //<iframe src="' . get_controllers('controladorIngresarUsuario.php') . '" ></iframe>';
            break;

        case 'Modificar':
            //ob_start();
            //include get_controllers_disk('controladorActualizarUsuario.php');
            //$contenido = ob_get_clean();
            $contenido = '
            <iframe src="' . get_controllers('controladorActualizarUsuario.php') . '" "></iframe>';
            break;

        case 'Eliminar':
            ob_start();
            include get_controllers_disk('ControladorEliminarUsuario.php');
            $contenido = ob_get_clean();
            //$contenido = '<h3>Bienvenido a la Sección de Eliminar</h3>
            //<iframe src="' . get_controllers('ControladorEliminarUsuario.php') . '" ></iframe>';
            break;

        default:
        http_response_code(400);
            $contenido = "<h3>error</h3>";
            break;
    }

    dashboard($contenido);
    ?>
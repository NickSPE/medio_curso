<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaActualizarUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location:' . get_urlBase('index.php'));
    exit();
}

$mensaje = '';
$modeloUsuario = new modelousuario();

// Procesar solicitud POST para actualizar o buscar usuario
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Si es un POST, procesamos el formulario de actualización
    if (isset($_POST['custId'])) {
        $tmpcustId = $_POST['custId'];
        $tmpdatusuario = $_POST["datusuario"];
        $tmpdatpassword = $_POST["datpassword"];
        $tmpdatperfil = $_POST["datperfil"];

        if (!empty($tmpcustId)) {
            // Realizamos la actualización del usuario
            $modeloUsuario->actualizarUsuario($tmpcustId, $tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
            $mensaje = "Usuario actualizado con éxito";
        }
    } else {
        // Si no es una actualización, procesamos la búsqueda
        $tmpdatusuario = $_POST['datusuario'];
        $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);

        if ($usuario) {
            mostrarFormularioEdicion($usuario); // Si lo encuentra, mostrar formulario de edición
        } else {
            mostrarFormularioBusqueda("Usuario no encontrado"); // Si no lo encuentra, mostrar mensaje de error
        }
    }

    // Mostrar el mensaje (si es POST)
    if ($mensaje) {
        echo "<p>$mensaje</p>";
    }
} else {
    // Mostrar formulario de búsquda solo si es una solicitud POST
    mostrarFormularioBusqueda();
}


// Procesar solicitud GET para editar un usuario específico
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['accion']) && $_GET['accion'] == 'editar' && isset($_GET['usuario'])) {
    // Si es un GET, mostramos el formulario de edición
    $tmpdatusuario = $_GET['usuario'];

    if (!empty($tmpdatusuario)) {
        // Buscamos el usuario
        $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);
        if ($usuario) {
            // Si lo encontramos, mostramos el formulario de edición con los datos del usuario
            mostrarFormularioEdicion($usuario);
        } else {
            // Si no lo encontramos, mostramos el mensaje de error
            $mensaje = "Usuario no encontrado.";
            echo "<p>$mensaje</p>"; // Muestra el mensaje en el GET
        }
    } else {
        // Si no se pasa el nombre de usuario, mostramos el mensaje de error
        $mensaje = "Por favor, ingrese un nombre de usuario.";
        echo "<p>$mensaje</p>"; // Muestra el mensaje en el GET
    }
}

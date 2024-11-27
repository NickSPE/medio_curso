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


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['custId'])) {
        $tmpcustId = $_POST['custId'];
        $tmpdatusuario = $_POST["datusuario"];
        $tmpdatpassword = $_POST["datpassword"];
        $tmpdatperfil = $_POST["datperfil"];

            if (!empty($tmpcustId)) {
                $modeloUsuario->actualizarUsuario($tmpcustId, $tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
                $mensaje = "Usuario actualizado con éxito";
            }
        } else {

            $tmpdatusuario = $_POST['datusuario'];
            $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);

            if ($usuario) {
                mostrarFormularioEdicion($usuario);
            } else {
                mostrarFormularioBusqueda("Usuario no encontrado"); 
            }
    }
    if ($mensaje) {
        echo "<p>$mensaje</p>";
    }
} else {
    mostrarFormularioBusqueda();
}


if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['accion']) && $_GET['accion'] == 'editar' && isset($_GET['usuario'])) {
    $tmpdatusuario = $_GET['usuario'];

    if (!empty($tmpdatusuario)) {
        $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);
        if ($usuario) {
            mostrarFormularioEdicion($usuario);
        } else {
            $mensaje = "Usuario no encontrado.";
            echo "<p>$mensaje</p>"; 
        }
    } else {
        $mensaje = "Por favor, ingrese un nombre de usuario.";
        echo "<p>$mensaje</p>";
    }
}

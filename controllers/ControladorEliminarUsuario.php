<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/VistaEliminarUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location:' . get_urlBase('index.php'));
    exit();
}

$mensaje = '';
$tmpdatusuario = null;

// Manejo de solicitudes
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Manejar POST: Mostrar formulario
    $tmpdatusuario = $_POST['datusuario'] ?? null;

    if (!empty($tmpdatusuario)) {
        $modelousuario = new Modelousuario();
        try {
            if ($modelousuario->existeUsuario($tmpdatusuario)) {
                $modelousuario->eliminarUsuario($tmpdatusuario);
                $mensaje = "Usuario eliminado correctamente.";
            } else {
                $mensaje = "El usuario no existe.";
            }
        } catch (PDOException $e) {
            $mensaje = "Error al eliminar usuario: " . $e->getMessage();
        }
    } else {
        $mensaje = "Por favor, ingrese un usuario.";
    }

    mostrarFormularioEliminarUsuario($mensaje);
    exit();
} elseif ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['accion']) && $_GET['accion'] === 'eliminar') {
    // Manejar GET: Eliminar usuario directamente
    $tmpdatusuario = $_GET['usuario'] ?? null;

    if (!empty($tmpdatusuario)) {
        $modelousuario = new Modelousuario();
        try {
            if ($modelousuario->existeUsuario($tmpdatusuario)) {
                $modelousuario->eliminarUsuario($tmpdatusuario);
                $mensaje = "Usuario eliminado correctamente.";
            } else {
                $mensaje = "El usuario no existe.";
            }
        } catch (PDOException $e) {
            $mensaje = "Error al eliminar usuario: " . $e->getMessage();
        }
    } else {
        $mensaje = "Por favor, ingrese un usuario.";
    }

    // Permanecer en la misma tabla (sin mostrar formulario)
    header('Location: ' . $_SERVER['HTTP_REFERER']); // Redirigir a la misma página
    exit();
}

// Mostrar formulario por defecto si no se especifica acción
mostrarFormularioEliminarUsuario();
?>

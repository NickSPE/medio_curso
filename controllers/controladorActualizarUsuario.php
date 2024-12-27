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

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['custId'])) {
            $tmpcustId = $_POST['custId'];
            $tmpdatusuario = $_POST["datusuario"] ?? '';
            $tmpdatpassword = $_POST["datpassword"] ?? '';
            $tmpdatperfil = $_POST["datperfil"] ?? '';

            if (empty($tmpcustId) || empty($tmpdatusuario) || empty($tmpdatpassword) || empty($tmpdatperfil)) {
                $mensaje = "Todos los campos son obligatorios.";
                mostrarFormularioBusqueda($mensaje);
                exit();
            }

            $resultado = $modeloUsuario->actualizarUsuario($tmpcustId, $tmpdatusuario, $tmpdatpassword, $tmpdatperfil);

            if (!$resultado) {
                $mensaje = "No se pudo actualizar el usuario.";
                mostrarFormularioBusqueda($mensaje);
                exit();
            }

            $usuarioActualizado = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);

            if (!$usuarioActualizado) {
                $mensaje = "Usuario no encontrado después de la actualización.";
                mostrarFormularioBusqueda($mensaje);
                exit();
            }

            $mensaje = "Usuario actualizado con éxito.";
            mostrarFormularioEdicion($usuarioActualizado);

        } elseif (isset($_POST['datusuario'])) {
            $tmpdatusuario = $_POST['datusuario'];

            if (empty($tmpdatusuario)) {
                mostrarFormularioBusqueda("Por favor, ingrese un nombre de usuario.");
                exit();
            }

            $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);

            if ($usuario) {
                mostrarFormularioEdicion($usuario);
            } else {
                mostrarFormularioBusqueda("Usuario no encontrado.");
            }

        } else {
            $mensaje = "Solicitud no válida.";
            mostrarFormularioBusqueda($mensaje);
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['accion']) && $_GET['accion'] == 'editar') {
        $tmpdatusuario = $_GET['usuario'] ?? '';

        if (empty($tmpdatusuario)) {
            mostrarFormularioBusqueda("Por favor, ingrese un nombre de usuario.");
            exit();
        }

        $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);

        if ($usuario) {
            mostrarFormularioEdicion($usuario);
        } else {
            mostrarFormularioBusqueda("Usuario no encontrado.");
        }
    } else {
        mostrarFormularioBusqueda();
    }
} catch (Exception $e) {
    error_log("Error: " . $e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT'] . "/logs/error.log");
    mostrarFormularioBusqueda("Error interno. Intente más tarde.");
}
?>

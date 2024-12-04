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
    // Caso 1: Actualizar usuario
    if (isset($_POST['custId'])) {
        $tmpcustId = $_POST['custId'];
        $tmpdatusuario = $_POST["datusuario"];
        $tmpdatpassword = $_POST["datpassword"];
        $tmpdatperfil = $_POST["datperfil"];

        if (!empty($tmpcustId)) {
            try {
                // Actualizar usuario en la base de datos
                $modeloUsuario->actualizarUsuario($tmpcustId, $tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
                $mensaje = "Usuario actualizado con éxito.";

                // Cargar los datos del usuario actualizado por el nuevo nombre de usuario
                $usuarioActualizado = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);
                mostrarFormularioEdicion($usuarioActualizado, $mensaje); // Mostrar formulario con datos actualizados
            } catch (Exception $e) {
                $mensaje = "Error al actualizar el usuario: " . $e->getMessage();
                mostrarFormularioBusqueda($mensaje); // Mostrar mensaje de error
            }
        } else {
            $mensaje = "Por favor, ingrese un ID válido.";
            mostrarFormularioBusqueda($mensaje); // Mostrar mensaje de error
        }
    }
    // Caso 2: Buscar usuario
    elseif (isset($_POST['datusuario'])) {
        $tmpdatusuario = $_POST['datusuario'];
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
} 
// Manejo del GET: Cargar usuario para edición
elseif ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['accion']) && $_GET['accion'] == 'editar' && isset($_GET['usuario'])) {
    $tmpdatusuario = $_GET['usuario'];

    if (!empty($tmpdatusuario)) {
        $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);

        if ($usuario) {
            mostrarFormularioEdicion($usuario);
        } else {
            $mensaje = "Usuario no encontrado.";
            mostrarFormularioBusqueda($mensaje);
        }
    } else {
        $mensaje = "Por favor, ingrese un nombre de usuario.";
        mostrarFormularioBusqueda($mensaje);
    }
} 
// Mostrar formulario por defecto si no se cumplen las condiciones
else {
    mostrarFormularioBusqueda();
}
?>

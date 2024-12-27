<?php
// Inicia la sesión solo si no está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluye los archivos del modelo y la vista necesarios
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaActualizarUsuario.php';

// Verifica si el usuario tiene una sesión activa; si no, redirige al login
if (!isset($_SESSION["txtusername"])) {
    header('Location:' . get_urlBase('index.php'));
    exit();
}

// Variable para almacenar mensajes
$mensaje = '';
$modeloUsuario = new modelousuario();

try {
    // Manejo de solicitudes POST
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Caso: Actualización de usuario
        if (isset($_POST['custId'])) {
            // Captura los datos enviados por el formulario
            $tmpcustId = $_POST['custId'];
            $tmpdatusuario = $_POST["datusuario"] ?? '';
            $tmpdatpassword = $_POST["datpassword"] ?? '';
            $tmpdatperfil = $_POST["datperfil"] ?? '';

            // **Validación 1: Verifica que los datos no estén vacíos**
            if (empty($tmpcustId) || empty($tmpdatusuario) || empty($tmpdatpassword) || empty($tmpdatperfil)) {
                $mensaje = "Todos los campos son obligatorios.";
                mostrarFormularioBusqueda($mensaje);
                exit(); // Termina la ejecución si hay datos faltantes
            }

            // **Actualización del usuario**
            $resultado = $modeloUsuario->actualizarUsuario($tmpcustId, $tmpdatusuario, $tmpdatpassword, $tmpdatperfil);

            // **Validación 2: Verifica si la actualización falló**
            if (!$resultado) {
                $mensaje = "No se pudo actualizar el usuario.";
                mostrarFormularioBusqueda($mensaje);
                exit(); // Termina la ejecución si hay errores
            }

            // **Obtiene el usuario actualizado y lo valida**
            $usuarioActualizado = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);

            if (!$usuarioActualizado) {
                $mensaje = "Usuario no encontrado después de la actualización.";
                mostrarFormularioBusqueda($mensaje);
                exit(); // Termina la ejecución si el usuario no existe
            }

            // Muestra el formulario de edición con un mensaje de éxito
            $mensaje = "Usuario actualizado con éxito.";
            mostrarFormularioEdicion($usuarioActualizado, $mensaje);

        // Caso: Búsqueda de un usuario por nombre
        } elseif (isset($_POST['datusuario'])) {
            $tmpdatusuario = $_POST['datusuario'];

            // **Validación 3: Verifica si el nombre de usuario está vacío**
            if (empty($tmpdatusuario)) {
                mostrarFormularioBusqueda("Por favor, ingrese un nombre de usuario.");
                exit();
            }

            // **Obtiene los datos del usuario y valida si existe**
            $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);

            if ($usuario) {
                mostrarFormularioEdicion($usuario); // Muestra el formulario de edición
            } else {
                mostrarFormularioBusqueda("Usuario no encontrado."); // Muestra un mensaje de error
            }

        // Caso: Solicitud POST no válida
        } else {
            $mensaje = "Solicitud no válida.";
            mostrarFormularioBusqueda($mensaje);
        }
    } 
    // Manejo de solicitudes GET
    elseif ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['accion']) && $_GET['accion'] == 'editar') {
        $tmpdatusuario = $_GET['usuario'] ?? '';

        // **Validación 4: Verifica si el nombre de usuario está vacío**
        if (empty($tmpdatusuario)) {
            mostrarFormularioBusqueda("Por favor, ingrese un nombre de usuario.");
            exit();
        }

        // **Obtiene los datos del usuario y valida si existe**
        $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);

        if ($usuario) {
            mostrarFormularioEdicion($usuario); // Muestra el formulario de edición
        } else {
            mostrarFormularioBusqueda("Usuario no encontrado."); // Muestra un mensaje de error
        }
    } 
    // Caso: Solicitud inicial o sin parámetros
    else {
        mostrarFormularioBusqueda(); // Muestra el formulario de búsqueda por defecto
    }
} catch (Exception $e) {
    // **Manejo de excepciones: Registra errores en un log**
    error_log("Error: " . $e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT'] . "/logs/error.log");
    mostrarFormularioBusqueda("Error interno. Intente más tarde."); // Mensaje genérico para el usuario
}
?>

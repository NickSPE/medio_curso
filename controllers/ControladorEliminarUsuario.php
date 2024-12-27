<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluye los modelos y vistas necesarios
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/VistaEliminarUsuario.php';

// Verifica si el usuario tiene una sesión activa, de lo contrario redirige al login
if (!isset($_SESSION["txtusername"])) {
    header('Location:' . get_urlBase('index.php'));
    exit();
}

// Inicializa las variables
$mensaje = '';
$tmpdatusuario = null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Captura el nombre de usuario del formulario
    $tmpdatusuario = $_POST['datusuario'] ?? null;

    // Utiliza htmlspecialchars para evitar caracteres especiales en lugar del filtro obsoleto
    $tmpdatusuario = htmlspecialchars(trim($tmpdatusuario), ENT_QUOTES, 'UTF-8');

    if (!empty($tmpdatusuario)) {
        $modelousuario = new Modelousuario();

        try {
            // **Corrección 2: Verifica si el usuario existe antes de intentar eliminar**
            if ($modelousuario->existeUsuario($tmpdatusuario)) {
                // Elimina el usuario
                $modelousuario->eliminarUsuario($tmpdatusuario);
                $mensaje = "Usuario eliminado correctamente.";
            } else {
                $mensaje = "El usuario no existe.";
            }
        } catch (PDOException $e) {
            // **Corrección 3: Manejo de errores con registro**
            // Registra las excepciones en un archivo de log
            error_log("Error al eliminar usuario: " . $e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT'] . "/logs/error.log");
            $mensaje = "Error al eliminar usuario. Por favor, intente más tarde.";
        }
    } else {
        
        $mensaje = "Por favor, ingrese un usuario válido.";
    }

    // Muestra el formulario con el mensaje correspondiente
    mostrarFormularioEliminarUsuario($mensaje);
    exit();
} elseif ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['accion']) && $_GET['accion'] === 'eliminar') {
    
    $tmpdatusuario = $_GET['usuario'] ?? null;

    
    $tmpdatusuario = htmlspecialchars(trim($tmpdatusuario), ENT_QUOTES, 'UTF-8');

    if (!empty($tmpdatusuario)) {
        $modelousuario = new Modelousuario();

        try {
            // **Corrección 2: Verifica si el usuario existe antes de intentar eliminar**
            if ($modelousuario->existeUsuario($tmpdatusuario)) {
                $modelousuario->eliminarUsuario($tmpdatusuario);
                $mensaje = "Usuario eliminado correctamente.";
            } else {
                $mensaje = "El usuario no existe.";
            }
        } catch (PDOException $e) {
            // **Corrección 3: Manejo de errores con registro**
            error_log("Error al eliminar usuario: " . $e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT'] . "/logs/error.log");
            $mensaje = "Error al eliminar usuario. Por favor, intente más tarde.";
        }
    } else {
        // **Corrección 4: Mensaje para datos vacíos**
        $mensaje = "Por favor, ingrese un usuario válido.";
    }

    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// **Muestra el formulario de eliminación por defecto si no hay acciones específicas**
mostrarFormularioEliminarUsuario();
?>

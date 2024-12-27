<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluye los modelos y vistas necesarios
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/ModeloProducto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/VistaProducto/VistaEliminarProducto.php';

// Verifica si el usuario tiene una sesión activa, de lo contrario redirige al login
if (!isset($_SESSION["txtusername"])) {
    header('Location:' . get_urlBase('index.php'));
    exit();
}

// Inicializa las variables
$mensaje = '';
$tmpdatproducto = null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Captura el nombre del producto del formulario
    $tmpdatproducto = $_POST['datproducto'] ?? null;

    // Sanitiza el dato
    $tmpdatproducto = htmlspecialchars(trim($tmpdatproducto), ENT_QUOTES, 'UTF-8');

    if (!empty($tmpdatproducto)) {
        $modeloProducto = new Producto();

        try {
            // Verifica si el producto existe antes de intentar eliminar
            if ($modeloProducto->eliminarProducto($tmpdatproducto)) {
                $mensaje = "Producto eliminado correctamente.";
            } else {
                $mensaje = "El producto no existe o no se pudo eliminar.";
            }
        } catch (PDOException $e) {
            // Manejo de errores con registro
            error_log("Error al eliminar producto: " . $e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT'] . "/logs/error.log");
            $mensaje = "Error al eliminar producto. Por favor, intente más tarde.";
        }
    } else {
        $mensaje = "Por favor, ingrese un producto válido.";
    }

    // Muestra el formulario con el mensaje correspondiente
    mostrarFormularioEliminarProducto($mensaje);
    exit();
} elseif ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['accion']) && $_GET['accion'] === 'eliminar') {
    // Captura el producto desde la URL
    $tmpdatproducto = $_GET['producto'] ?? null;

    // Sanitiza el dato
    $tmpdatproducto = htmlspecialchars(trim($tmpdatproducto), ENT_QUOTES, 'UTF-8');

    if (!empty($tmpdatproducto)) {
        $modeloProducto = new Producto();

        try {
            if ($modeloProducto->eliminarProducto($tmpdatproducto)) {
                $mensaje = "Producto eliminado correctamente.";
            } else {
                $mensaje = "El producto no existe o no se pudo eliminar.";
            }
        } catch (PDOException $e) {
            error_log("Error al eliminar producto: " . $e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT'] . "/logs/error.log");
            $mensaje = "Error al eliminar producto. Por favor, intente más tarde.";
        }
    } else {
        $mensaje = "Por favor, ingrese un producto válido.";
    }

    // Redirige a la página anterior con el mensaje correspondiente
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// Muestra el formulario de eliminación por defecto si no hay acciones específicas
mostrarFormularioEliminarProducto();
?>

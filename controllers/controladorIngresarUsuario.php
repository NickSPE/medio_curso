<?php

// Inicia la sesión solo si no está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluye los modelos y vistas necesarios
require_once $_SERVER['DOCUMENT_ROOT'].'/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/views/vistaIngresarUsuario.php';

// Verifica si el usuario tiene una sesión activa; si no, redirige al login
if (!isset($_SESSION["txtusername"])) {
    header('Location:'.get_urlBase('index.php'));
    exit();
}

// Inicializa la variable para mostrar mensajes
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // **Corrección 1: Validación y sanitización de entradas**
    // Valida y limpia las entradas antes de usarlas para evitar inyecciones y errores
    $tmpdatusuario = htmlspecialchars(trim($_POST["datusuario"] ?? ''), ENT_QUOTES, 'UTF-8');
    $tmpdatpassword = htmlspecialchars(trim($_POST["datpassword"] ?? ''), ENT_QUOTES, 'UTF-8');
    $tmpdatperfil = htmlspecialchars(trim($_POST["datperfil"] ?? ''), ENT_QUOTES, 'UTF-8');

    // **Validación 2: Verifica que los campos no estén vacíos**
    if (empty($tmpdatusuario) || empty($tmpdatpassword) || empty($tmpdatperfil)) {
        $mensaje = "Todos los campos son obligatorios. Por favor, complete el formulario.";
        mostrarFormularioIngreso($mensaje); // Muestra el formulario con un mensaje de error
        exit();
    }

    // Instancia el modelo de usuario
    $modeloUsuario = new modelousuario();

    try {
        // **Corrección 3: Verificación de existencia del usuario**
        // Evita la duplicación de usuarios verificando antes de la inserción
        if ($modeloUsuario->existeUsuario($tmpdatusuario)) {
            $mensaje = "El usuario ya existe. Por favor, elija otro nombre de usuario.";
        } else {
            // **Inserta el usuario en la base de datos**
            $modeloUsuario->insertarUsuarios($tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
            $mensaje = "Usuario registrado con éxito.";
        }
    } catch (PDOException $e) {
        // **Corrección 4: Manejo de excepciones y registro de errores**
        // Registra los errores en un archivo de log para facilitar la depuración
        error_log("Error al registrar usuario: " . $e->getMessage(), 3, $_SERVER['DOCUMENT_ROOT'] . "/logs/error.log");
        $mensaje = "Error al registrar usuario. Por favor, intente más tarde.";
    }
}

// Muestra el formulario de ingreso con el mensaje correspondiente
mostrarFormularioIngreso($mensaje); 
?>

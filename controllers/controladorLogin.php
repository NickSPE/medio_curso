<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaLogin.php';


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $v_username = $_POST["txtusername"] ?? '';
        $v_password = $_POST["txtpassword"] ?? '';

        $modelousuario = new modelousuario();
        $user = $modelousuario->validarCredenciales($v_username,$v_password);

        if ($user && $v_password === $user['password']) {
            $_SESSION["txtusername"] = $v_username;
            $_SESSION["txtpassword"] = $v_password;
            header('Location: ' . get_controllers('controladorVista.php'));
            exit;
        } else {
            header('Location: ' . get_views('claveequivocada.php'));
            exit;
        }
} else {
    vistaLogin();
}

?>

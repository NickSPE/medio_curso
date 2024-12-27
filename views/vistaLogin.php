<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
function vistaLogin(){
    if (!empty($mensaje)) {
        echo $mensaje;
    } else {

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="<?php echo get_urlBase('/css/estiloLogin.css') ?>">
    </head>
    <body>
        <div class="login-container">
            <div class="login-left">
                <h1>Bienvenidos de nuevo</h1>
                <p>"Este sistema fue creado por los ing. Tapullima, Evaristo, Rengifo, Perez y Ponce.</p>
                <p>Para nuestro profe el ing. Hubel Solis Bonifacio"</p>
            </div>
            <div class="login-right">
                <form id="login-form" action="<?php echo get_controllers('controladorLogin.php'); ?>" method="POST">
                    <h2>Sign in</h2>
                    <label for="txtusername">Username</label>
                    <input type="text" name="txtusername" id="txtusername" placeholder="Username" required>
                    <label for="txtpassword">Password</label>
                    <input type="password" name="txtpassword" id="txtpassword" placeholder="Password" required>
                    <button type="submit">Login</button>
                    <div id="error-message"></div>
                </form>
            </div>
        </div>
        <script src="<?php echo get_urlBase('/js/vistaLogin.js') ?>"></script>
    </body>
</html>

<?php
    }
}
?>
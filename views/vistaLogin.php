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
                <form action="<?php echo get_controllers('controladorLogin.php'); ?>" method="POST">
                    <label for="txtusername">Username</label>
                        <input type="text" name="txtusername" id="txtusername" placeholder="Username" required>
                    <label for="txtpassword">Password</label>
                        <input type="password" name="txtpassword" id="txtpassword" placeholder="Password" required>
                    <button type="submit">LOGIN</button>
                </form>
            </div>
        </body>
</html>
<?php
}}
?>
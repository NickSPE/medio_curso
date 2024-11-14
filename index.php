<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/models/conexion.php';
    session_start();

        if (isset($_SESSION["txtusername"])) {
        header('Location: '.get_views('dashboard.php'));
    exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $v_username = $_POST["txtusername"] ?? '';
        $v_password = $_POST["txtpassword"] ?? '';

            if ($v_username == "admin" && $v_password == "1234") {
            $_SESSION["txtusername"] = $v_username;
            header('Location: '.get_views('dashboard.php'));
        exit;
    } else {
        header('Location: '.get_views('claveequivocada.php'));
        exit;
    }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="<?php echo get_urlBase('/css/style.css') ?>">
    </head>
    <body>
        <div class="login-container">
            <form action="" method="POST">
                <label for="username">Username</label>
                <input type="text" name="txtusername" id="txtusername" placeholder="username" required>
                <label for="password">Password</label>
                <input type="password" name="txtpassword" placeholder="Password" id="txtpassword" required>
                <button type="submit">LOGIN</button>
            </form>
        </div>
    </body>
</html>

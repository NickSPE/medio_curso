<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/models/conexion.php';

    session_start();

    function get_connection() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbsistema";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
    
    function get_user_credentials($username) {
        require_once $_SERVER['DOCUMENT_ROOT'].'/models/conexion.php';
        $conn = get_connection();
        $stmt = $conn->prepare("SELECT username, password FROM usuarios WHERE BINARY username = ? LIMIT 1");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $user;
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $v_username = $_POST["txtusername"] ?? '';
        $v_password = $_POST["txtpassword"] ?? '';
    
        $user = get_user_credentials($v_username);
    
        if ($user && $v_password === $user['password']) {
            $_SESSION["txtusername"] = $v_username;
            header('Location: '.get_controllers('controladorVista.php'));
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
        <link rel="stylesheet" href="styles.css?v=1.0">

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
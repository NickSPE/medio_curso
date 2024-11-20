<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/conexion.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $tmpdatusuario = $_POST["datusuario"];
    $tmpdatpassword = $_POST["datpassword"];
    $tmpdatperfil = $_POST["datperfil"];

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION["txtusername"])) {
        header('Location:'.get_urlBase('index.php'));
        exit();
    }

    $conexion = new conexion($host, $namedb, $userdb, $passworddb);
    $pdo = $conexion->obtenerconexion(); 
    try {
        // Verificar si el usuario ya existe
        $sentencia = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE username = ?");
        $sentencia->execute([$tmpdatusuario]);
        $usuarioExiste = $sentencia->fetchColumn();

        if ($usuarioExiste > 0) {
            $error = "El nombre de usuario ya existe. Por favor, elige otro.";
        } else {
            // Insertar nuevo usuario
            $sentencia = $pdo->prepare("INSERT INTO usuarios (username, password, perfil) VALUES (?, ?, ?)");
            $sentencia->execute([$tmpdatusuario, $tmpdatpassword, $tmpdatperfil]);
            echo "Usuario registrado con éxito <br>";
        }
    } catch (PDOException $e) {
        $error = "Error al registrar usuario: " . $e->getMessage();
    }
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/estiloingresar.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <form action="" method="POST">
        <h2>Registrar un nuevo usuario</h2>

        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <div class="form-group">
            <i class="fas fa-user"></i>
            <input type="text" name="datusuario" id="datusuario" placeholder="Usuario" required>
        </div>

        <div class="form-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="datpassword" id="datpassword" placeholder="Password" required>
        </div>

        <div class="form-group">
            <i class="fas fa-id-badge"></i>
            <input type="text" name="datperfil" id="datperfil" placeholder="Perfil" required>
        </div>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>

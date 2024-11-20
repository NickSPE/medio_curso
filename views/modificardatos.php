<?php
    echo '<link rel="stylesheet" href="/css/estiloeliminardatos.css">';
    require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/models/conexion.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION["txtusername"])){
         header('Location:'.get_urlBase('index.php'));
         exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['retry'])) {
            // Mostrar el formulario de búsqueda de usuario
            ?>
            <form action="" method="POST" class="form-container">
                <label for="datusuario" class="form-label">¿Qué usuario desea modificar?</label>
                <input type="text" name="datusuario" id="datusuario" class="form-input" required>
                <br>
                <button type="submit" class="form-button">Buscar usuario</button>
            </form>
            <?php
        } else {
            $tmpdatusuario = isset($_POST["datusuario"]) ? $_POST["datusuario"] : '';

            // Asegúrate de que estas variables estén definidas en config.php
            $conexion = new conexion($host, $namedb, $userdb, $passworddb);
            $pdo = $conexion->obtenerconexion();

            if (isset($_POST["custId"])) {
                try {
                    $stmt = $pdo->prepare("UPDATE usuarios SET username = ?, password = ?, perfil = ? WHERE id = ?");
                    $stmt->execute([$_POST["datusuario"], $_POST["datpassword"], $_POST["datperfil"], $_POST["custId"]]);
                    echo "<div class='success-message'>Usuario modificado correctamente.</div>";
                    ?>
                    <form action="" method="POST" class="form-container">
                        <button type="submit" name="retry" class="form-button">Modificar otro usuario</button>
                    </form>
                    <?php
                } catch (PDOException $e) {
                    echo "<div class='error-message'>Error al modificar usuario: " . htmlspecialchars($e->getMessage()) . "</div>";
                }
            } else {
                $stmt = $pdo->prepare("SELECT id, username, password, perfil FROM usuarios WHERE username = ?");
                $stmt->execute([$tmpdatusuario]);
                $fila = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($fila) {
                    ?>
                    <form action="" method="POST" class="form-container">
                        <input type="hidden" id="custId" name="custId" value="<?php echo htmlspecialchars($fila['id']); ?>">

                        <label for="datusuario" class="form-label">Usuario</label>
                        <input type="text" name="datusuario" id="datusuario" class="form-input" value="<?php echo htmlspecialchars($fila['username']); ?>" required>
                        <br>
                        <label for="datpassword" class="form-label">Password</label>
                        <input type="password" name="datpassword" id="datpassword" class="form-input" value="<?php echo htmlspecialchars($fila['password']); ?>" required>
                        <br>
                        <label for="datperfil" class="form-label">Perfil</label>
                        <input type="text" name="datperfil" id="datperfil" class="form-input" value="<?php echo htmlspecialchars($fila['perfil']); ?>" required>
                        <br>
                        <button type="submit" class="form-button">Modificar usuario</button>
                    </form>
                    <?php
                } else {
                    echo "<div class='error-message'>Usuario no encontrado.</div>";
                    ?>
                    <form action="" method="POST" class="form-container">
                        <button type="submit" name="retry" class="form-button">Atrás</button>
                    </form>
                    <?php
                }
            }
        }
    } else {
        ?>
        <form action="" method="POST" class="form-container">
            <label for="datusuario" class="form-label">¿Qué usuario desea modificar?</label>
            <input type="text" name="datusuario" id="datusuario" class="form-input" required>
            <br>
            <button type="submit" class="form-button">Buscar usuario</button>
        </form>
        <?php
        
    }
?>


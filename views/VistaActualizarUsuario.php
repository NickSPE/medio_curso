<?php 
    echo '<link rel="stylesheet" type="text/css" href="/css/estilomodificar.css">';

    function mostrarFormularioBusqueda($mensaje = '') {
        ?>
        <form action="/controllers/controladorActualizarUsuario.php" method="POST" class="form-container">
            <?php if (!empty($mensaje)): ?>
                <p style="color: red;"><?php echo htmlspecialchars($mensaje); ?></p>
            <?php endif; ?>
            <label for="datusuario" class="form-label">¿Qué usuario desea modificar?</label>
            <input type="text" name="datusuario" id="datusuario" class="form-input" required>
            <br>
            <button type="submit" class="form-button">Buscar usuario</button>
        </form>
        <?php
    }

    function mostrarFormularioEdicion($usuario, $mensaje = '') {
        // Validar si $usuario es un array válido
        if (!$usuario || !is_array($usuario)) {
            echo "<p style='color: red;'>Error: Usuario no encontrado o datos no válidos.</p>";
            return;
        }

        ?>
        <form action="/controllers/controladorActualizarUsuario.php" method="POST" class="form-container">
            <?php if (!empty($mensaje)): ?>
                <p style="color: green;"><?php echo htmlspecialchars($mensaje); ?></p>
            <?php endif; ?>
            
            <input type="hidden" id="custId" name="custId" value="<?php echo htmlspecialchars($usuario['id']); ?>">    

            <label for="datusuario" class="form-label">Usuario</label>
            <input type="text" name="datusuario" id="datusuario" class="form-input" 
                   value="<?php echo htmlspecialchars($usuario['username']); ?>" required>
            <br>

            <label for="datpassword" class="form-label">Password</label>
            <input type="password" name="datpassword" id="datpassword" class="form-input" 
                   value="<?php echo htmlspecialchars($usuario['password']); ?>" required>
            <br>

            <label for="datperfil" class="form-label">Perfil</label>
            <input type="text" name="datperfil" id="datperfil" class="form-input" 
                   value="<?php echo htmlspecialchars($usuario['perfil']); ?>" required>
            <br>

            <button type="submit" class="form-button">Modificar usuario</button>
        </form>
        <?php
    }
?>

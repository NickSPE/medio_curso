
<?php
echo '<link rel="stylesheet" type="text/css" href="/css/estiloingresarUsuarios.css">';
function mostrarFormularioIngreso() {
    if (empty($mensaje)){
?>

<form action="" method="POST">
        <h2>Registrar un nuevo usuario</h2>

        <?php if (isset($error) && $error): ?>
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

        <button type="submit">Registrar Usuarrio</button>
    </form>
    <?php
} else {
    echo $mensaje;
}
}
?>
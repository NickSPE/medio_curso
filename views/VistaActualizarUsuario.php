
<?php 
    echo '<link rel="stylesheet" type="text/css" href="/css/estilomodificar.css">';
    function mostrarFormularioBusqueda($mensaje= ''){
        if(!empty($mensaje)){
            echo $mensaje;
        }else{
?>
        <form action="/controllers/controladorActualizarUsuario.php" method="POST" class="form-container">
            <label for="datusuario" class="form-label">¿Qué usuario desea modificar?</label>
            <input type="text" name="datusuario" id="datusuario" class="form-input" required>
            <br>
            <button type="submit" class="form-button">Buscar usuario</button>
        </form>


        <?php
    }}

    function mostrarFormularioEdicion($usuario, $mensaje = ''){

        if (!empty($mensaje)) {
            echo "<p style='color: red;'>$mensaje</p>";
        }

        ?>
        <form action="/controllers/controladorActualizarUsuario.php" method="POST" class="form-container">
                <input type="hidden" id="custId" name="custId" value="<?php echo $usuario['id'] ?>">    

                <label for="datusuario" class="form-label">Usuario</label>
                <input type="text" name="datusuario" id="datusuario" class="form-input" value="<?php echo $usuario['username']?>" required>
                <br>
                <label for="datpassword" class="form-label">Password</label>
                <input type="password" name="datpassword" id="datpassword" class="form-input" value="<?php echo $usuario['password'] ?>" required>
                <br>
                <label for="datperfil" class="form-label">Perfil</label>
                <input type="text" name="datperfil" id="datperfil" class="form-input" value="<?php echo $usuario['perfil'] ?>" required>
                <br>
                <button type="submit" class="form-button">Modificar usuario</button>
            </form>

    <?php
    }
    ?>






        
      


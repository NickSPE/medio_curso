<?php
function mostrarFormularioEliminarUsuario($mensaje = '')
{
    echo '<link rel="stylesheet" type="text/css" href="/css/estiloeliminardatos.css">';
    if (!empty($mensaje)) {
        echo $mensaje;
    } else {
        ?>
        <form action="/controllers/ControladorEliminarUsuario.php" method="POST">
            <h2>Eliminar un usuario</h2>

            <label for="datusuario">¿A quién debo eliminar?</label>
            <input type="text" name="datusuario" id="datusuario" placeholder="Usuario" required>
            <br>
            <button type="submit">Eliminar usuario</button>
        </form>
        <?php
    }
}

?>

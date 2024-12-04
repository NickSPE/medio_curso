<?php
function mostrarFormularioEliminarUsuario($mensaje = '')
{
    echo '<link rel="stylesheet" type="text/css" href="/css/estiloeliminardatos.css">';
    ?>
    <body>
    <div class="form-container">
        <?php if (!empty($mensaje)) : ?>
            <div class="message">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php endif; ?>

        <form action="/controllers/ControladorEliminarUsuario.php" method="POST">
            <h2>Eliminar un usuario</h2>

            <label for="datusuario">¿A quién debo eliminar?</label>
            <input type="text" name="datusuario" id="datusuario" placeholder="Usuario" required>
            <br>
            <button type="submit">Eliminar usuario</button>
        </form>
    </div>
    </body>
    <?php
}
?>

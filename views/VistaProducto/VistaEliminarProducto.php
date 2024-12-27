<?php
function mostrarFormularioEliminarProducto($mensaje = '')
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

        <form action="/controllers/ControladorProducto/ControladorEliminarProducto.php" method="POST">
            <h2>Eliminar un Producto</h2>

            <label for="datproducto">¿Qué producto debo eliminar?</label>
            <input type="text" name="datproducto" id="datproducto" placeholder="Nombre del producto" required>
            <br>
            <button type="submit">Eliminar Producto</button>
        </form>
    </div>
    </body>
    <?php
}
?>

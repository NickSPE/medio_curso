<?php
echo '<link rel="stylesheet" type="text/css" href="/css/estiloIngresarProducto.css">';

/**
 * Muestra el formulario de ingreso de un producto.
 * @param string $mensaje Mensaje de éxito o error.
 */
function mostrarFormularioIngreso($mensaje = '') {
    ?>
    <div class="form-container">
        <h2>🛒 Registrar Nuevo Producto</h2>

        <?php if (!empty($mensaje)): ?>
            <p class="form-message"><?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>

        <form action="/controllers/ControladorProducto/ControladorIngresarProducto.php" method="POST">

            <label for="PRODUCTO" class="form-label">Nombre del Producto *</label>
            <input type="text" name="PRODUCTO" id="PRODUCTO" class="form-input" required>

            <label for="DETALLE" class="form-label">Detalle *</label>
            <input type="text" name="DETALLE" id="DETALLE" class="form-input" required>

            <label for="MARCA" class="form-label">Marca *</label>
            <input type="text" name="MARCA" id="MARCA" class="form-input" required>

            <label for="CANTIDAD" class="form-label">Cantidad *</label>
            <input type="number" name="CANTIDAD" id="CANTIDAD" step="0.01" class="form-input" required>

            <label for="PV" class="form-label">Precio de Venta *</label>
            <input type="number" name="PV" id="PV" step="0.01" class="form-input" required>

            <label for="FECHAVENCIMIENTO" class="form-label">Fecha de Vencimiento</label>
            <input type="date" name="FECHAVENCIMIENTO" id="FECHAVENCIMIENTO" class="form-input">

            <label for="UNIDAD" class="form-label">Unidad</label>
            <input type="text" name="UNIDAD" id="UNIDAD" class="form-input">

            <label for="RESPONSABLE" class="form-label">Responsable</label>
            <input type="text" name="RESPONSABLE" id="RESPONSABLE" class="form-input">

            <label for="CODIGO_VENDEDOR" class="form-label">Código de Vendedor</label>
            <input type="text" name="CODIGO_VENDEDOR" id="CODIGO_VENDEDOR" class="form-input">

            <label for="NICK" class="form-label">Nick</label>
            <input type="text" name="NICK" id="NICK" class="form-input">

            <label for="UBICACION" class="form-label">Ubicación</label>
            <input type="text" name="UBICACION" id="UBICACION" class="form-input">

            <label for="STOCKMINIMO" class="form-label">Stock Mínimo</label>
            <input type="number" name="STOCKMINIMO" id="STOCKMINIMO" step="0.01" class="form-input">

            <label for="PERECIBLE" class="form-label">¿Es Perecible?</label>
            <select name="PERECIBLE" id="PERECIBLE" class="form-input">
                <option value="0">No</option>
                <option value="1">Sí</option>
            </select>

            <label for="FACTURABLE" class="form-label">¿Es Facturable?</label>
            <select name="FACTURABLE" id="FACTURABLE" class="form-input">
                <option value="0">No</option>
                <option value="1">Sí</option>
            </select>

            <button type="submit" class="form-button">Registrar Producto</button>
        </form>
    </div>
    <?php
}
?>

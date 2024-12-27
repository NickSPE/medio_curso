<?php 
echo '<link rel="stylesheet" type="text/css" href="/css/estiloActualizarProducto.css">';

/**
 * Muestra el formulario de búsqueda de productos.
 * @param string $mensaje Mensaje de error o información.
 */
function mostrarFormularioBusqueda($mensaje = '') {
    ?>
    <form action="/controllers/ControladorProducto/ControladorActualizarProducto.php" method="POST" class="form-container">
        <?php if (!empty($mensaje)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>
        <label for="PRODUCTO" class="form-label">¿Qué producto desea modificar?</label>
        <input type="text" name="PRODUCTO" id="PRODUCTO" class="form-input" required>
        <br>
        <button type="submit" class="form-button">Buscar producto</button>
    </form>
    <?php
}

/**
 * Muestra el formulario de edición de un producto.
 * @param array $producto Datos del producto.
 * @param string $mensaje Mensaje de éxito o error.
 */
function mostrarFormularioEdicion($producto, $mensaje = '') {
    // Validar si $producto es un array válido
    if (!$producto || !is_array($producto)) {
        echo "<p style='color: red;'>❌ Error: Producto no encontrado o datos no válidos.</p>";
        return;
    }

    ?>
    <form action="/controllers/ControladorProducto/ControladorActualizarProducto.php" method="POST" class="form-container">
        <?php if (!empty($mensaje)): ?>
            <p style="color: green;"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>
        
        <!-- Campo oculto para el identificador único -->
        <input type="hidden" id="NOREG" name="NOREG" value="<?php echo htmlspecialchars($producto['NOREG'] ?? ''); ?>">    

        <label for="PRODUCTO" class="form-label">Nombre del Producto</label>
        <input type="text" name="PRODUCTO" id="PRODUCTO" class="form-input" 
               value="<?php echo isset($producto['PRODUCTO']) && !is_null($producto['PRODUCTO']) ? htmlspecialchars($producto['PRODUCTO'], ENT_QUOTES, 'UTF-8') : ''; ?>" 
               required>
        <br>

        <label for="DETALLE" class="form-label">Detalle</label>
        <input type="text" name="DETALLE" id="DETALLE" class="form-input" 
               value="<?php echo htmlspecialchars($producto['DETALLE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>

        <label for="MARCA" class="form-label">Marca</label>
        <input type="text" name="MARCA" id="MARCA" class="form-input" 
               value="<?php echo htmlspecialchars($producto['MARCA'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>

        <label for="CANTIDAD" class="form-label">Cantidad</label>
        <input type="number" step="0.01" name="CANTIDAD" id="CANTIDAD" class="form-input" 
               value="<?php echo htmlspecialchars($producto['CANTIDAD'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>

        <label for="PV" class="form-label">Precio de Venta</label>
        <input type="number" step="0.01" name="PV" id="PV" class="form-input" 
               value="<?php echo htmlspecialchars($producto['PV'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>

        <label for="FECHAVENCIMIENTO" class="form-label">Fecha de Vencimiento</label>
        <input type="date" name="FECHAVENCIMIENTO" id="FECHAVENCIMIENTO" class="form-input" 
               value="<?php echo htmlspecialchars($producto['FECHAVENCIMIENTO'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>

        <button type="submit" class="form-button">Modificar Producto</button>
    </form>
    <?php
}
?>

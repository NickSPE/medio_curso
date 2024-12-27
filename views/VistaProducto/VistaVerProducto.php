<?php

echo '<link rel="stylesheet" type="text/css" href="/css/estiloVerProducto.css">';

function mostrarProductos($productos) {
    if (empty($productos)) {
        echo "<h3 class='error-message'>No hay usuarios para mostrar.</h3>";
        return;
    }
    ?>
    <div class="custom-table-container">
        <h2>📦 LISTA DE PRODUCTOS DEL SISTEMA</h2>
        <br>
        <table class="custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Detalle</th>
                    <th>Marca</th>
                    <th>Cantidad</th>
                    <th>Precio Venta</th>
                    <th>Fecha Vencimiento</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($productos as $producto) {
                        ?>
                        <tr>
                            <td><?php echo ($producto['NOREG']    ); ?></td>
                            <td><?php echo ($producto['PRODUCTO']    ); ?></td>
                            <td> <?php echo ($producto['DETALLE']    ); ?></td>
                            <td><?php echo ($producto['MARCA']    ); ?></td>
                            <td><?php echo ($producto['CANTIDAD']    ); ?></td>
                            <td><?php echo ($producto['PV']    ); ?></td>
                            <td><?php echo ($producto['FECHAVENCIMIENTO']    ); ?></td>
                            <td>
                                <a href="../controllers/ControladorProducto/ControladorEliminarProducto.php?accion=eliminar&producto=<?php echo urlencode($producto['PRODUCTO']); ?>">🗑️ Eliminar</a>
                            </td>
                            <td>
                                <a href="../controllers/ControladorProducto/ControladorActualizarProducto.php?accion=editar&producto=<?php echo urlencode($producto['PRODUCTO']); ?>">✏️ Editar</a>
                            </td>
                        </tr>
                        <?php 
                    }
                
                ?>
            </tbody>
        </table>
    </div>
    <?php
}
?>


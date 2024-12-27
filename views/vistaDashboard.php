<?php
function dashboard($contenido) {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="<?php echo get_urlBase('css/estilodashboard.css') ?>">
    </head>
    <body>
        <div class="menu">
            <ul>
                <li><a href="?opcion=Inicio" class="active"><i class="fas fa-house"></i>Inicio</a></li>
                <li>
                    <a href="#" class="submenu-toggle"><i class="fas fa-users"></i>Usuarios <i class="fas fa-chevron-down flecha"></i></a>
                    <ul class="submenu">
                        <li><a href="?opcion=Ver"><i class="fas fa-eye"></i> Ver</a></li>
                        <li><a href="?opcion=Ingresar"><i class="fas fa-plus-circle"></i> Ingresar</a></li>
                        <li><a href="?opcion=Modificar"><i class="fas fa-edit"></i> Modificar</a></li>
                        <li><a href="?opcion=Eliminar"><i class="fas fa-trash"></i> Eliminar</a></li>
                    </ul>
                </li>
                <!-- sub menu de productos -->                
                <li>
                    <a href="#" class="submenu-toggle"><i class="fas fa-store"></i>Productos <i class="fas fa-chevron-down flecha"></i></a>
                    <ul class="submenu">
                        <li><a href="?opcion=VerProducto"><i class="fas fa-eye"></i> VerProducto</a></li>
                        <li><a href="?opcion=IngresarProducto"><i class="fas fa-plus-circle"></i> Ingresar</a></li>
                        <li><a href="?opcion=ActualizarProducto"><i class="fas fa-edit"></i> Modificar</a></li>
                        <li><a href="?opcion=EliminarProductos"><i class="fas fa-trash"></i> EliminarProducto</a></li>
                    </ul>
                </li>
                
                <li><a id="btnSalir" href="<?php echo get_controllers('controladorLogout.php') ?>"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
            </ul>
        </div>

        <div class="contenido">
            <?php echo $contenido; ?>
        </div>
        <script src="<?php echo get_UrlBase('js/menuDashboard.js') ?>"></script>
    </body>
    </html>
    <?php
}
?>

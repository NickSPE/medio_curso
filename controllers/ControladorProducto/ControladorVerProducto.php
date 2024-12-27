<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/ModeloProducto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/VistaProducto/VistaVerProducto.php';

// Verificar si el usuario tiene sesión activa
if (!isset($_SESSION["txtusername"])) {
    header('Location:' . get_urlBase('index.php'));
    exit();
}

// Obtener los productos desde el modelo
$modeloProducto = new Producto();
$productos = $modeloProducto->obtenerProductos();

// Filtrar datos importantes
$productosImportantes = array_map(function ($producto) {
    return [
        'PRODUCTO' => $producto['PRODUCTO'],
        'DETALLE' => $producto['DETALLE'],
        'MARCA' => $producto['MARCA'],
        'STOCKMINIMO' => $producto['STOCKMINIMO'],
        'CANTIDAD' => $producto['CANTIDAD'],
        'PV' => $producto['PV'], // Precio de venta
        'FECHAVENCIMIENTO' => $producto['FECHAVENCIMIENTO']
    ];
}, $productos);

// Mostrar los productos usando la vista
mostrarProductos($productos);
?>

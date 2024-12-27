<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/ModeloProducto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/VistaProducto/VistaActualizarProducto.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location:' . get_urlBase('index.php'));
    exit();
}

$mensaje = '';
$modeloProducto = new Producto();

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['NOREG'])) {
            $datosProducto = [
                'NOREG' => $_POST['NOREG'],
                'DETALLE' => $_POST['DETALLE'] ?? '',
                'PRODUCTO' => $_POST['PRODUCTO'] ?? '',
                'CANTIDAD' => $_POST['CANTIDAD'] ?? '',
                'MARCA' => $_POST['MARCA'] ?? '',
                
                'PV' => $_POST['PV'] ?? '',
                'FECHAVENCIMIENTO' => $_POST['FECHAVENCIMIENTO'] ?? '',
            ];

            // Validación de datos
            if (empty($datosProducto['NOREG']) || empty($datosProducto['PRODUCTO'])) {
                mostrarFormularioBusqueda("❌ El ID y el nombre del producto son obligatorios.");
                exit();
            }

            // Verificar si el producto existe
            $productoExistente = $modeloProducto->obtenerProductoPorNombre($datosProducto['PRODUCTO']);

            if (!$productoExistente) {
                mostrarFormularioBusqueda("❌ El producto no existe en la base de datos.");
                exit();
            }

            // Actualizar producto
            $resultado = $modeloProducto->editarProducto(
                $datosProducto['NOREG'],         // NOREG
                null,                            // FECHA
                $datosProducto['DETALLE'],       // DETALLE
                null,                            // UNIDAD
                $datosProducto['PRODUCTO'],      // PRODUCTO
                null,                            // CALCULO
                null,                            // CANCELADO
                null,                            // RESTO
                null,                            // TURNO
                null,                            // TIPO_SESION
                null,                            // NICK
                null,                            // CODIGO_VENDEDOR
                null,                            // RESPONSABLE
                null,                            // LINK
                null,                            // ULINK
                null,                            // DUAL_FLAG
                null,                            // FECHADETALLE
                $datosProducto['CANTIDAD'],      // CANTIDAD
                null,                            // PC
                $datosProducto['PV'],            // PV
                null,                            // MONTO
                null,                            // UNIDADPRODUCTO
                null,                            // PU
                null,                            // LIBROCONTABLE
                null,                            // CUENTACONTABLE
                null,                            // ESPRODUCTO
                $datosProducto['MARCA'],         // MARCA
                null,                            // TAMANIO
                null,                            // PCUSD
                null,                            // DESPLIEGUE
                null,                            // TIPOISC
                null,                            // TASAISC
                null,                            // TIPODSCTO
                null,                            // DSCTOUNIT
                null,                            // TIPOCARGO
                null,                            // CARGOUNIT
                null,                            // TIPOOPERACION
                null,                            // PR
                null,                            // MINCOMPRA
                $datosProducto['FECHAVENCIMIENTO'], // FECHAVENCIMIENTO
                null,                            // VERSION_IMG
                null,                            // SERIE
                null,                            // CODIGOSUNAT
                null,                            // AFECTOICBPER
                null,                            // UBICACION
                null,                            // PESO
                null,                            // PMAYOR
                null,                            // STOCKMINIMO
                null,                            // ESTADOSERVPROD
                null,                            // FACTURABLE
                null,                            // PERECIBLE
                null,                            // CLASIFICADOR
                null,                            // RECETA
                null,                            // NROLOTE
                null                             // PRESENTACION
            );
            

            if (!$resultado) {
                mostrarFormularioBusqueda("❌ No se pudo actualizar el producto.");
                exit();
            }

            $productoActualizado = $modeloProducto->obtenerProductoPorNombre($datosProducto['PRODUCTO']);

            if (!$productoActualizado) {
                mostrarFormularioBusqueda("❌ Producto no encontrado después de la actualización.");
                exit();
            }

            mostrarFormularioEdicion($productoActualizado, "✅ ¡Producto actualizado con éxito!");
        } elseif (isset($_POST['PRODUCTO'])) {
            $tmpProducto = $_POST['PRODUCTO'];
            if (empty($tmpProducto)) {
                mostrarFormularioBusqueda("❌ Por favor, ingrese un nombre de producto.");
                exit();
            }
            $producto = $modeloProducto->obtenerProductoPorNombre($tmpProducto);
            if ($producto) {
                mostrarFormularioEdicion($producto);
            } else {
                mostrarFormularioBusqueda("❌ Producto no encontrado.");
            }
        }
    } else {
        mostrarFormularioBusqueda();
    }
} catch (Exception $e) {
    mostrarFormularioBusqueda("⚠️ Error interno: " . $e->getMessage());
}
?>
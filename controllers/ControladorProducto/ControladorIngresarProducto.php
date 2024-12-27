<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/ModeloProducto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/VistaProducto/VistaIngresarProducto.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["txtusername"])) {
    header('Location: /index.php');
    exit();
}


function sanitize($data) {
    return trim($data ?? '');
}


function validate($data, $fields) {
    foreach ($fields as $field) {
        if (empty($data[$field])) {
            return false;
        }
    }
    return true;
}

// Campos esperados por el modelo
$fields = [
    'FECHA', 'DETALLE', 'UNIDAD', 'PRODUCTO', 'CALCULO', 'CANCELADO', 'RESTO',
    'TURNO', 'TIPO_SESION', 'NICK', 'CODIGO_VENDEDOR', 'RESPONSABLE', 'LINK', 
    'ULINK', 'DUAL_FLAG', 'FECHADETALLE', 'CANTIDAD', 'PC', 'PV', 'MONTO', 
    'UNIDADPRODUCTO', 'PU', 'LIBROCONTABLE', 'CUENTACONTABLE', 'ESPRODUCTO', 
    'MARCA', 'TAMANIO', 'PCUSD', 'DESPLIEGUE', 'TIPOISC', 'TASAISC', 'TIPODSCTO', 
    'DSCTOUNIT', 'TIPOCARGO', 'CARGOUNIT', 'TIPOOPERACION', 'PR', 'MINCOMPRA', 
    'FECHAVENCIMIENTO', 'VERSION_IMG', 'SERIE', 'CODIGOSUNAT', 'AFECTOICBPER', 
    'UBICACION', 'PESO', 'PMAYOR', 'STOCKMINIMO', 'ESTADOSERVPROD', 'FACTURABLE', 
    'PERECIBLE', 'CLASIFICADOR', 'RECETA', 'NROLOTE', 'PRESENTACION'
];

$mensaje = '';
$modeloProducto = new Producto();

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $datosProducto = [];
        foreach ($fields as $field) {
            $datosProducto[$field] = sanitize($_POST[$field] ?? null);
        }

        // Validar campos obligatorios
        if (!validate($datosProducto, ['DETALLE', 'PRODUCTO', 'CANTIDAD', 'PV', 'MARCA'])) {
            $mensaje = "❌ Los campos DETALLE, PRODUCTO, CANTIDAD, PV y MARCA son obligatorios.";
            mostrarFormularioIngreso($mensaje);
            exit();
        }

        // Insertar producto
        $resultado = $modeloProducto->insertarProducto(
            $datosProducto['FECHA'],
            $datosProducto['DETALLE'],
            $datosProducto['UNIDAD'],
            $datosProducto['PRODUCTO'],
            $datosProducto['CALCULO'],
            $datosProducto['CANCELADO'],
            $datosProducto['RESTO'],
            $datosProducto['TURNO'],
            $datosProducto['TIPO_SESION'],
            $datosProducto['NICK'],
            $datosProducto['CODIGO_VENDEDOR'],
            $datosProducto['RESPONSABLE'],
            $datosProducto['LINK'],
            $datosProducto['ULINK'],
            $datosProducto['DUAL_FLAG'],
            $datosProducto['FECHADETALLE'],
            $datosProducto['CANTIDAD'],
            $datosProducto['PC'],
            $datosProducto['PV'],
            $datosProducto['MONTO'],
            $datosProducto['UNIDADPRODUCTO'],
            $datosProducto['PU'],
            $datosProducto['LIBROCONTABLE'],
            $datosProducto['CUENTACONTABLE'],
            $datosProducto['ESPRODUCTO'],
            $datosProducto['MARCA'],
            $datosProducto['TAMANIO'],
            $datosProducto['PCUSD'],
            $datosProducto['DESPLIEGUE'],
            $datosProducto['TIPOISC'],
            $datosProducto['TASAISC'],
            $datosProducto['TIPODSCTO'],
            $datosProducto['DSCTOUNIT'],
            $datosProducto['TIPOCARGO'],
            $datosProducto['CARGOUNIT'],
            $datosProducto['TIPOOPERACION'],
            $datosProducto['PR'],
            $datosProducto['MINCOMPRA'],
            $datosProducto['FECHAVENCIMIENTO'],
            $datosProducto['VERSION_IMG'],
            $datosProducto['SERIE'],
            $datosProducto['CODIGOSUNAT'],
            $datosProducto['AFECTOICBPER'],
            $datosProducto['UBICACION'],
            $datosProducto['PESO'],
            $datosProducto['PMAYOR'],
            $datosProducto['STOCKMINIMO'],
            $datosProducto['ESTADOSERVPROD'],
            $datosProducto['FACTURABLE'],
            $datosProducto['PERECIBLE'],
            $datosProducto['CLASIFICADOR'],
            $datosProducto['RECETA'],
            $datosProducto['NROLOTE'],
            $datosProducto['PRESENTACION']
        );

        $mensaje = $resultado ? "✅ ¡Producto registrado con éxito!" : "❌ No se pudo registrar el producto.";
    }
} catch (Exception $e) {
    $mensaje = "⚠️ Error interno: " . $e->getMessage();
}

// Mostrar el formulario con el mensaje
mostrarFormularioIngreso($mensaje);
?>

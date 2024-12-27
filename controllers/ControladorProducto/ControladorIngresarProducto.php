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


function sanitize($data)
{
    return trim($data ?? '');
}


function validate($data, $fields)
{
    foreach ($fields as $field) {
        if (empty($data[$field])) {
            return false;
        }
    }
    return true;
}

// Campos esperados por el modelo
$fields = [
    'FECHA',
    'DETALLE',
    'UNIDAD',
    'PRODUCTO',
    'CALCULO',
    'CANCELADO',
    'RESTO',
    'TURNO',
    'TIPO_SESION',
    'NICK',
    'CODIGO_VENDEDOR',
    'RESPONSABLE',
    'LINK',
    'ULINK',
    'DUAL_FLAG',
    'FECHADETALLE',
    'CANTIDAD',
    'PC',
    'PV',
    'MONTO',
    'UNIDADPRODUCTO',
    'PU',
    'LIBROCONTABLE',
    'CUENTACONTABLE',
    'ESPRODUCTO',
    'MARCA',
    'TAMANIO',
    'PCUSD',
    'DESPLIEGUE',
    'TIPOISC',
    'TASAISC',
    'TIPODSCTO',
    'DSCTOUNIT',
    'TIPOCARGO',
    'CARGOUNIT',
    'TIPOOPERACION',
    'PR',
    'MINCOMPRA',
    'FECHAVENCIMIENTO',
    'VERSION_IMG',
    'SERIE',
    'CODIGOSUNAT',
    'AFECTOICBPER',
    'UBICACION',
    'PESO',
    'PMAYOR',
    'STOCKMINIMO',
    'ESTADOSERVPROD',
    'FACTURABLE',
    'PERECIBLE',
    'CLASIFICADOR',
    'RECETA',
    'NROLOTE',
    'PRESENTACION'
];

$mensaje = '';
$modeloProducto = new Producto();

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $datosProducto = [];
        foreach ($fields as $field) {
            $datosProducto[$field] = sanitize($_POST[$field] ?? null);
        }

        if (!validate($datosProducto, ['DETALLE', 'PRODUCTO', 'CANTIDAD', 'PV', 'MARCA'])) {
            $mensaje = "❌ Los campos DETALLE, PRODUCTO, CANTIDAD, PV y MARCA son obligatorios.";
            mostrarFormularioIngreso($mensaje);
            exit();
        }



        $fechaNuevo = new DateTime();
        $fecha = $fechaNuevo->format('Y-m-d');

        $fechaVencimientoString = DateTime::createFromFormat('Y-m-d', $datosProducto['FECHAVENCIMIENTO']);

        if ($fechaVencimientoString === false) {
            die('Error: La fecha no tiene el formato esperado (d-m-Y).');
        }

        $fechaVencimiento = $fechaVencimientoString->format('Y-m-d');

        $calculo = $datosProducto['CANTIDAD'] * $datosProducto['PV'];
        $cancelado = 0;
        $resto = 0;
        $turno = 1;
        $tipo_sesion = 1;
        $dual_flag = 1;
        $pc = 1.0;
        $monto_valor = $datosProducto['CANTIDAD'] * $datosProducto['PV'];
        $monto = number_format($monto_valor, 2, '.', '');
        $pu = number_format($monto_valor, 2, '.', '');

        $es_producto = 1;
        $pc_usd = 1.0;
        $despliegue = 1;
        $tipo_isc = 1;
        $tasa_isc = 1.0;
        $tipo_descto = 1;
        $dscto_unit = 1.0;
        $tipo_cargo = 1;
        $cargo_unit = 1.0;
        $tipo_operacion  = 1;
        $pr = 1.0;
        $min_compra = 1.0;



        $datosProducto['VERSION_IMG'] = 1;
        $datosProducto['AFECTOICBPER'] = 1;
        $datosProducto['PESO'] = 1.0;
         $datosProducto['PMAYOR'] = 1.0;
         $datosProducto['ESTADOSERVPROD'] = 1;
         $datosProducto['RECETA'] = 1;
        $resultado = $modeloProducto->insertarProducto(
            $fecha,
            $datosProducto['DETALLE'],
            $datosProducto['UNIDAD'],
            $datosProducto['PRODUCTO'],
            $calculo,
            $cancelado,
            $resto,
            $turno,
            $tipo_sesion,
            $datosProducto['NICK'],
            $datosProducto['CODIGO_VENDEDOR'],
            $datosProducto['RESPONSABLE'],
            $datosProducto['LINK'],
            $datosProducto['ULINK'],
            $dual_flag,
            $datosProducto['FECHADETALLE'],
            $datosProducto['CANTIDAD'],
            $pc,
            $datosProducto['PV'],
            $monto,
            $datosProducto['UNIDADPRODUCTO'],
            $pu,
            $datosProducto['LIBROCONTABLE'],
            $datosProducto['CUENTACONTABLE'],
            $es_producto,
            $datosProducto['MARCA'],
            $datosProducto['TAMANIO'],
            $pc_usd,
            $despliegue,
            $tipo_isc,
            $tasa_isc,
            $tipo_descto,
            $dscto_unit,
            $tipo_cargo,
            $cargo_unit,
            $tipo_operacion,
            $pr,
            $min_compra,
            $fechaVencimiento,
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
            $datosProducto['PRESENTACION'],

        );

        $mensaje = $resultado ? "✅ ¡Producto registrado con éxito!" : "❌ No se pudo registrar el producto.";
    }
} catch (Exception $e) {
    $mensaje = "⚠️ Error interno: " . $e->getMessage();
}

// Mostrar el formulario con el mensaje
mostrarFormularioIngreso($mensaje);

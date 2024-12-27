<?php
// Habilita errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inicia la sesión solo si no está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluye los archivos del modelo y la vista necesarios
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/ModeloProducto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/VistaProducto/VistaIngresarProducto.php';

// Verifica si el usuario tiene una sesión activa; si no, redirige al login
if (!isset($_SESSION["txtusername"])) {
    header('Location:' . get_urlBase('index.php'));
    exit();
}

// Variable para almacenar mensajes
$mensaje = '';
$modeloProducto = new Producto();

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Captura los datos enviados por el formulario
        $datosProducto = [
            'FECHA' => htmlspecialchars(trim($_POST['FECHA'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'DETALLE' => htmlspecialchars(trim($_POST['DETALLE'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'UNIDAD' => htmlspecialchars(trim($_POST['UNIDAD'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'PRODUCTO' => htmlspecialchars(trim($_POST['PRODUCTO'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'CALCULO' => $_POST['CALCULO'] ?? null,
            'CANCELADO' => $_POST['CANCELADO'] ?? null,
            'RESTO' => $_POST['RESTO'] ?? null,
            'TURNO' => $_POST['TURNO'] ?? null,
            'TIPO_SESION' => $_POST['TIPO_SESION'] ?? null,
            'NICK' => htmlspecialchars(trim($_POST['NICK'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'CODIGO_VENDEDOR' => htmlspecialchars(trim($_POST['CODIGO_VENDEDOR'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'RESPONSABLE' => htmlspecialchars(trim($_POST['RESPONSABLE'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'LINK' => htmlspecialchars(trim($_POST['LINK'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'ULINK' => htmlspecialchars(trim($_POST['ULINK'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'DUAL_FLAG' => $_POST['DUAL_FLAG'] ?? null,
            'FECHADETALLE' => htmlspecialchars(trim($_POST['FECHADETALLE'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'CANTIDAD' => $_POST['CANTIDAD'] ?? null,
            'PC' => $_POST['PC'] ?? null,
            'PV' => $_POST['PV'] ?? null,
            'MONTO' => $_POST['MONTO'] ?? null,
            'UNIDADPRODUCTO' => htmlspecialchars(trim($_POST['UNIDADPRODUCTO'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'PU' => $_POST['PU'] ?? null,
            'LIBROCONTABLE' => htmlspecialchars(trim($_POST['LIBROCONTABLE'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'CUENTACONTABLE' => htmlspecialchars(trim($_POST['CUENTACONTABLE'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'ESPRODUCTO' => $_POST['ESPRODUCTO'] ?? 1,
            'MARCA' => htmlspecialchars(trim($_POST['MARCA'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'TAMANIO' => htmlspecialchars(trim($_POST['TAMANIO'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'PCUSD' => $_POST['PCUSD'] ?? null,
            'DESPLIEGUE' => $_POST['DESPLIEGUE'] ?? 0,
            'TIPOISC' => $_POST['TIPOISC'] ?? null,
            'TASAISC' => $_POST['TASAISC'] ?? null,
            'TIPODSCTO' => $_POST['TIPODSCTO'] ?? null,
            'DSCTOUNIT' => $_POST['DSCTOUNIT'] ?? null,
            'TIPOCARGO' => $_POST['TIPOCARGO'] ?? null,
            'CARGOUNIT' => $_POST['CARGOUNIT'] ?? null,
            'TIPOOPERACION' => $_POST['TIPOOPERACION'] ?? null,
            'PR' => $_POST['PR'] ?? null,
            'MINCOMPRA' => $_POST['MINCOMPRA'] ?? null,
            'FECHAVENCIMIENTO' => $_POST['FECHAVENCIMIENTO'] ?? null,
            'VERSION_IMG' => $_POST['VERSION_IMG'] ?? null,
            'SERIE' => htmlspecialchars(trim($_POST['SERIE'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'CODIGOSUNAT' => htmlspecialchars(trim($_POST['CODIGOSUNAT'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'AFECTOICBPER' => $_POST['AFECTOICBPER'] ?? null,
            'UBICACION' => htmlspecialchars(trim($_POST['UBICACION'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'PESO' => $_POST['PESO'] ?? null,
            'PMAYOR' => $_POST['PMAYOR'] ?? null,
            'STOCKMINIMO' => $_POST['STOCKMINIMO'] ?? null,
            'ESTADOSERVPROD' => $_POST['ESTADOSERVPROD'] ?? 0,
            'FACTURABLE' => $_POST['FACTURABLE'] ?? 0,
            'PERECIBLE' => $_POST['PERECIBLE'] ?? 0,
            'CLASIFICADOR' => htmlspecialchars(trim($_POST['CLASIFICADOR'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'RECETA' => $_POST['RECETA'] ?? 0,
            'NROLOTE' => htmlspecialchars(trim($_POST['NROLOTE'] ?? ''), ENT_QUOTES, 'UTF-8'),
            'PRESENTACION' => htmlspecialchars(trim($_POST['PRESENTACION'] ?? ''), ENT_QUOTES, 'UTF-8'),
        ];

        // Validación de campos obligatorios
        if (empty($datosProducto['PRODUCTO']) || empty($datosProducto['DETALLE'])) {
            $mensaje = "❌ Los campos PRODUCTO y DETALLE son obligatorios.";
            mostrarFormularioIngreso($mensaje);
            exit();
        }

        // Insertar producto
        $resultado = $modeloProducto->insertarProducto(...array_values($datosProducto));

        if (!$resultado) {
            $mensaje = "❌ No se pudo registrar el producto.";
        } else {
            $mensaje = "✅ ¡Producto registrado con éxito!";
        }
    }
} catch (Exception $e) {
    $mensaje = "⚠️ Error interno. Intente más tarde.";
}

// Muestra el formulario de ingreso con el mensaje correspondiente
mostrarFormularioIngreso($mensaje);
?>

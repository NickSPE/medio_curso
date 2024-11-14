<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error de Clave</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('/css/estiloclaveequivocada.css') ?>">
</head>

<body>

    <!-- Contenido principal -->
    <div class="overlay" id="errorModal">
        <div class="modal-content">
            <h1>Clave equivocada, intentalo de nuevo</h1>
            <br>
            <a href="<?php echo get_urlBase('index.php') ?>" class="button">Volver al login</a>
        </div>
    </div>

    <script>
        // Muestra el modal automáticamente al cargar la página
        document.getElementById("errorModal").style.display = "flex";
    </script>

</body>

</html>

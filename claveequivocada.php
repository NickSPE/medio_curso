<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error de Clave</title>
    <link rel="stylesheet" href="./css/estiloclaveequivocada.css">
</head>
<body>

    <!-- Contenido principal -->
    <div class="overlay" id="errorModal">
        <div class="modal-content">
            <h1>Clave equivocada, intentalo de nuevo</h1>
            <br>
            <a href="http://127.0.0.1/medio_curso" class="button">Volver al login</a>
        </div>
    </div>

    <script>
        // Muestra el modal automáticamente al cargar la página
        document.getElementById("errorModal").style.display = "flex";
    </script>

</body>
</html>

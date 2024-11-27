<?php
echo '<link rel="stylesheet" type="text/css" href="/css/estiloverdatos.css">';
function mostrarUsuarios($usuarios) {
    // Verifica que $usuarios sea un array y no esté vacío
    if (empty($usuarios)) {
        echo "<h3 class='error-message'>No hay usuarios para mostrar.</h3>";
        return;
    }
    ?>
    <div class="custom-table-container">
        <h2>LISTA DE USUARIOS DEL SISTEMA</h2>
        <br>
        <table class="custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Perfil</th>
                    <th>eliminar</th>
                    <th>editar</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($usuarios as $usuario) { // Iterar sobre los usuarios
                ?>
                <tr>
                    <td><?php echo ($usuario['id']); ?></td>
                    <td><?php echo ($usuario['username']); ?></td>
                    <td><?php echo ($usuario['password']); ?></td>
                    <td><?php echo ($usuario['perfil']); ?></td>
                    <td>
                        <a href="../controllers/controladorEliminarUsuario.php?accion=eliminar&usuario=<?php echo urlencode($usuario['username']); ?>">eliminar</a>
                    </td>

                    <td>
    <a href="/controllers/controladorActualizarUsuario.php?accion=editar&usuario=<?php echo urlencode($usuario['username']); ?>">editar</a>
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


<?php
   
   if (session_status() == PHP_SESSION_NONE) {
       session_start();
   }
 
    require_once $_SERVER['DOCUMENT_ROOT'].'/models/modelousuario.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/views/vistaActualizarUsuario.php';

    if(!isset($_SESSION["txtusername"])) {
        header('Location:'.get_urlBase('index.php'));
        exit();
    }
  $mensaje='';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
       $modeloUsuario= new modelousuario();
       if(isset($_POST['custId'])){//emvio desde el formulario editar
           $tmpcustId = $_POST['custId'];
       $tmpdatusuario = $_POST["datusuario"];
       $tmpdatpassword = $_POST["datpassword"];
       $tmpdatperfil = $_POST["datperfil"];
       if (!empty($tmpcustId)) {
           $modeloUsuario->actualizarUsuario($tmpcustId,$tmpdatusuario,$tmpdatpassword,$tmpdatperfil);
           echo "Usuario actualizado con exito";
       }
       }else{
           $tmpdatusuario = $_POST['datusuario'];
           $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);
           if($usuario){
               mostrarFormularioEdicion($usuario);
       }else{
           mostrarFormularioBusqueda("Usuario no encontrado");
       }
       }
   }
     else{
       mostrarFormularioBusqueda();
     }
     
    ?>
<?php
   
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
  
     require_once $_SERVER['DOCUMENT_ROOT'].'/models/modelousuario.php';
     require_once $_SERVER['DOCUMENT_ROOT'].'/views/vistaIngresarUsuario.php';

     if(!isset($_SESSION["txtusername"])) {
         header('Location:'.get_urlBase('index.php'));
         exit();
     }
   $mensaje='';
     if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $tmpdatusuario = $_POST["datusuario"];
        $tmpdatpassword = $_POST["datpassword"];
        $tmpdatperfil = $_POST["datperfil"];
      $modeloUsuario= new modelousuario();
       
        try {
          $modeloUsuario->insertarUsuarios($tmpdatpassword, $tmpdatusuario, $tmpdatperfil);
          echo "usuario registrado con exito";
        } catch (PDOException $e) {
            $mensaje = "Error al registrar usuario: " . $e->getMessage();
        }
    } 

    mostrarFormularioIngreso($mensaje);
?>

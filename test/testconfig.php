<?php 

    //include : carga el recurso y si hay fallas no dise nada 
    //require : carga y si hay fallas emite mensajes

    //include_once:cargar solo una vez 
    //require_once:
    require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
    echo $_urlBase;
    echo get_UrlBase('pagina.php');

?>
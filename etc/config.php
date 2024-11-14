<?php


$_urlBase = "http://medio_curso.test/";
$host = '127.0.0.1';
$namedb = 'dbsistema';
$userdb = 'root';
$passworddb = '';

function get_UrlBase($arg1)
{
    return $GLOBALS['_urlBase'] . $arg1;
}

function get_views($arg1)
{
    return $GLOBALS['_urlBase'] . 'views/' . $arg1;
}

function get_models($arg1)
{
    return $GLOBALS['_urlBase'] . 'models/' . $arg1;
}

function get_controllers($arg1)
{
    return $GLOBALS['_urlBase'] . 'controllers/' . $arg1;
}
function get_img($arg1)
{
    return $GLOBALS['_urlBase'] . 'img/' . $arg1;
}


//echo $_urlBase;
//echo get_UrlBase('pagina.html');

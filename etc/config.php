<?php
    define('URL_BASE', "http://medio_curso.test/");
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'dbsistema');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');

    //funcion generica para obtener paths 

    function get_path($type,$arg1){

        $basePaths =['base'=>URL_BASE,
        'views'=>URL_BASE.'views/',
        'controllers'=>URL_BASE.'controllers/',
        'models'=>URL_BASE.'models/',
        'img'=>URL_BASE.'img/',
        'css'=>URL_BASE.'css/',
        ];
        return $basePaths[$type].$arg1;

    }

    function get_UrlBase($arg1)
    {
        return get_path('base', $arg1);
    }

    function get_views($arg1)
    {
        return get_path('views', $arg1);
    }

    function get_models($arg1)
    {
        return get_path('models', $arg1);
    }

    function get_controllers($arg1)
    {
        return get_path('controllers', $arg1);
    }

    function get_img($arg1)
    {
        return get_path('img', $arg1);
    }

    function get_css($arg1)
    {
        return get_path('css', $arg1);
    }
 

    function get_views_disk($arg1)
    {
        return $_SERVER['DOCUMENT_ROOT'].'/views/'.$arg1;
    }
    function get_controllers_disk($arg1)
    {
        return $_SERVER['DOCUMENT_ROOT'].'/controllers/'.$arg1;
    }



    //echo get_UrlBase('');
    //echo get_models('modeloUsuario.php');
    //echo 'algo';
    //echo URL_BASE;
    //echo $_urlBase;
    //echo get_UrlBase('pagina.html');
?>
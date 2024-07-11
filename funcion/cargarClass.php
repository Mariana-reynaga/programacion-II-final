<?php
    session_start();
    
    function cargarClass($nombreClase){
        $class = __DIR__."/../class/$nombreClase.php";
        if( file_exists($class) ){
            require_once $class;
        }

    };

    spl_autoload_register("cargarClass");
?>
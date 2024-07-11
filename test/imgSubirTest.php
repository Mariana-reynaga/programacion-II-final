<?php 
    require_once "funcion/cargarClass.php";
    $conexion = new Conexion();

    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo "</pre>";

    try {
        $name = (new Portada())->subirImagen($_FILES["portada"], "img/portadas");

        $portada = (new Portada())->insertarImg(
            $name,
            $_POST["txtAlt"],
            );

        header( "Location: testeo.php" );
        
    } catch (Exception $e) {
        
        die( $e->getMessage() );
    }
?>
<?php
    require_once "../../funcion/cargarClass.php";

    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo "</pre>";

    try {
        $name = (new Portada())->subirImagen($_FILES["portada"], "../../img/portadas");
        
        $portada = (new Portada())->insertarImg(
            $name,
            $_POST["txtAlt"],
        );
        
        (new Manga())->insert(
            $portada,
            $_POST["autor"],
            $_POST["genero"],
            $_POST["titulo"],
            $_POST["sinopsis"],
            $_POST["volumen"],
            $_POST["precio"],
            $_POST["publicacion"]
        );

        header("Location: ../index.php?sec=todosManga");

    } catch (Throwable $th) {
        die( $th->getMessage() );
    }
?>
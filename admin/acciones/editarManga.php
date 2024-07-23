<?php
    require_once "../../funcion/cargarClass.php";

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    $imgNueva = $_FILES["portada"] ?? FALSE; //Traigo la portada nueva, en caso de que este vacio me devuelve un falso

    try {
        if (!($_FILES["portada"]["error"] == 4)) { //cambios si se subio una nueva portada
            (new Portada())->deleteFile("../../img/portadas/".$_POST["portada-og"]); //elimino el archivo de la carpeta portadas
            
            $newName = (new Portada())->subirImagen($imgNueva, "../../img/portadas"); //subo la imagen nueva a la carpeta portadas

            echo $newName;

            $newPortada = (new Portada())->reemplazarIMG(
                $newName,
                $_POST["txtAlt"],
                $_POST["portada-og-id"]
            );

        }else{
            $portada = (new Portada())->reemplazarIMG(
                $_POST["portada-og-id"],
                $_POST["portada-og"],
                $_POST["txtAlt"]
            );
        }


        $newManga = (new Manga())->editarManga(
            $_POST["autor"],
            $_POST["genero"],
            $_POST["titulo"],
            $_POST["sinopsis"],
            $_POST["volumen"],
            $_POST["precio"],
            $_POST["publicacion"],
            $_POST["id"]
        );

        header("Location: ../index.php?sec=todosManga");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>
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
        if ($imgNueva) { //si tengo una imagen nueva
            
            (new Portada())->deleteFile("../../img/portadas/".$_POST["portada-og"]); //elimino el archivo de la carpeta portadas
            
            $newName = (new Portada())->subirImagen($imgNueva, "../../img/portadas"); //subo la imagen nueva a la carpeta portadas

            $newPortada = (new Portada())->reemplazarIMG(
                $_POST["portada-og-id"],
                $newName,
                $_POST["txtAlt"]
            );

        };
        
        header("Location: ../index.php?sec=home");
    } catch (\Throwable $th) {
        //throw $th;
    }
?>
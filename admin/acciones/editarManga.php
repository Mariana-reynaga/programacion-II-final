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
            
            

        };

        if (!($_FILES["portada"]["error"] == 4)) { //cambios si se subio una nueva portada
            (new Portada())->deleteFile("../../img/portadas/".$_POST["portada-og"]); //elimino el archivo de la carpeta portadas
            
            $newName = (new Portada())->subirImagen($imgNueva, "../../img/portadas"); //subo la imagen nueva a la carpeta portadas

            $newPortada = (new Portada())->reemplazarIMG(
                $_POST["portada-og-id"],
                $newName,
                $_POST["txtAlt"]
            );

        }else{ //cambios si no se subio una nueva portada
            echo "no hay nada";
        }

        header("Location: ../index.php?sec=home");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>
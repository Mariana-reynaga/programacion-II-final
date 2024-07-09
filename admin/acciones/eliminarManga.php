<?php
    require_once "../../funcion/cargarClass.php";

    $id = $_GET["id"] ?? false;
    $idPortada= $_GET["idPortada"] ?? false;

    try {
        if ($id) {
            $manga = (new Manga())->catalogo_x_id($id);
            $portada = (new Portada())->get_x_id($idPortada);

            
            $manga->eliminar($id);
            $portada->deleteIMG($idPortada);

            (new Portada())->deleteFile("../../img/portadas/".$portada->getImagenPortada()); 
            
            header("Location: ../index.php?sec=home");
        }else{
            throw new Exception();
        }
    } catch (Exception $error) {
        echo $error->getMessage();
    }

?>
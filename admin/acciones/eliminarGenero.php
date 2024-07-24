<?php
    require_once "../../funcion/cargarClass.php";

    $id = $_GET["id"] ?? false;

    try {
        if ($id) {
            $genero = (new Genero())->get_x_id($id);
            
            $genero->eliminarGenero($id);

            header("Location: ../index.php?sec=genero-admin");
            (new Alerta())->agregar("Se elimino el genero exitosamente", "success");
        }else{
            throw new Exception();
        }
    } catch (Exception $error) {
        echo $error->getMessage();
    }

?>
<?php
    require_once "../../funcion/cargarClass.php";

    $id = $_GET["id"] ?? false;

    try {
        if ($id) {
            $autor = (new Autor())->get_x_id($id);
            
            $autor->eliminarAutor($id);
            
            header("Location: ../index.php?sec=dashboard");
        }else{
            throw new Exception();
        }
    } catch (Exception $error) {
        echo $error->getMessage();
    }

?>
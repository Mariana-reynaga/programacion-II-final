<?php 
    require_once "../../funcion/cargarClass.php";

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    try{
        (new Autor())->editarAutor(
            $_POST["newNomYap"],
            $_POST["id"]
        );

        header("Location: ../index.php?sec=autor-admin");
        (new Alerta())->agregar("Se edito el autor exitosamente", "success");

    }catch(Throwable $th){

        die( $th->getMessage() );
    }
?>
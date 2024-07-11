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

        header("Location: ../index.php?sec=admin-autor");

    }catch(Throwable $th){

        die( $th->getMessage() );
    }
?>
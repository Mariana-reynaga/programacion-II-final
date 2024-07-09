<?php 
    require_once "../../funcion/cargarClass.php";

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    try{
        (new Genero())->editarGenero(
            $_POST["newGenero"],
            $_POST["id"]
        );

        header("Location: ../index.php?sec=home");

    }catch(Throwable $th){

        die( $th->getMessage() );
    }
?>
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

        header("Location: ../index.php?sec=genero-admin");
        (new Alerta())->agregar("Se edito el genero exitosamente", "success");

    }catch(Throwable $th){
        die( $th->getMessage() );
    }
?>
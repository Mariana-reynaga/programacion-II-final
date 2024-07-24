<?php 
    require_once "../../funcion/cargarClass.php";

    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo "</pre>";

    try {
        (new Autor())->insert(
            $_POST["nomYap"],
        );
        
        header("Location: ../index.php?sec=autor-admin");

        (new Alerta())->agregar("Autor agregado", "success");

    }catch (\Throwable $th) {
        die( $th->getMessage() );  
    }

?>
<?php
    require_once "../../funcion/cargarClass.php";

    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo "</pre>";

    try {
        (new Genero())->insert(
            $_POST["nomGenero"],
        );
        
        header("Location: ../index.php?sec=genero-admin");

        (new Alerta())->agregar("Genero agregado", "success");

    }catch (\Throwable $th) {
        die( $th->getMessage());  
    }
?>
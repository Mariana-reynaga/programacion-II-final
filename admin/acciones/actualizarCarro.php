<?php
    require_once "../../funcion/cargarClass.php";

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    if (!empty($_POST["cantidad"])) {
        (new Carrito())->actualizar_carro( $_POST["cantidad"] );
        
        header("Location: ../../index.php?sec=carrito");

    }

?>
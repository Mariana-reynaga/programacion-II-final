<?php
    require_once "../../funcion/cargarClass.php";

    $id = $_GET["id"] ?? false;

    if ($id) {
        (new Carrito())->eliminar_del_carro($id);
        
        header("Location: ../../index.php?sec=carrito");
    }
?>
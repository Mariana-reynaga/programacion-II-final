<?php
    require_once "../../funcion/cargarClass.php";

    (new Carrito())->eliminar_Carro();
    
    header("Location: ../../index.php?sec=carrito");
?>
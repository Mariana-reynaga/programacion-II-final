<?php 
    $id=$_POST["id"] ?? false;
    $cantidad = $_POST["c"] ?? 1;

    if ($id) {
        (new Carrito())->agregarProd($id,$cantidad);
        header("../../views/carrito.php");
    }


?>
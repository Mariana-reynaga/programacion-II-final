<?php 
    require_once "../../funcion/cargarClass.php";

    $mangas_ids = $_POST["mangas_en_carro"];

    $user_id = $_POST["userID"];

    try {
        if (!empty($mangas_ids)) {
            foreach ($mangas_ids as $id => $cantidad) {
                
                //guardo en la base de datos el usuario, productos y cantidades
               (new Carrito())->guardar($user_id, $id, $cantidad);

               header("Location: ../../index.php");
            }
        }else {
            header("Location: ../../index.php?sec=carrito");
        }
    } catch (Exception $error) {
        echo $error->getMessage();
    }
?>
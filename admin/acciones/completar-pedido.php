<?php
    require_once "../../funcion/cargarClass.php";

    $completos_ids = $_POST["ids_pedido_completo"];

    $userID = $_POST["userID"];

    try {
        if (!empty($completos_ids)) {
            foreach ($completos_ids as $id) {
                (new Carrito())->marcar_completado($id, 'completado');
            }

            header("Location: ../index.php?sec=ver-pedido&id=$userID");

            (new Alerta())->agregar("Orden completada", "success");
        }else {

            header("Location: ../index.php?sec=ver-pedido&id=$userID");
        }
    } catch (Exception $error) {
        echo $error->getMessage();
    }
?>
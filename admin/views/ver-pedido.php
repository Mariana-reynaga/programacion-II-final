<?php
    $id = $_GET["id"] ?? FALSE;

    $user = (new Usuario())->user_x_id($id);

    $carroF = (new Carrito())->pedidos_x_fecha_usuario($id);

    $pedido_x_fecha = array();

    foreach($carroF as $key => $valuesAry){
        $date = date('d H:i:s', strtotime($valuesAry->fecha));
        $pedido_x_fecha[$date][] = $valuesAry;
    }
?>

<h1 class="text-center my-4">Detalles de <?= $user->getNomUsuario()?></h1>

<div class="container d-flex">
    <div class="container border rounded m-2 align-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre y Apellido</th>
                    <th scope="col">E-mail</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td scope="row"> <?= $user->getNombre() ?> </th>
                    <td> <?= $user->getEmail() ?> </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="container my-2">
    <?= (new Alerta())->get_alertas() ?>
</div>

<?php if (empty($pedido_x_fecha)) {?>
    <div class="container">
        <h3 class="mt-5">Todavía no se realizaron pedidos.</h3>
    </div>
<?php }else {?>
    <div class="container">
    <div class="row row-cols-3">
        <?php foreach ($pedido_x_fecha as $dias) {?>
            <div class="col">
                <div class="container border rounded m-2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                            </tr>
                        </thead>
            
                        <tbody>
                            <?php
                                $fecha;
                                $estado;
                                foreach ($dias as $prod) { 
                                $fecha = $prod->getFecha();  
                                $estado = $prod->getEstado(); 
                            ?>
                                <tr>
                                    <td scope="row"> #</th>
                                    <td><?= $prod->getCatalogoID() ?></th>
                                    <td><?= $prod->getPrecio() ?></th>
                                    <td><?= $prod->getCantidad() ?></th>
                                </tr>
                            <?php }?>
                            
                            <h3><?= $fecha?></h3>
                        </tbody>

                        <tfoot> 
                            <tr>
                                <?php if ($estado == 'pendiente') {?>
                                    <td colspan="3">Estado: <?= $estado?> </td>
                                    <td>
                                        <form action="acciones/completar-pedido.php" method="POST">
                                            <input type="hidden" name="userID" value="<?= $id ?>">
                                            <?php foreach ($dias as $prod) { ?>
                                                <input type="hidden" name="ids_pedido_completo[<?= $prod->getID()?>]" value="<?= $prod->getID()?>">
                                                <button type="submit" class="btn add">Marcar como Completado</button>
                                            <?php } ?>
                                        </form>
                                    </td>

                                <?php }else if ($estado == 'completado') {?>
                                    <td colspan="4" class="bg-success">Estado: Completado </td>
                                <?php }?>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        <?php }?>
    </div>
    </div>
<?php }?> 
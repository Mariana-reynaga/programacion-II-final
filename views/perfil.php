<?php 
    $id = $_GET["id"] ?? FALSE;

    $user = (new Usuario())->user_x_id($id);

    $carroF = (new Carrito())->pedidos_x_fecha_usuario($id);

    $pedido_x_fecha = array();

    foreach($carroF as $key => $valuesAry){
        $date = date('d', strtotime($valuesAry->fecha));
        $pedido_x_fecha[$date][] = $valuesAry;
    }
?>

<h1 class="text-center my-4">Bienvenido <?= $user->getNomUsuario()?></h1>

<div class="container">
    <h2>Tus pedidos</h2>

    <div class="row row-col-3">
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
                                foreach ($dias as $prod) { 
                                $fecha = $prod->getFecha(); ?>
                                <tr>
                                    <td scope="row"> #</th>
                                    <td><?= $prod->getCatalogoID() ?></th>
                                    <td><?= $prod->getPrecio() ?></th>
                                    <td><?= $prod->getCantidad() ?></th>
                                </tr>
                            <?php }?>
                            
                            <h3><?= $fecha?></h3>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php }?>
        
    </div>
</div>
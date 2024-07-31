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

<?php if( isset($_SESSION["loginUser"] )) {?>
    <h1 class="text-center my-4">Bienvenido <?= $user->getNomUsuario()?></h1>

    <div class="container">
        <h2>Tus pedidos</h2>

        <?php if (empty($pedido_x_fecha)) {?>
            <h3 class="mt-5">Todavía no pediste nada</h3>
        <?php }else {?>
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
        <?php }?> 
    </div>
    
<?php }else{
    header("Location: index.php");
}?>
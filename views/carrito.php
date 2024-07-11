<?php 
    $miCarro = (new Carrito())->carroCompleto();

    // $total;

?>

<div class="container my-4">
    <form action="admin/acciones/actualizarCarro.php" method="POST">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Portada</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col" >Precio c/u</th>
                    <th scope="col" >Subtotal</th>
    
                </tr>
            </thead>
    
            <tbody>
                <?php foreach ($miCarro as $id => $manga) {?>
                    <tr>
                        <td style="width: 10%;"> <img src="img/portadas/<?= $manga["portada"]?>" style="width: 100%"> </td>
        
                        <td > <p><?= $manga["titulo"]?></p> </td>
        
                        <td>
                            <input class="form-control w-25" type="number" min="1" value="<?= $manga["cantidad"]?>" name="cantidad[<?= $id ?>]">
                        </td>
        
                        <td> <p>$<?= $manga["precio"]?></p> </td>
        
                        <td> <p>$<?= (new Carrito())->calcular($manga["precio"],$manga["cantidad"])?></p> </td>
    
                        <td>
                            <a href="admin/acciones/eliminarDeCarro.php?id=<?= $id ?>" class="btn bg-danger">Eliminar</a>
                        </td>
                    </tr>
    
                <?php }?>
            </tbody>
        </table>
    
        <div class="container mt-5">
            <div class="w-25 d-flex justify-content-between">
                <button type="submit" class="btn bg-primary">actualizar</button>
                <a href="admin/acciones/eliminarCarro.php" class="btn bg-danger">vaciar</a>
            </div>
    
        </div>
    </form>
</div>
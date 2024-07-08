<?php 
    $miCarro = new Carrito();
    $items = $miCarro->carroCompleto();

?>

<div class="container my-4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Portada</th>
                <th scope="col">Datos</th>
                <th scope="col">Cantidad</th>
                <th scope="col" class="text-end">Precio c/u</th>
                <th scope="col" class="text-end">Subtotal</th>

            </tr>
        </thead>

        <tbody>
            <?php foreach ($items as $id => $manga) {?>
                <tr> <img src="img/portada/<?= $manga["portada"]?>" alt=""> </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<?php
    $usuarios = (new Usuario())->todos_usuarios();

?>
<h1 class="text-center my-4">Pedidos</h1>

<div class="container">  
    <div class="row row-cols-2 g-3">
        <?php foreach ($usuarios as $users){ ?>
            <div class="card mx-3" style="width: 30%;"> 
                <div class="card-body d-flex justify-content-evenly align-items-center">
                    <h5 class="card-title m-0"><?= $users->getNomUsuario()?></h5>

                    <a href="index.php?sec=ver-pedido&id=<?= $users->getID()?>" class="btn add">Ver Pedidos</a>
                </div>
            </div>

        <?php }?>

    </div>
</div>
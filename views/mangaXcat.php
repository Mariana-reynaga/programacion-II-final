<?php
    $generoSelec = $_GET["gen"];

    $mangas =(new Manga())->catalogo_x_categoria($generoSelec);
?>

<h1 class="text-center my-4"><?= $generoSelec ?></h1>

<div class="container">    
    <div class="row">
        <?php foreach ($mangas as $producto){ ?>
            <div class="col">
                <div class="card m-3" style="width: 20vw;">
                    <img src="<?=$producto->getPortada()?>" class="card-img-top">
            
                    <div class="card-header d-flex flex-column" style="min-height:8vw">
                        <h2><?=$producto->getNombre()?></h2>
        
                        <p class="ms-3 mb-0 d-flex align-items-center">Autor: <?=$producto->getAutor() ?></p>
                    </div>
            
                    <div class="card-body d-flex flex-column">
                        <p class="card-text">"<?=$producto->getSinopsis()?>"</p>

                        <h3>$<?=$producto->getPrecio()?></h3>
                        
                        <a href="index.php?sec=productoIndv&id=<?= $producto->getId() ?>" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>    
</div>
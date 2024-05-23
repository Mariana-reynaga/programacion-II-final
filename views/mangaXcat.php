<?php
    $generoSelec = $_GET["gen"];

    $mangas =(new Manga())->catalogo_x_categoria($generoSelec);
?>

<style>
    #boton{
        border-color: #2B2D42; 
        color:#2B2D42;
        background-color: white;
    } #boton:hover{
        background-color: #2B2D42;
        color: white;
    }

</style>

<h1 class="text-center my-4"><?= $generoSelec ?></h1>

<div class="container">    
    <div class="row">
        <?php foreach ($mangas as $producto){ ?>
            <div class="col">
                <div class="card m-3" style="width: 20vw;">
                    <img src="<?=$producto->getPortadaID()?>" class="card-img-top">
            
                    <div class="card-header d-flex flex-column" style="min-height:2vw">
                        <h2><?=$producto->getTitulo()?></h2>
                    </div>
            
                    <div class="card-body d-flex flex-column mx-2">
                        <ul class="list-group list-group-flush mb-2">
                            <li class="list-group-item">Autor: <?=$producto->getAutorID() ?></li>
                            <li class="list-group-item">Volumen: <?=$producto->getVolumen() ?></li>
                        </ul>

                        <p class="card-text">"<?=$producto->getSinopsis()?>"</p>

                        <h3 class="mb-4">$<?=$producto->getPrecio()?></h3>
                        
                        <a href="index.php?sec=productoIndv&id=<?= $producto->getID()?>" class="btn" id="boton">Comprar</a>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>    
</div>
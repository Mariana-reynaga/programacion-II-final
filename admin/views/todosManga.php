<?php
    $mangas =(new Manga() )->catalogo();
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

<h1 class="text-center my-4">Manga</h1>

<div class="container">  
    <div class="row row-cols-3">
        
        <?php foreach ($mangas as $producto){ ?>
            <div class="col">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../img/portadas/<?=$producto->getPortada()?>" class="img-fluid rounded-start" alt="<?= $producto->getTextoAlt() ?>">
                        </div>

                        <div class="col align-self-center">
                            <div class="card-body">
                                <h5 class="card-title"><?=$producto->getTitulo()?></h5>
                                <p class="card-text"><?=$producto->getAutorID()?></p>
                                <p class="card-text">Volumen: <?=$producto->getVolumen() ?></p>
                                
                                <a href="index.php?sec=editar-manga&id=<?= $producto->getID()?>" class="btn add">
                                    editar
                                </a>

                                <a href="index.php?sec=eliminar-Comic&id=<?= $producto->getID()?>" class="btn elim">
                                    eliminar
                                </a>
                                
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>

    </div>
</div>
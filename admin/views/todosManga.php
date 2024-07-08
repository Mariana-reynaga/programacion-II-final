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
    <!-- <?php foreach ($mangas as $producto){ ?>
        <div class="container d-flex p-2 border border-dark-subtle rounded my-4">
            
            <div class="container d-flex justify-content-evenly" style="width: 80%;">

                <img src="../img/portadas/<?=$producto->getPortada()?>" alt="<?= $producto->getTextoAlt() ?>" class="rounded float-start" style="width: 25%;">

                <div class="ms-2 d-flex flex-column justify-content-center" style="width:50%">
                    <h3><?=$producto->getTitulo()?></h3>
                    <p><?=$producto->getAutorID()?></p>
                    <p>Volumen: <?=$producto->getVolumen() ?> </p>
                </div>
            </div>

            <div class="container d-flex justify-content-evenly flex-column" style="width: 20%;">
                <button class="btn bg-primary">editar</button>
                <button class="btn bg-danger">eliminar</button>
            </div>
        </div>
    <?php }?> -->
    
    <div class="row row-cols-2 justify-content-center">
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

                                <button class="btn bg-primary">editar</button>
                                <button class="btn bg-danger">eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>

    </div>
</div>
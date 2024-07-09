<?php 
    $generos = (new Genero())->genero_completo();

?>

<h1 class="text-center my-4">Generos / Secciones</h1>

<div class="container">  
    <div class="row row-cols-2 g-3">
        <?php foreach ($generos as $genero){ ?>
            <div class="card w-25 mx-3"> 
                <div class="card-body d-flex justify-content-evenly">
                    <h5 class="card-title"><?= $genero->getGenero()?></h5>
                    <a href="index.php?sec=eliminar-genero&id=<?= $genero->getID()?>" class="btn btn-danger">Eliminar</a>
                </div>
            </div>

        <?php }?>

    </div>
</div>
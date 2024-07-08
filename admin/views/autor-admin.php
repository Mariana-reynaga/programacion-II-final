<?php 
    $autores = (new Autor())->autores_completo();

?>

<h1 class="text-center my-4">Autores</h1>

<div class="container">  
    <div class="row row-cols-2 g-3">
        <?php foreach ($autores as $autor){ ?>
            <div class="card w-25 mx-3"> 
                <div class="card-body d-flex justify-content-evenly">
                    <h5 class="card-title"><?= $autor->getNombreAutor()?></h5>
                    <a href="index.php?sec=eliminar-autor&id=<?= $autor->getID()?>" class="btn btn-danger">Eliminar</a>
                </div>
            </div>

        <?php }?>

    </div>
</div>
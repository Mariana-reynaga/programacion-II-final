<?php
    
    $id= $_GET["id"];

    $mangas =(new Manga() )->pag_indv($id);
?>

<div class="container-fluid d-flex flex-row m-4">
        <div class="container p-4 d-flex" style="background-color: #E1E1E1;">
            <div>
                <img src="<?= $mangas->getPortada() ?>">
            </div>
            
            <div class="container d-flex flex-column align-items-center">
                <h1 class="mt-4"><?= $mangas->getNombre()?></h1>
                <p class="mt-2">Volumen  <?= $mangas->getVolumen() ?></p>

                <div class="container mt-4" style="width:80%">
                    <h2 class="mt-2 mb-4">Autor: <?= $mangas->getAutor()?></h2>
                    <h2 class="mb-4 fw-bold">$<?= $mangas->getPrecio() ?></h2>

                    <p class="fs-3 fw-semibold">Sinopsis:</p>
                    <p class="fs-4">"<?= $mangas->getSinopsis() ?>"</p>

                    <button class="mt-4 btn btn-outline-primary btn-lg" style="width: 10vw">Comprar</button>
                </div>
            </div>

        </div>
    </div>
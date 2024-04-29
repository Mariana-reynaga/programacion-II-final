<?php
    
    $id= $_GET["id"];

    $mangas =(new Manga() )->pag_indv($id);
?>

<style>
    #boton{
        border-color: #2B2D42; 
        color:#2B2D42;
        width: 10vw;
    } #boton:hover{
        background-color: #2B2D42;
        color: white;
    }

</style>

<div class="container-fluid d-flex flex-row m-4">
        <div class="container p-4 d-flex" style="background-color: #FFBF69;">
            <div>
                <img src="<?= $mangas->getPortada() ?>">
            </div>
            
            <div class="container d-flex flex-column align-items-center">
                <h1 class="mt-4 text-center" style="width:80%"><?= $mangas->getNombre()?></h1>
                <p class="mt-2">Volumen  <?= $mangas->getVolumen() ?></p>

                <div class="container mt-4" style="width:80%">
                    <h2 class="mt-2 mb-4">Autor: <?= $mangas->getAutor()?></h2>
                    <h2 class="mb-4 fw-bold">$<?= $mangas->getPrecio() ?></h2>

                    <p class="fs-3 fw-semibold">Sinopsis:</p>
                    <p class="fs-4">"<?= $mangas->getSinopsis() ?>"</p>

                    <button class="mt-4 btn btn-outline-primary btn-lg" id="boton">Comprar</button>
                </div>
            </div>

        </div>
    </div>
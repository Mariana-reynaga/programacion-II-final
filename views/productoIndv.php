<?php
    
    $id= $_GET["id"];

    $mangas =(new Manga() )->catalogo_x_id($id);
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
        <div class="container p-4 d-flex rounded" style="border: solid 3px #FFBF69;">
            <div>
                <img src="img/portadas/<?=$mangas->getPortada()?>" alt="<?= $mangas->getTextoAlt() ?>" class="card-img">
            </div>
            
            <div class="container d-flex flex-column align-items-center">
                <h1 class="mt-4 text-center" style="width:80%"><?= $mangas->getTitulo()?></h1>
                <p class="mt-2">Volumen  <?= $mangas->getVolumen() ?></p>

                <div class="container mt-4" style="width:80%">
                    <h3 class="mt-2 mb-4">Autor: <?= $mangas->getAutorID()?></h2>
                    <h3 class="mb-4 fw-bold">$<?= $mangas->getPrecio() ?></h2>

                    <p class="fs-4 fw-semibold">Sinopsis:</p>
                    <p class="fs-4">"<?= $mangas->getSinopsis() ?>"</p>

                    <form action="admin/acciones/agregarAcarro.php" method="post">
                        <div class="container row">
                            <div class="col-2 align-self-center p-0">
                                <input class="form-control" type="number" name="cantidad" id="cantidad" min="1" value="1" style="width: 5vw">
                            </div>

                            <div class="col-3">
                                <input type="hidden" value="<?= $mangas->getID()?>" name="id">
                                <button type="submit" class="btn btn-lg" id="boton"> Agregar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
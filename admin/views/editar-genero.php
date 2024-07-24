<?php
    $id = $_GET["id"] ?? FALSE;

    $genero = (new Genero())->get_x_id($id);
?>

<div class="container">
    <h1 class="text-center my-4">Editar <?= $genero->getGenero() ?></h1>

    <div class="d-flex px-5">

        <form action="acciones/editarGenero.php" class="w-100" method="POST" enctype="application/x-www-form-urlencoded">
            <div class="my-2">
                <label for="newGenero" class="form-label">Nombre del Genero</label>
                
                <input type="text" class="form-control" id="newGenero" name="newGenero" required value="<?= $genero->getGenero() ?>">
            </div>
            
            <input type="hidden" value="<?= $genero->getID()?>" name="id">
            
            <div class="container-fluid d-flex justify-content-center mt-3">
                <button type="submit" class="btn py-2 px-3 fs-4 add">Actualizar</button>
            </div>
        </form>
        
    </div>
</div>
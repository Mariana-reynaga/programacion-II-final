<?php
    $id = $_GET["id"] ?? FALSE;

    $autor = (new Autor())->get_x_id($id);
?>

<div class="container">
    <h1 class="text-center my-4">Editar <?= $autor->getNombreAutor() ?></h1>

    <div class="d-flex px-5">

        <form action="acciones/editarAutor.php" class="w-100" method="POST" enctype="application/x-www-form-urlencoded">
            <div class="my-2">
                <label for="newNomYap" class="form-label">Nombre y apellido del autor</label>
                
                <input type="text" class="form-control" id="newNomYap" name="newNomYap" required value="<?= $autor->getNombreAutor() ?>">
            </div>
            
            <input type="hidden" value="<?= $autor->getID()?>" name="id">
            
            <div class="container-fluid d-flex justify-content-center mt-3">
                <button type="submit" class="btn py-2 px-3 fs-4 add">Actualizar</button>
            </div>
        </form>
        
    </div>
</div>
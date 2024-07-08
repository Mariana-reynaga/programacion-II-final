<?php
    $id = $_GET["id"] ?? FALSE;
    $autor = (new Autor())->get_x_id($id)
?>

<div class="d-flex align-items-center flex-column mt-5">
    <h2>¿Realmente desea eliminar <?= $autor->getNombreAutor() ?>?</h2>
    
    <div class="container d-flex justify-content-evenly mt-5" style="width: 30vw;">
        <a href="index.php?sec=autor-admin" class="btn bg-primary">No, volver a Autores</a>
        <a href="acciones/eliminarAutor.php?id=<?= $autor->getID()?>" class="btn bg-danger link-light">Sí, quiero eliminar</a>
    </div>
</div>
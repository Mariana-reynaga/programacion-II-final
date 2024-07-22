<?php
    $id = $_GET["id"] ?? FALSE;
    $genero = (new Genero())->get_x_id($id);
?>

<?php if( isset($_SESSION["login"] )) { ?>

    <div class="d-flex align-items-center flex-column mt-5">
        <h2>¿Realmente desea eliminar <?= $genero->getGenero() ?>?</h2>
        
        <div class="container d-flex justify-content-evenly mt-5" style="width: 30vw;">
            <a href="index.php?sec=genero-admin" class="btn bg-primary">No, volver a Generos</a>
            <a href="acciones/eliminarGenero.php?id=<?= $genero->getID()?>" class="btn bg-danger link-light">Sí, quiero eliminar</a>
        </div>
    </div>

<?php }else{
    header("Location: index.php?sec=dashboard");   
}?>
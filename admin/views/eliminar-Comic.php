<?php
    $id = $_GET["id"] ?? FALSE;
    $manga = (new Manga())->catalogo_x_id($id);
?>

<?php if( isset($_SESSION["login"] )) { ?>

    <div class="d-flex align-items-center flex-column mt-5">
        <h2>¿Realmente desea eliminar <?= $manga->getTitulo() ?>, volumen <?= $manga->getVolumen() ?>?</h2>
        
        <div class="container d-flex justify-content-evenly mt-5" style="width: 30vw;">
            <a href="index.php?sec=todosManga" class="btn bg-primary">No, volver a Mangas</a>
            <a href="acciones/eliminarManga.php?id=<?= $manga->getID()?>&idPortada=<?= $manga->getPortadaID() ?>" class="btn bg-danger link-light">Sí, quiero eliminar</a>
        </div>
    </div>

<?php }else{
    header("Location: index.php?sec=dashboard");   
}?>
<?php
    $id = $_GET["id"] ?? FALSE;

    $manga = (new Manga())->catalogo_x_id($id);

    $autores = (new Autor())->autores_completo();

    $genero= (new Genero())->genero_completo();
?>

<?php if( isset($_SESSION["login"] )) { ?>
    
<div class="container mt-3">
    <h1 class="text-center mb-5">Editar <?= $manga->getTitulo() ?></h1>

    <form action="acciones/editarManga.php" method="POST" enctype="multipart/form-data" class="row">
        <input type="hidden" name="id" value="<?= $manga->getID() ?>">
        <div class="col">
            <div class="my-2">
                <label for="titulo" class="form-label">Titulo</label>
                
                <input type="text" class="form-control" id="titulo" name="titulo" required value="<?= $manga->getTitulo() ?>">
            </div>
            
            <div class="my-2">
                <label for="autor" class="form-label">Autor</label>
                <select name="autor" id="autor" class="form-select" required>
                    <option value="" selected disabled>Elija una Autor</option>

                    <?php foreach ($autores as $guionista) { ?>

                        <option <?= $guionista->getID() === $manga->getAutorIden() ? "selected" : "" ?> value="<?= $guionista->getID() ?>"> <?= $guionista->getNombreAutor() ?> </option>

                    <?php } ?>
    
                </select>
            </div>
            
            <div class="my-2">
                <label for="publicacion" class="form-label">Fecha de publicacion</label>
                <input type="date" name="publicacion" id="publicacion" class="form-control" required value="<?= $manga->getPublicacion() ?>">
            </div>

            <div class="my-2">
                <label for="volumen" class="form-label">Volumen</label>
                
                <input type="number" min="1" class="form-control" id="volumen" name="volumen" required value="<?= $manga->getVolumen() ?>">
            </div>

            <div class="my-2">
                <label for="precio" class="form-label">Precio</label>
                
                <input type="number" min="1" class="form-control" id="precio" name="precio" required value="<?= $manga->getPrecio() ?>">
            </div>

            <div class="my-2">
                <label for="sinopsis" class="form-label">Sinopsis</label>
        
                <textarea name="sinopsis" id="sinopsis" class="form-control" cols="30" rows="5" required><?= $manga->getSinopsis() ?></textarea>
            </div>
        </div>
        
        <div class="col">
            <div class="my-2 d-flex flex-column">
                <img src="../img/portadas/<?= $manga->getPortada()?>" alt="" style="width:30%;" class="align-self-center">
                
                <label for="portada" class="form-label">portada</label>
                <input class="form-control" type="file" id="portada" name="portada">

                <!-- imagen original -->
                <input type="hidden" name="portada-og" value="<?=$manga->getPortada()?>">
                <input type="hidden" name="portada-og-id" value="<?=$manga->getPortadaID()?>">
            </div>
                        
            <div class="my-2">
                <label for="txtAlt" class="form-label">texto Alt</label>
                <textarea name="txtAlt" id="txtAlt" class="form-control" required><?= $manga->getTextoAlt() ?></textarea>
            </div>
            
            <div class="my-2">
                <label for="genero" class="form-label">Genero</label>
                <select name="genero" id="genero" class="form-select" required>
                    <option value="" selected disabled>Elija una Genero</option>
                    <?php foreach ($genero as $generoSel) { ?>

                        <option <?= $generoSel->getID() === $manga->getGeneroID() ? "selected" : "" ?> value="<?= $generoSel->getID() ?>"> <?= $generoSel->getGenero() ?> </option>

                    <?php } ?>
    
                </select>
            </div>
        </div>
        
        <div class="container-fluid d-flex justify-content-center mt-3">
            <button type="submit" class="btn add py-2 px-3 fs-3">Guardar Cambios</button>
        </div>
    </form>
</div>

<?php }else{
    header("Location: index.php?sec=dashboard");   
}?>
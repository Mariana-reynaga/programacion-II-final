<?php 
    $generos = (new Genero())->genero_completo();

?>

<?php if( isset($_SESSION["login"] )) { ?>
    <h1 class="text-center my-4">Generos / Secciones</h1>

    <div class="container">  
        <div class="row row-cols-2 g-3">
            <?php foreach ($generos as $genero){ ?>
                <div class="card mx-3" style="width: 30%;"> 
                    <div class="card-body d-flex justify-content-evenly align-items-center">
                        <h5 class="card-title"><?= $genero->getGenero()?></h5>
                        <a href="index.php?sec=editar-genero&id=<?= $genero->getID()?>" class="btn add">Editar</a>
                        <a href="index.php?sec=eliminar-genero&id=<?= $genero->getID()?>" class="btn elim">Eliminar</a>
                    </div>
                </div>

            <?php }?>

        </div>
    </div>
    
<?php }else{
    header("Location: index.php?sec=dashboard");   
}?>
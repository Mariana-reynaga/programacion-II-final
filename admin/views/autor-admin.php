<?php 
    $autores = (new Autor())->autores_completo();

?>
<?php if( isset($_SESSION["login"] )) { ?>
    <h1 class="text-center my-4">Autores</h1>

    <div class="container">  
        <div class="row row-cols-2 g-3">
            <?php foreach ($autores as $autor){ ?>
                <div class="card mx-3" style="width: 30%;"> 
                    <div class="card-body d-flex justify-content-evenly align-items-center">
                        <h5 class="card-title m-0"><?= $autor->getNombreAutor()?></h5>
                        <a href="index.php?sec=editar-autor&id=<?= $autor->getID()?>" class="btn add">Editar</a>
                        <a href="index.php?sec=eliminar-autor&id=<?= $autor->getID()?>" class="btn elim">Eliminar</a>
                    </div>
                </div>

            <?php }?>

        </div>
    </div>

<?php }else{
    header("Location: index.php?sec=dashboard");   
}?>
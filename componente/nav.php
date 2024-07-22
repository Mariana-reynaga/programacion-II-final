<style>
    .nav-link{
        color: #2B2D42;

    }
    .nav-link:hover{
        color: #D80032;
    }

</style>

<?php 
    $secciones = (new Genero())->genero_completo();
?>

<div class="container-fluid" style="background-color: #CBF3F0;">
    <header class="d-flex flex-wrap justify-content-center align-items-center py-3 border-bottom">
        <a href="index.php?sec=home" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <span class="fs-4 fw-bold" style="color: #2B2D42">M Point</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="index.php?sec=todosManga" class="nav-link">Manga</a></li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Secciones
                </a>

                <ul class="dropdown-menu">
                    <?php foreach ($secciones as $genero) { ?>
                        <li class="nav-item">
                            <a href="index.php?sec=mangaXcat&gen=<?=$genero->getID()?>" class="dropdown-item">
                                <?= $genero->getGenero() ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>

            <li class="nav-item"><a href="index.php?sec=carrito" class="nav-link">Carro</a></li>
            <li class="nav-item"><a href="index.php?sec=contacto" class="nav-link">Contacto</a></li>
            <li class="nav-item"><a href="index.php?sec=datosAlum" class="nav-link">Datos</a></li>

            <?php if( isset($_SESSION["login"] )) {?>
                <li class="nav-item"><a href="admin/acciones/logout-check.php" class="nav-link">Cerrar Sesión</a></li>
            <?php }else{ ?>
                <li class="nav-item"><a href="index.php?sec=inicio-sesion-customer" class="nav-link">Iniciar Sesión</a></li>
            <?php }?>
        </ul>
    </header>
</div>
<?php
?>


<div class="container">
    <h1 class="text-center my-4">Dashboard</h1>
    <div class="container">
        <?php if( isset($_SESSION["login"] )) {?>
            <p class="text-center">Bienvenido al Panel de control de M-point</p>
        <?php }else{ ?>
            <div class="container d-flex justify-content-center">
                <a href="index.php?sec=logIn" class="btn add py-2 px-3 fs-4">Iniciar Sesión</a>
            </div>
        <?php }?>
    </div>
</div>
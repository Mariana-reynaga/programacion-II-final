<div class="container">
    <h1 class="text-center my-4">Dashboard</h1>
    <div class="container">
        <?php if( isset($_SESSION["login"] )) {?>
            <?= (new Alerta())->get_alertas() ?>
            <p class="text-center">Bienvenido al Panel de control de M-point</p>
        <?php }else{ ?>
            <div class="container d-flex flex-column align-items-center justify-content-center">
                <a href="index.php?sec=logIn" class="btn add py-2 px-3 fs-4">Iniciar Sesión</a>
                <a href="../index.php?sec=home" class="fw-bold text-decoration-none mt-3 py-2 px-3 fs-5">Volver a Tienda</a>
            </div>
        <?php }?>
    </div>
</div>
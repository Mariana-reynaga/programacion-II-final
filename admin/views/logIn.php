<div class="container">
    <h1 class="text-center my-4">Iniciar Sesión</h1>

    <div class="container my-2">
        <?= (new Alerta())->get_alertas() ?>
    </div>
    
    <form action="acciones/login-check.php" class="d-flex justify-content-center mt-5" method="POST" autocomplete="off">
        <div class="container w-50 row  p-4 border border-secondary-subtle rounded">
            <div class="col">
                <label for="user" class="form-label">Nombre de Usuario</label>
                <input type="text" name="user" id="user" class="form-control" required>
            </div>
    
            <div class="col">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="container mt-3 d-flex justify-content-center">
                <button type="submit" class="btn add py-2 px-3 fs-4">Ingresar</button>
            </div>
        </div>
        
    </form>
</div>
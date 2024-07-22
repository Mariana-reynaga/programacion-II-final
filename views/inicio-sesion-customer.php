<div class="container">
    <h1 class="text-center my-4">Iniciar Sesión</h1>
    <form action="admin/acciones/login-check-user.php" class="d-flex justify-content-center mt-5" method="POST" autocomplete="off">
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

    <div class="container mt-3 d-flex flex-column align-items-center justify-content-center">
        <a href="index.php?sec=registro" class="fw-bold text-decoration-none py-2 px-3 fs-5">Registrar cuenta</a>

        <a href="admin" class="fw-bold text-decoration-none py-2 px-3 fs-5">¿Sos administrador? Inicia sesión aca</a>
    </div>
</div>
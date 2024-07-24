<div>
    <h1 class="text-center my-3">Registrar Usuario</h1>

    <form action="acciones/registrar-admin.php" method="POST" class="d-flex justify-content-center mt-5" autocomplete="off">
        <div class="container w-50 row row-cols-2 p-4 border border-secondary-subtle rounded">
            <div class="col mb-2">
                <label for="nomIRL" class="form-label">Nombre completo</label>
                <input type="text" name="nomIRL" id="nomIRL" class="form-control" required>
            </div>

            <div class="col mb-2">
                <label for="newUser" class="form-label">Nombre de usuario</label>
                <input type="text" name="newUser" id="newUser" class="form-control" required>
            </div>

            <div class="col my-2">
                <label for="newMail" class="form-label">Email</label>
                <input type="email" name="newMail" id="newMail" class="form-control" required>
            </div>

            <div class="col my-2">
                <label for="newPass" class="form-label">Contraseña</label>
                <input type="password" name="newPass" id="newPass" class="form-control" required>
            </div>

            <div class="container-fluid d-flex justify-content-center mt-5">
                <button type="submit" class="btn add py-2 px-3 fs-3">Agregar Usuario</button>
            </div>
        </div>
    </form>
</div>
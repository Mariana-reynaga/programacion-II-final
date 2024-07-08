<?php 
   $generos = (new Genero())->genero_completo();
?>

<div class="container mt-3">
    <h1 class="text-center mb-5">Agregar un nuevo Genero</h1>

    <div class="row">
        <div class="col">
            <form action="acciones/agregarGenero.php" method="POST" enctype="application/x-www-form-urlencoded">
                <div class="my-2">
                    <label for="nomGenero" class="form-label">Genero a agregar</label>
                    
                    <input type="text" class="form-control" id="nomGenero" name="nomGenero" required>
                </div>

                <div class="container-fluid d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary py-2 px-3 fs-4">Cargar</button>
                </div>
          </form>
        </div>

        <div class="col">
            <h2>Lista de Genero</h2>
            <ul class="list-group list-group-flush">
                <?php foreach ($generos as $genero) { ?>
                        <li class="list-group-item"> <?= $genero->getGenero() ?> </li>
                <?php } ?>
            </ul>
        </div>
    </div>


</div>
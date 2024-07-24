<?php 
    $autores = (new Autor())->autores_completo();
?>

<div class="container mt-3">
    <h1 class="text-center mb-5">Agregar un nuevo Autor</h1>

    <div class="row">
        <div class="col">
            <form action="acciones/agregarAutor.php" method="POST" enctype="application/x-www-form-urlencoded">
                <div class="my-2">
                    <label for="nomYap" class="form-label">Nombre y apellido del autor</label>
                    
                    <input type="text" class="form-control" id="nomYap" name="nomYap" required>
                </div>

                <div class="container-fluid d-flex justify-content-center mt-3">
                    <button type="submit" class="btn py-2 px-3 fs-4 add">Cargar</button>
                </div>
        </form>
        </div>

        <div class="col">
            <h2>Lista de Autores</h2>
            <ul class="list-group list-group-flush">
                <?php foreach ($autores as $guionista) { ?>
                        <li class="list-group-item"> <?= $guionista->getNombreAutor() ?> </li>
                <?php } ?>
            </ul>
        </div>
    </div>


</div>
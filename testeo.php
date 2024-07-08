<?php
    require_once "funcion/cargarClass.php";

    $conexion = new Conexion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/estilo.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Test</title>
</head>
<body>
    <!-- <div class="container">
        <form action="imgSubirTest.php" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-3">
            
                <label for="portada" class="form-label">portada</label>
                <input class="form-control" type="file" id="portada" name="portada">

            </div>

            <div class="col-md-6 mb-3">

                <label for="txtAlt" class="form-label">texto Alt</label>
                <textarea name="txtAlt" id="txtAlt" class="form-control"></textarea>

            </div>

            <button type="submit" class="btn btn-primary">Cargar</button>
        </form>
    </div> -->

    <div class="container d-flex p-2 border border-dark-subtle rounded mt-4">
        <div class="container d-flex justify-content-evenly">
            <img src="img/dbs-v3.jpg" class="rounded float-start" style="width: 25%;">
            <div class="ms-2 d-flex flex-column justify-content-center">
                <h3>titulo del manga</h3>
                <p>Autor del manga</p>
                <p>Volumen: 598</p>
            </div>
        </div>

        <div class="container d-flex justify-content-evenly flex-column">
            <button class="btn bg-primary">editar</button>
            <button class="btn bg-danger">eliminar</button>
        </div>
    </div>
</body>
</html>
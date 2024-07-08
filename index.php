<?php
    require_once "funcion/procesarForm.php";

    require_once "funcion/cargarClass.php";

    $categoria = isset( $_GET["sec"] ) ? $_GET["sec"] : "home";

    $viewsValidas= [
        "home" => [
            "title" => "M Point"
        ],
        "todosManga" => [
            "title" => "Manga"
        ],
        "mangaXcat" => [
            "title" => "Generos"
        ],
        "productoIndv" => [
            "title" => "Detalles"
        ],
        "contacto" => [
            "title" => "Contacto"
        ],
        "datosAlum" => [
            "title" => "Datos de Alumno"
        ],
        "carrito" =>[
            "title" => "Carrito"
        ],
    ];

    if( array_key_exists($categoria, $viewsValidas) ){
        $vistas = $categoria;
        $titulo = $viewsValidas[$categoria]["title"];
    }else{
        $vistas = "error";
        $titulo = "Pagina no encontrada";
    };
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>

    <link href="css/estilo.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php require "componente/nav.php" ?>
    <div class="position-relative" style="min-height:100vh; padding-bottom:15vw;">

        <?php file_exists("views/$vistas.php") ? require "views/$vistas.php" : require "views/home.php" ?>

        <?php require_once "componente/footer.php"?>
    </div>
</body>

</html>
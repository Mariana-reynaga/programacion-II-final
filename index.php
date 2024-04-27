<?php
    require_once "class/Manga.php";

    $categoria = isset( $_GET["cat"] ) ? $_GET["cat"] : "home";

    $vistas = "404";

    $viewsValidas= [
        "home" => [
            "title" => "M Point"
        ],
        "todosManga" => [
            "title" => "Manga"
        ],
        "accion" => [
            "title" => "Acción"
        ],
        "fantasia" => [
            "title" => "Fantasía"
        ],
        "suspenso" => [
            "title" => "Suspenso"
        ],
        "contacto" => [
            "title" => "Contacto"
        ],
        "alumno" => [
            "title" => "Datos de Alumno"
        ],
    ];

    if( array_key_exists($categoria, $viewsValidas) ){
        $vistas = $categoria;
        $titulo = $viewsValidas[$categoria]["title"];
    }else{
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

</head>

<body>
    <?php require "componente/nav.php" ?>
    <div class="position-relative" style="min-height:100vh; padding-bottom:15vw;">

        <?php file_exists("views/$vistas.php") ? require "views/$vistas.php" : require "views/home.php" ?>

        <?php require_once "componente/footer.php"?>
    </div>
</body>

</html>
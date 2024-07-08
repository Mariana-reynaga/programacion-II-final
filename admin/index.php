<?php
    require_once "../funcion/cargarClass.php";

    $categoria = isset( $_GET["sec"] ) ? $_GET["sec"] : "home";

    $vistas = "error";

    $viewsValidas= [
        "home" => [
            "title" => "Administración"
        ],
        "agregarMangaForm" =>[
            "title" => "Agregar"
        ],
        "todosManga" => [
            "title" => "Manga"
        ]
        // "editarManga" =>[
        //     "title" => "Editar"
        // ]
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title><?= $titulo ?></title>
</head>
<body>
    <div class="container-fluid" style="background-color: #CBF3F0;">
        <header class="d-flex flex-wrap justify-content-center py-3 border-bottom">
            <a href="index.php?sec=home" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <span class="fs-4 fw-bold" style="color: #2B2D42">M Point</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="index.php?sec=agregarMangaForm" class="nav-link">agregar Manga</a></li>
                <li class="nav-item"><a href="index.php?sec=todosManga" class="nav-link">Manga</a></li>
                <!-- <li class="nav-item"><a href="index.php?sec=editarManga" class="nav-link">editar Manga</a></li> -->
            </ul>
        </header>
    </div>

    

    <?php file_exists("views/$vistas.php") ? require "views/$vistas.php" : require "views/dashboard.php" ?>

</body>
</html>
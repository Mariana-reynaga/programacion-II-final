<?php
    require_once "../funcion/cargarClass.php";

    $categoria = isset( $_GET["sec"] ) ? $_GET["sec"] : "dashboard";

    $vistas = "error";

    $viewsValidas= [
        "dashboard" => [
            "title" => "Administración"
        ],
        "agregarMangaForm" =>[
            "title" => "Agregar Manga"
        ],
        "todosManga" => [
            "title" => "Manga"
        ],
        "agregarAutorForm" => [
            "title" => "Agregar Autor"
        ],
        "agregarGeneroForm" => [
            "title" => "Agregar Genero"
        ],
        "autor-admin" => [
            "title" => "Autores"
        ],
        "genero-admin" => [
            "title" => "Generos"
        ],
        "eliminar-Comic" => [
            "title" => "¿Esta seguro?"
        ],
        "eliminar-autor" => [
            "title" => "¿Esta seguro?"
        ],
        "eliminar-genero" => [
            "title" => "¿Esta seguro?"
        ],
        "editar-autor" =>[
            "title" => "Editar autor"
        ],
        "editar-genero" =>[
            "title" => "Editar genero"
        ],
        "editar-manga" =>[
            "title" => "Editar manga"
        ],
        "logIn" =>[
            "title" => "Iniciar Sesión"
        ],
        "agregarUsuarioForm" =>[
            "title" => "Agregar Usuario"
        ]
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link href="css/estilos-admin.css" rel="stylesheet">
    
    <title><?= $titulo ?></title>
</head>

<body>
    <div class="container-fluid" style="background-color: #CBF3F0;">
        <header class="d-flex flex-wrap justify-content-center py-3 border-bottom">
            <a href="index.php?sec=dashboard" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <span class="fs-4 fw-bold" style="color: #2B2D42">M Point Admin</span>
            </a>

            <ul class="nav nav-pills">
                <?php if( isset($_SESSION["login"] )) {?>
                    <li class="nav-item"><a href="../index.php?sec=home" class="nav-link">Tienda</a></li>
                    <li class="nav-item"><a href="index.php?sec=todosManga" class="nav-link">Manga</a></li>
                    <li class="nav-item"><a href="index.php?sec=autor-admin" class="nav-link">Autores</a></li>
                    <li class="nav-item"><a href="index.php?sec=genero-admin" class="nav-link">Generos</a></li>

                    <!-- menú drop down -->
                    <li class="nav-item dropdown">
                        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Agregar
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="index.php?sec=agregarMangaForm" class="dropdown-item">agregar Manga</a></li>
                            <li><a href="index.php?sec=agregarAutorForm" class="dropdown-item">Agregar Autor</a></li>
                            <li><a href="index.php?sec=agregarGeneroForm" class="dropdown-item">Agregar Genero</a></li>
                            <li><a href="index.php?sec=agregarUsuarioForm" class="dropdown-item">Agregar Usuario</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a href="acciones/logout-check.php" class="nav-link">Cerrar Sesión</a></li>
                <?php }else{ ?>
                    <li class="nav-item"><a href="index.php?sec=logIn" class="nav-link">Iniciar Sesión</a></li>
                <?php } ?>
            </ul>

        </header>
    </div>
    
    <?php file_exists("views/$vistas.php") ? require "views/$vistas.php" : require "views/dashboard.php" ?>
    
</body>
</html>
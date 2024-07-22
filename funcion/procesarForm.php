<?php
    error_reporting(E_ERROR | E_PARSE); //evita que se muestren errores por los campos vacios

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $tipo = $_POST["opcion"];
    $mensaje = $_POST["textArea"];

    try {
        if (isset($_POST['nombre'])) {
            
            header("Location: ../index.php?sec=contacto");

        }else {
            throw new Exception();
        }


    } catch (Exception $error) {
        echo $error->getMessage();
    }
?>

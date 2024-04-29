<?php
    error_reporting(E_ERROR | E_PARSE);

    $nombre = $_POST["nombre"];

    $apellido = $_POST["apellido"];

    $email = $_POST["email"];

    $tipo = $_POST["opcion"];

    $mensaje = $_POST["textArea"];

    echo "<script>";
    echo "console.log('nombre y apellido: '+'$nombre'+' '+'$apellido');";
    echo "console.log('email: '+'$email' );";
    echo "console.log('opcion elegida: '+'$tipo');";
    echo "console.log('mensaje: '+'$mensaje');";
    echo "</script>";

?>

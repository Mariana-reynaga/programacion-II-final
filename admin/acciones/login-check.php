<?php
    require_once "../../funcion/cargarClass.php";

    $user = $_POST["user"];
    $password = $_POST["password"] ;

    $login = (new Autentificar())->log_in_admin($user, $password);

    if ($login) {
        header("Location: ../index.php?sec=dashboard");
        (new Alerta())->agregar("Bienvenido a administración", "success");
    }else{
        header("Location: ../index.php?sec=logIn");
        (new Alerta())->agregar("Usuario y/o contraseña incorrectos, porfavor intente devuelta.", "danger");
    }
?>
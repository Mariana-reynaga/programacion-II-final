<?php
    require_once "../../funcion/cargarClass.php";

    $user = $_POST["user"];
    $password = $_POST["password"] ;

    $login = (new Autentificar())->log_in_admin($user, $password);

    if ($login) {
        header("Location: ../index.php?sec=dashboard");
    }else{
        header("Location: ../index.php?sec=logIn");
    }
?>
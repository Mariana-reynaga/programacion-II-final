<?php
    require_once "../../funcion/cargarClass.php";

    $user = $_POST["user"];
    $password = $_POST["password"] ;

    $login = (new Autentificar())->log_in_user($user, $password);

    if ($login) {
        header("Location: ../../index.php");
    }else{
        header("Location: ../../index.php?sec=inicio-sesion-customer");
    }
?>
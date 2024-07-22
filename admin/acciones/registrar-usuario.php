<?php
    require_once "../../funcion/cargarClass.php";

    $nombre = $_POST["nomIRL"];
    $usuario = $_POST["newUser"];
    $mail = $_POST["newMail"];
    $contraseña = $_POST["newPass"];

    try{
        $usCheck = (new Usuario())->get_x_usuario($usuario);

        if ($usCheck) {
            header("Location: ../../index.php?sec=registro");
        }else{
            (new Usuario())->crear_user(
                $nombre,
                $usuario,
                $mail,
                $contraseña
            );

            header("Location: ../../index.php");
        }
    }catch(Exception $e){

        die( $e->getMessage() );
    }
?>
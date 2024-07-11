<?php
    require_once "../../funcion/cargarClass.php";

    $nombre = $_POST["nomIRL"];
    $usuario = $_POST["newUser"];
    $mail = $_POST["newMail"];
    $contraseña = $_POST["newPass"];

    try{
        $usCheck = (new Usuario())->get_x_usuario($usuario);

        if ($usCheck) {
            header("Location: ../index.php?sec=agregarUsuarioForm");
        }else{
            (new Usuario())->crear_usuario(
                $nombre,
                $usuario,
                $mail,
                $contraseña
            );

            header("Location: ../index.php?sec=dashboard");
        }
    }catch(Exception $e){

        die( $e->getMessage() );
    }
?>
<?php
    require_once "../../funcion/cargarClass.php";

    (new Autentificar())->log_out_user();

    header("Location: ../../index.php");
?>
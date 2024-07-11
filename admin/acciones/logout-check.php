<?php
    require_once "../../funcion/cargarClass.php";

    (new Autentificar())->log_out();

    header("Location: ../index.php");
?>
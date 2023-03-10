<?php
    require_once('../model/rechazoSolicitud.php');
    $cedula = $_GET["cedula"];
    $hora = $_GET["hora"];
    $minuto = $_GET["minuto"];
    $segundo = $_GET["segundo"];
    $query = recahzoSolicitud::rechazoSolicitud($cedula,$hora,$minuto,$segundo);
    if ($query == 'exito') {
        header('location: ../index?message=exito');
    } else {
        header('location: ../index?message=error');
    }
?>
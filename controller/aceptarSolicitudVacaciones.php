<?php
    require_once('../model/aceptarSolicitud.php');
    $cedula = $_GET["cedula"];
    $dias = $_GET["dias"];
    $hora = $_GET["hora"];
    $minuto = $_GET["minuto"];
    $segundo = $_GET["segundo"];
    // var_dump($_GET);
    
    // var_dump($_GET);
    $query = aceptarSolcitud::aceptaSolicitud($cedula,$dias,$hora,$minuto,$segundo);
    if ($query == 'exito') {
        header('location: ../index?message=exito');
    } else {
        header('location: ../index?message=error');
    }
?>
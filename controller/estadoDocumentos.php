<?php 
require_once('../model/estadoDocumento.php');
$cedula = $_GET["cedula"];
$estado = $_GET["estado"];
$hora= $_GET["hora"];
$minuto= $_GET["minuto"];
$segundo= $_GET["segundo"];

$actualizacion = estadoDocumento::updateEstado($cedula,$estado,$hora,$minuto,$segundo);
if ($actualizacion == 'exito') {
    header('location: ../index?message=exito');
} else {
    header('location: ../index?message=error');
}
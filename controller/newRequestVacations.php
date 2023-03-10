<?php
require_once('../model/solicitaVacacion.php');
require_once('../model/cedulaUsuario.php');

// var_dump($_POST);
$user = $_POST["user"];
$diasFavor = $_POST["diasFavor"];
$desde = new DateTime($_POST["desde"]);
$hasta = new DateTime($_POST["hasta"]);
$difDias = $desde->diff($hasta);
$diasSolicita = $difDias->days;
$diasSolicita = $diasSolicita + 1;

$nombres = explode('-', $user);
$cedula = cedulaUsuario::cedulaUsuarioQuery($nombres[0], $nombres[1]);
if($desde > $hasta || $diasSolicita > $diasFavor){
    header('location: ../index?message=negativo');
    die();
}
if ($desde == $hasta) {
    $obs = 'Vacaciones';
    $dias = 1;
    $query = solicitaVacacion::solicitaVacaciones($nombres[0] . ' ' . $nombres[1], $diasFavor, $dias, $obs, $desde->format('d/m/Y'), $hasta->format('d/m/Y'), $cedula[0]["empleado"]);
    if ($query == 'exito') {
        header('location: ../index?message=exito');
    } else {
        header('location: ../index?message=error');
    }
} 
 if ($desde < $hasta) {
    if ($difDias->days == 1) {
        $obs = 'Vacaciones';
        $query = solicitaVacacion::solicitaVacaciones($nombres[0] . ' ' . $nombres[1], $diasFavor, $diasSolicita, $obs, $desde->format('d/m/Y'), $hasta->format('d/m/Y'), $cedula[0]["empleado"]);
        if ($query == 'exito') {
            header('location: ../index?message=exito');
        } else {
            header('location: ../index?message=error');
        }
    } else if ($difDias->days > $diasFavor) {
        header('location: ../index?message=maxDias');
    } else {
        $obs = 'Vacaciones';
        $query = solicitaVacacion::solicitaVacaciones($user, $diasFavor, $diasSolicita, $obs, $desde->format('d/m/Y'), $hasta->format('d/m/Y'), $cedula[0]["empleado"]);
        if ($query == 'exito') {
            header('location: ../index?message=exito');
        } else {
            header('location: ../index?message=error');
        }
    }
} 


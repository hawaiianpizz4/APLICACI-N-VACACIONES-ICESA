<?php
require_once('../model/editarSolicitudVaca.php');
require_once('../model/cedulaUsuario.php');

$user = $_POST["user"];
$estado = $_POST["estado"];
$diasFavor = $_POST["diasFavor"];
$desde = new DateTime($_POST["desde"]);
$hasta = new DateTime($_POST["hasta"]);
$difDias = $desde->diff($hasta);
$diasSolicita = $difDias->days;
$nombres = explode('-',$user);
$cedula = cedulaUsuario::cedulaUsuarioQuery($nombres[0],$nombres[1]);
if($estado == 'Pendiente'){
    if($desde < $hasta){
        if ($difDias->days == 1) {
            $obs = 'permiso con carga a vacaciones';
            $query = editarVacaciones::editarVacacion($diasSolicita,$desde->format('d/m/Y'), $hasta->format('d/m/Y'),$cedula[0]["empleado"]);
        if ($query == 'exito') {
            header('location: ../index?message=exito');
        } else {
            header('location: ../index?message=error');
        }
    } else if($difDias->days > $diasFavor){
        header('location: ../index?message=maxDias');
    }else{
        $obs = 'vacaciones';
        $query = editarVacaciones::editarVacacion($diasSolicita,$desde->format('d/m/Y'), $hasta->format('d/m/Y'),$cedula[0]["empleado"]);
        if ($query == 'exito') {
            header('location: ../index?message=exito');
        } else {
            header('location: ../index?message=error');
        }
    }
}else{
    header('location: ../index?message=negativo');
}
}else{
    header('location: ../index?message=estado');
}

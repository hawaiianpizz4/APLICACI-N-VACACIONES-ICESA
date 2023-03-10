<?php
session_start();
if (!$_SESSION["nombre"]) {
    header('Location: ./login');   
} 
include "Controller/plantillaController.php";
$plantilla= new ControllerPlantilla();
$plantilla->ctrPlantilla();
?>
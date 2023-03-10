<?php

class ControllerPlantilla{
    //metodo que incluye la plantilla
    public function ctrPlantilla(){
        include "view/plantilla.php";
    }

    public function ctrLogin(){
        include "view/login.php";
    }
}
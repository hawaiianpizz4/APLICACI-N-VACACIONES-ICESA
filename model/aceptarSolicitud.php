<?php
    require_once("conexion.php");
    class aceptarSolcitud{
        static public function aceptaSolicitud($cedula,$dias,$hora,$minuto,$segundo){
            $stmt= Conexion::conectar()->prepare("update control_usuarios.vacaciones_usuarios_tb 
            set vacaciones = vacaciones - $dias
            where empleado = '$cedula'");     
            $stmt2 = Conexion::conectar()->prepare("update control_usuarios.solicitudes_activas_tb
            set estado = 1 where cedula = '$cedula' and hour(fechaSolicitud)='$hora' and MINUTE(fechaSolicitud)='$minuto' and SECOND(fechaSolicitud)='$segundo'");
            if($stmt->execute()){
                $stmt2->execute();
                $valor = 'exito';
            }else{
                $valor = 'error';
            }
            return $valor;
        }
    }
?>
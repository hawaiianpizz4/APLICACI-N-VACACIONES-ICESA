<?php
    require_once("conexion.php");
    
    class estadoDocumento{
        static public function updateEstado($cedula,$estado,$hora,$minuto,$segundo){
            $stmt= Conexion::conectar()->prepare("update control_usuarios.solicitudes_activas_tb 
            set documentoRRHH = '$estado' 
            where cedula = '$cedula' and hour(fechaSolicitud)='$hora' and MINUTE(fechaSolicitud)='$minuto' and SECOND(fechaSolicitud)='$segundo'");
            if($stmt->execute()){
                $valor = 'exito';
            }else{
                $valor = 'error';
            }
            return $valor;
        }
    }

?>
<?php
    require_once("conexion.php");
    class listSolicitud{
        static public function listSolicituduser($cedula){
            $stmt= Conexion::conectar()->prepare("select observaciones, usuario,diasSolicita,
            CASE 
                when estado = 0 then 'Pendiente' 
                WHEN estado = 1 then 'Aprobado' 
                WHEN estado = 2 then 'Rechazado' 
            END as estado,fechaSolicitud,cedula,fechaDesde,fechaHasta,
            CONCAT(fechaDesde,'----',fechaHasta) as fechasDesde
             from control_usuarios.solicitudes_activas_tb
             where cedula = '$cedula'  order by fechaDesde desc  ");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }
?>
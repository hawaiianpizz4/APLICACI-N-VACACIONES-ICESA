<?php
    require_once("conexion.php");
    class historialxPersona{
        static public function historialPersona($nombre,$apellido){
            $stmt= Conexion::conectar()->prepare("select observaciones, usuario,diasSolicita,
            CASE 
                when estado = 0 then 'Pendiente' 
                WHEN estado = 1 then 'Aprobado' 
                WHEN estado = 2 then 'Rechazado' 
            END as estado,
            CONCAT(fechaDesde,'----',fechaHasta) as fechasDesde
             from control_usuarios.solicitudes_activas_tb
             where usuario like '%$nombre%' and usuario like '%$apellido%' and estado != 0 order by fechaDesde desc  ");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }
?>
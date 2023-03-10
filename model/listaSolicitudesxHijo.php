<?php
    require_once("conexion.php");
    
    class listaUsuariosxHijo{
        static public function listaUsuarioxHijo($nombre,$apellido){
            $stmt= Conexion::conectar()->prepare("select *,CONCAT(fechaDesde,'----',fechaHasta) as fechasDesde,
            CASE 
                when b.estado = 0 then 'Pendiente' 
                WHEN b.estado = 1 then 'Aprobado' 
                WHEN b.estado = 2 then 'Recahazado' 
            END as estado,
            HOUR(fechaSolicitud) as hora ,MINUTE(fechaSolicitud) as minutos, SECOND(fechaSolicitud) as segundos
            from control_usuarios.vacaciones_usuarios_tb a
            inner join control_usuarios.solicitudes_activas_tb b on a.empleado = b.cedula 
            where jefe like '%$nombre%' and jefe like '%$apellido%' and b.estado = 0");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

?>
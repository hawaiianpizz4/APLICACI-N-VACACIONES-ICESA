<?php
    require_once("conexion.php");
    
    class listaTotal{
        static public function lista(){
            $stmt= Conexion::conectar()->prepare("select a.usuario,b.cargo,
            CASE 
                            when a.estado = 0 then 'Pendiente' 
                            WHEN a.estado = 1 then 'Aprobado' 
                            WHEN a.estado = 2 then 'Recahazado' 
            END as estado,a.observaciones,
            CASE 
                            when a.documentoRRHH = 0 then 'Sin Entregar' 
                            WHEN a.documentoRRHH = 1 then 'Entregado' 
                            WHEN a.documentoRRHH = 2 then 'Recahazado' 
            END as estadoRRHH,a.diasSolicita,a.cedula,HOUR(fechaSolicitud) as hora ,MINUTE(fechaSolicitud) as minutos, SECOND(fechaSolicitud) as segundos
            from control_usuarios.solicitudes_activas_tb a
            inner join control_usuarios.vacaciones_usuarios_tb b on a.cedula = b.empleado 
            where estado = 1");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

?>
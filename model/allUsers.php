<?php
    require_once("conexion.php");
    
    class allUsers{
        static public function list(){
            $stmt= Conexion::conectar()->prepare("SELECT a.nombres,a.cargo,
            CASE 
                when b.diasHistorico is null then a.vacaciones
                when b.diasHistorico is not null then b.diasHistorico
            END as vTotal,
            (select sum(diasSolicita) from control_usuarios.solicitudes_activas_tb where cedula = a.empleado and estado=1) as sTotal ,
            a.vacaciones,a.jefe 
            from control_usuarios.vacaciones_usuarios_tb a
            left join control_usuarios.solicitudes_activas_tb b on a.empleado = b.cedula");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

?>
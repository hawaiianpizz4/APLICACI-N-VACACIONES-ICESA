<?php
    require_once("conexion.php");
    
    class documentosRRHH{
        static public function RRHH($nombre,$apellido){
            $stmt= Conexion::conectar()->prepare("select * from control_usuarios.asignacion_roles_usuarios_tb
            where nombres like '%$nombre%' and nombres like '%$apellido%'");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

?>
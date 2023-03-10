<?php
    require_once("conexion.php");
    
    class diasLibres{
        static public function numeroDias($nombre,$apellido){
            $stmt= Conexion::conectar()->prepare("select vacaciones  from control_usuarios.vacaciones_usuarios_tb 
            where nombres like '%$nombre%' and nombres like '%$apellido%'");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

?>
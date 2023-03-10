<?php
    require_once("conexion.php");
    
    class compruebaRol{
        static public function listarUsuarios($nombre,$apellido){
            $stmt= Conexion::conectar()->prepare("select DISTINCT(1) from control_usuarios.vacaciones_usuarios_tb
            where jefe like '%$nombre%' and jefe like '%$apellido%'");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

?>
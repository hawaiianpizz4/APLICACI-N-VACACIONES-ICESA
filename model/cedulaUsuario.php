<?php
    require_once("conexion.php");
    
    class cedulaUsuario{
        static public function cedulaUsuarioQuery($nombre,$apellido){
            $stmt= Conexion::conectar()->prepare("select empleado  from control_usuarios.vacaciones_usuarios_tb 
            where nombres like '%$nombre%' and nombres like '%$apellido%'");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

?>
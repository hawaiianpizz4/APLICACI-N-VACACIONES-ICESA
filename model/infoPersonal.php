<?php
    require_once("conexion.php");
    
    class infoPersonal{
        static public function infoPersonaluser($cedula){
            $stmt= Conexion::conectar()->prepare("select * from control_usuarios.vacaciones_usuarios_tb where empleado = '$cedula'");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

?>
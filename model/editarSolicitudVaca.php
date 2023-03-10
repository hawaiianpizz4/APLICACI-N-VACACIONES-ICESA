<?php
    require_once("conexion.php");
    class editarVacaciones{
        static public function editarVacacion($diasSolicita,$desde,$hasta,$cedula){
            $stmt= Conexion::conectar()->prepare("update control_usuarios.solicitudes_activas_tb 
            set  diasSolicita='$diasSolicita' ,fechaDesde='$desde' ,fechaHasta= '$hasta'
            where cedula = '$cedula'; ");          
            if($stmt->execute()){
                $valor = 'exito';
            }else{
                $valor = 'error';
            }
            return $valor;
        }
    }
?>
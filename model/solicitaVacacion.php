<?php
    require_once("conexion.php");
    class solicitaVacacion{
        static public function solicitaVacaciones($user,$dias,$diasSolicita,$observacion,$desde,$hasta,$cedula){
            $stmt= Conexion::conectar()->prepare("insert into control_usuarios.solicitudes_activas_tb values('$user','$dias','$diasSolicita',0,'$observacion','$desde','$hasta',now(),'$cedula','0')");          
            if($stmt->execute()){
                $valor = 'exito';
            }else{
                $valor = 'error';
            }
            return $valor;
        }
    }
?>
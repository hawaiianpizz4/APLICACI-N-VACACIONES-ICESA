<?php
class Conexion{
    static public function conectar(){
        $link= new PDO("mysql:host=210.17.1.36:3317;dbaname=control_usuarios","Carga36","AbmTeq20");
        $link->exec("set names utf8mb4");
        return $link;
    }
}
?>
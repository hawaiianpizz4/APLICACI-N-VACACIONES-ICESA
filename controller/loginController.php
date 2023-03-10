<?php
require_once('../model/compruebaRol.php');
require_once('../model/documentosRRHH.php');

$user = $_POST["user"];
$password = $_POST["pass"];
$data = array("user" => "$user", "password" => "$password");
$url = "http://200.7.249.21:90/Ldap/controllers/authenticated";
$content = json_encode($data);
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt(
    $curl,
    CURLOPT_HTTPHEADER,
    array("Content-type: application/json")
);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

if ($json_response = curl_exec($curl)) {
    $statusApi = json_decode($json_response);
    if ($statusApi->success == true) {
        session_start();
        $rol = compruebaRol::listarUsuarios($statusApi->user->firstname, $statusApi->user->lastname);
        $rrhh = documentosRRHH::RRHH($statusApi->user->firstname,$statusApi->user->lastname);
        if(count($rrhh) > 0){
            $_SESSION["rrhh"]=1;
        }else{
            $_SESSION["rrhh"]=0;
        }
        $_SESSION["nombre"] = $statusApi->user->firstname;
        $_SESSION["apellido"]=$statusApi->user->lastname;
        if($rol[0][1] == null){
            $_SESSION["rol"] = 0;
        }else{
            $_SESSION["rol"] = 1;
        }
        // var_dump($_SESSION["rol"]);
        header('Location: ../index');
    } else {
        header('Location: ../login' . "?message=error");
    }
} else {
    header('Location: ../login' . "?message=errorConexion");
}
curl_close($curl);

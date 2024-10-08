<?php 	 
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
session_start(); 
    include_once("../../personal/confSAOS.php");
    include_once("../../personal/componentes/cPerson.php");
    include_once("json.php");
    

	$obj_person = new cPerson($nomosConfig_absolute_path, $nomosConfig_db_user_nomina ,$nomosConfig_db_passwd_nomina ,$nomosConfig_db, $nomosConfig_db_driver, $nomosConfig_db_debug  );
    $json           = new json();
    $cedula_fun =  $_REQUEST['f_cedula'];

    $resultado =  $obj_person->funcionario($n_filas, $cedula_fun);

    if (count($resultado ) > 0 ){
        $datos[0]['email']   = $resultado[0]['EMAIL'];
        $datos[0]['fecha_i'] = $resultado[0]['FECHA_INGRESO'];
        $datos[0]['fecha_n'] = $resultado[0]['FECHA_NAC'];
        $datos[0]['encontrado'] = 1;
    } else {
        $datos[0]['encontrado'] = 0;
    }

    echo $json->jsonEncode($datos);
?>
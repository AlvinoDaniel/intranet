<?php 	 
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
session_start(); 
    include_once("../seguridad/segsistemas.php");
    include_once("../../personal/confSAOS.php");	 	
    include_once("../../personal/componentes/cAcadem.php");
    include_once("json.php");
    $objGenerico = new cAcadem();
	$cedula  = $ConfigCedula;
	$renglon1   = $_GET['uno'];
	$renglon2   = $_GET['dos'];
	$renglon    = str_pad(( $renglon2 - 138987 ), 3 , '000', STR_PAD_LEFT);   


	// if ($renglon1 != md5( $renglon )){
	// 	return;
	// }

    $datos_fun['cedula']=$cedula;
    $datos_fun['renglon']=$renglon;
    $resultado = $objGenerico->datosEditar($datos_fun);
    $json = new json();

    echo $json->jsonEncode($resultado);
?>
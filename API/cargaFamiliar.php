<?php 	 
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
session_start(); 
    include_once("../seguridad/segsistemas.php");
    include_once("../../personal/confSAOS.php");	 	
    include_once("../../personal/componentes/cCargafamiliar.php");
    include_once("json.php");
    
    $objGenerico    = new cCargafamiliar();
    $json           = new json();
    $cedula_fun = $ConfigCedula;
	$n_filas1 = 0;
	$tipoini  = '5' ;
	$tipofin  = '5' ;
	$carga = $objGenerico->vista($n_filas1,$cedula_fun);
    $dataFamilia = $objGenerico->datosEditar($cedula_fun,$carga[0]['CODIGO']);

    // for($i = 0; $i < count($carga) ; ++$i){
    //     $dataFamilia = $objGenerico->datosEditar($cedula_fun,'2926485');
    //     $carga[$i]['DATA'] = $dataFamilia;
    // }

    echo $dataFamilia;
?>
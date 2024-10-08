<?php 	 
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
session_start(); 
    include_once("../seguridad/segsistemas.php");
    include_once("../../personal/confSAOS.php");
    $imagen_modulo = "personal.png"; 	 	
    include_once("../../personal/componentes/cPerson.php");
    include_once("../../personal/componentes/cPais.php");
    include_once("../../personal/componentes/cEstado.php");
    include_once("../../personal/componentes/cCiudad.php");
    include_once("../../personal/componentes/cAcadem.php");
    include_once("../../personal/componentes/cRac.php");
    include_once("json.php");
    
    $objGenerico    = new cPerson();
    $objGenerico1   = new cPais();
    $objGenerico2    = new cEstado();
    $objGenerico3    = new cCiudad();
    $objGenerico4    = new cAcadem();
	$objGenerico5   = new cRac();
    $json           = new json();
    $cedula_fun = $ConfigCedula;
	$n_filas1 = 0;
	$tipoini  = '5' ;
	$tipofin  = '5' ;
	$resultadoCarga = $objGenerico4->vista($n_filas1,$cedula_fun,$tipoini,$tipofin);
	$resultadoLaboral = $objGenerico5->todoRacFuncionario($n_filas1,$cedula_fun);

    //tipo personal
	$generico[1] = 'DOCENTE';
	$generico[2] = 'ADMINISTRATIVO';
	$generico[3] = 'OBRERO';
	
	// condicion laboral
	
	$condicion[0] = 'NO APLICABLE';
	$condicion[1] = 'ORDINARIO O FIJO';
	$condicion[2] = 'CONTRATADO';
	$condicion[3] = 'INTERINO O SUPLENTE';
	$condicion[4] = 'JUBILADO';
	$condicion[5] = 'PENS. INCAPACIDAD';
	$condicion[6] = 'PENS. SOBREVIVIENTE';
	$condicion[7] = 'BECARIO';
	$condicion[8] = 'SABATICO O LICENCIA';
	$condicion[9] = 'SUPERNUMERARIO';

    
    $datos    = $objGenerico->getFuncionario($ConfigCedula );
    $datos[0]['CEDULA']     = $_SESSION['sess_intra_usuario'];
    $datos[0]['NOMBRE']     = $_SESSION['sess_intra_nombre'];
    $datos[0]['APELLIDO']   = $_SESSION['sess_intra_apellido']   ;
    $datos[0]['NUCLEO']     = $_SESSION['sess_intra_nucleo']     ;
    $datos[0]['GENERICO']   = $generico[ $_SESSION['sess_intra_generico'] ]   ;
    $datos[0]['CONDICION']  = $condicion[ $_SESSION['sess_intra_condicion'] ]  ;
    $datos[0]['EMAIL']      = $_SESSION['sess_intra_email']      ;
    $datos[1] = $resultadoCarga;
    $datos[2] = $resultadoLaboral;

    echo $json->jsonEncode($datos);
?>
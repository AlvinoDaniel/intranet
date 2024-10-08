<?php 
    include_once("../seguridad.php");
    include_once("../seguridad/proceso/confSAOS.php"); 
    include_once('../personal/componentes/cEdoCuenta.php');
    include_once('../personal/componentes/cPerson.php');  
    include_once('../personal/componentes/cNomina.php');
    $objgenerico = new cEdoCuenta();
    $objFuncionario = new cPerson();    
    
    
    $cedula_fun = $ConfigCedula;
    $fecha_nom  = $_POST['fecha'];
    $fecha_reporte = $fecha_nom ;
    $n_filas_fun = 0;
    $datos_fun = $objFuncionario->getFuncionario( $n_filas_person,$cedula_fun);

    if (!isset($fecha_nom)){
        $fecha_nom  ="TO_DATE('01/01/1970','DD/MM/YY')";
    }else{
        $fecha_nom  ="TO_DATE('".$fecha_nom."','DD/MM/YY')";
        
    }
    $n_filas_fecha = 0;
    $fechasEdoCuenta = $objgenerico->fechas_nomina( $n_filas_fecha);

//  Información de los datos de cabecera del Estado de Cuenta
     $n_filas_person = 0;
     $datos_cabecera = $objgenerico->cabecera( $n_filas_person,$cedula_fun,$fecha_nom);
     $cedula         = $datos_cabecera[0]['CEDULA'];
     $nombre         = $datos_cabecera[0]['NOMBRE'];
     $apellido       = $datos_cabecera[0]['APELLIDO'];
     $nucleo         = $datos_cabecera[0]['NUCLEO'];
     $tipo           = $datos_cabecera[0]['GENERICO'];
     $cond           = $datos_cabecera[0]['CONDICION'];
     $sueldo         = $datos_cabecera[0]['SUELDO'];
     $cargo          = $datos_cabecera[0]['CARGO'];
     $unidad         = $datos_cabecera[0]['UNIDAD_EJECUTORA'];
     $fecha          = $datos_cabecera[0]['FECHA_INGRESO'];
     $banco          = $datos_cabecera[0]['FORMA_PAGO'];
     $numero_cuenta  = $datos_cabecera[0]['NUMERO_CUENTA']; 
     $codigo         = $datos_cabecera[0]['CODIGO'];
     $tipoc           = $datos_cabecera[0]['TIPO_CARGO'];
     $desglose       = $datos_cabecera[0]['DESGLOSE_CARGO'];
     $secuencia      = $datos_cabecera[0]['SEC_CARGO'];  


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
//  Información de detalle de los conceptos del estado de cuenta
    $n_filas = 0;
    $datos = $objgenerico->vista( $n_filas,$cedula_fun,$fecha_nom);
//VARIABLES NECESARIAS PARA LA CONFIGURACIÒN  MODIFICAR Y COLOCAR LASPAGINAS  RESPECTIVAS
    
        /*  SUMA DE ASIGNACIONES */
    $objsueldo = new cNomina();
    $datossueldo = $objsueldo->asignaciones($cedula_fun,$fecha_nom);
    $fijo = $datossueldo[0]['MONTO'];
    $fijo2= $datossueldo[0]['MONTO2'];
    
    $objdeducion = new cNomina();
    $datosdeducion = $objdeducion->deduciones($cedula_fun,$fecha_nom);
    $deducion = $datosdeducion[0]['MONTO'];
    $deducion2 = $datosdeducion[0]['MONTO2'];
?>
<script type="text/javascript">
    function printDiv(nombreDiv) {
     var contenido= document.getElementById(nombreDiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
}
</script>
<!-- start main content section -->
<div x-data="invoicePreview">
    <div class="mb-6 flex flex-wrap items-center justify-center gap-4 lg:justify-end">
        
        <button type="button" class="btn btn-primary gap-2" onclick="printDiv('areaImprimir')">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                <path
                    d="M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C22 7.75736 22 9.17157 22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827"
                    stroke="currentColor"
                    stroke-width="1.5"
                />
                <path opacity="0.5" d="M9 10H6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                <path d="M19 14L5 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                <path
                    d="M18 14V16C18 18.8284 18 20.2426 17.1213 21.1213C16.2426 22 14.8284 22 12 22C9.17157 22 7.75736 22 6.87868 21.1213C6 20.2426 6 18.8284 6 16V14"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
                />
                <path
                    opacity="0.5"
                    d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2427 2 14.8284 2 12 2C9.17158 2 7.75737 2 6.87869 2.87868C6.23739 3.51998 6.06414 4.44655 6.01733 6"
                    stroke="currentColor"
                    stroke-width="1.5"
                />
                <circle opacity="0.5" cx="17" cy="10" r="1" fill="currentColor" />
                <path opacity="0.5" d="M15 16.5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                <path opacity="0.5" d="M13 19H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            </svg>
            Imprimir
        </button>

        <button type="button" class="btn btn-success gap-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                <path
                    opacity="0.5"
                    d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
                ></path>
                <path
                    d="M12 2L12 15M12 15L9 11.5M12 15L15 11.5"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                ></path>
            </svg>
            Descargar
        </button>

    </div>
    <div class="panel" id="areaImprimir">
        <div class="flex flex-wrap justify-between gap-4 px-4">
            <div class="text-2xl font-semibold uppercase">Nómina Regular</div>
            <div class="shrink-0">
                <form action="./index.php?item=nominasRegulares" method="POST">
                      <select name="fecha" size="1" class="titulosmedianosAzulesSubRayado" id="fecha" onChange="this.form.submit()">
                        <option value="">Seleccione la fecha</option>
                        <?php  for($i=0;  $i < $n_filas_fecha; $i++ ){?>
                        <option value="<?php echo  $fechasEdoCuenta[$i]['FECHA']; ?>" <?php if (!(strcmp($fechasEdoCuenta[$i]['FECHA'], $fecha_reporte))) {echo "SELECTED";} ?>><?php echo  $fechasEdoCuenta[$i]['FECHA'].'  '.$fechasEdoCuenta[$i]['MES']; ?></option>
                        <?php }?>
                      </select>
                    </form>
            </div>
        </div>
        <hr class="my-6 border-[#e0e6ed] dark:border-[#1b2e4b]" />
        <!-- <div class="flex flex-col flex-wrap justify-between gap-6 lg:flex-row"> -->
            
            <div class="grid-cols-1 grid gap-6 sm:grid-cols-2" style="font-size: 12px">
                <div >
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Cédula :</div>
                        <div><?php echo  $cedula;?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Apellidos :</div>
                        <div><?php echo  htmlentities($apellido);?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Nombres :</div>
                        <div><?php echo  $nombre;?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Personal :</div>
                        <div><?php echo  $generico[$tipo];?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Cond. Laboral :</div>
                        <div><?php echo  $condicion[$cond];?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Núcleo :</div>
                        <div><?php echo  $nucleo;?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Código Cargo :</div>
                        <div><?php if ($cond != '9') { echo $codigo.'-'.$unidad.'-'.$tipoc.'-'.$secuencia.'-'.$desglose;       }  ?></div>
                    </div>
                </div>
                <div >
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Cargo :</div>
                        <div class="whitespace-nowrap"><?php echo  $cargo;?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Unidad Ejecutora :</div>
                        <div><?php echo  $unidad;?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Fecha Ingreso :</div>
                        <div><?php echo  $fecha;?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Banco :</div>
                        <div><?php echo  $banco;?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Cuenta Número :</div>
                        <div><?php echo  $numero_cuenta;?></div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <div class="table-responsive">
            <table style="font-size: 12px">
                <thead>
                    <tr>
                      <th style="padding: 0;" ><div align="center">C&oacute;d.</div></th>
                      <th style="padding: 0;" >Concepto </th>
                      <th style="padding: 0;" ><div align="center">%</div></th>
                      <th style="padding: 0;" >Asignaciones</th>
                      <th style="padding: 0;" >Deducciones</th>
                      <th style="padding: 0;" >Valor Variable</th>
                      <th style="padding: 0;" >Saldo</th>
                      <th style="padding: 0;" >Fech Venc</th>
                      <th style="padding: 0;" >Tipo Nomina</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($datos)){ reset($datos);}  for($i = 0; $i < $n_filas; $i++){ ?>
                    <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                      <td style="padding: 0;" ><?php echo  $datos[$i]['CODIGO'];?></td>
                      <td style="padding: 0;" align="left" ><?php echo  $datos[$i]['DESCRIPCION'];?></td>
                      <td style="padding: 0;" align="right" valign="top" ><?php if ($datos[$i]['CUOTA'] < 100 and $datos[$i]['CUOTA'] <> 0){ echo  $datos[$i]['CUOTA'];}?></td>
                      <td style="padding: 0;" align="right" valign="top" ><?php if ($datos[$i]['CODIGO']<='500'){ 
                                                                    echo  number_format(str_replace( ',', '.',$datos[$i]['VALOR_FIJO']),2,',','.');
                                                     }?></td>
                      <td style="padding: 0;" align="right" valign="top" ><?php if ($datos[$i]['CODIGO']>='500'){ 
                                                                    echo   number_format(str_replace( ',', '.',$datos[$i]['VALOR_FIJO']),2,',','.'); 
                                                                    //$tot_deduce=$tot_deduce+$datos[$i]['VALOR_FIJO']+$datos[$i]['VALOR_VARIABLE'];
                                                                    }?></td>
                      <td style="padding: 0;" align="right" valign="top" ><?php if ($datos[$i]['VALOR_VARIABLE'] <> 0){ echo   number_format(str_replace( ',', '.',$datos[$i]['VALOR_VARIABLE']),2,',','.'); }?></td>
                      <td style="padding: 0;" align="right" valign="top" ><?php if ($datos[$i]['SALDO'] <> 0){echo   number_format(str_replace( ',', '.',$datos[$i]['SALDO']),2,',','.'); }?></td>
                      <td style="padding: 0;" align="right" valign="top" ><?php echo  $datos[$i]['FECHA_VENCIMIENTO'];?></td>
                      <td style="padding: 0;" align="right" valign="top" ><?php echo  $datos[$i]['SIGLAS'];?>&nbsp;</td>
                    </tr>
                        <?php } ?>

                    <tr align="right" valign="top">
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                    </tr>
                    <tr align="right" valign="top">
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">Totales::::::</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;"><?php echo  number_format(str_replace( ',', '.',$fijo2),2,',','.') ;?></td>
                      <td style="padding: 0;"><?php echo  number_format(str_replace( ',', '.',$deducion2),2,',','.') ;?></td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                    </tr>
                    <tr align="right" valign="top">
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">&nbsp;</td>
                      <td style="padding: 0;">NETO A PAGAR:</td>
                      <td colspan="9" style="padding: 0;"><?php   $super_total =  str_replace( ',', '.',$fijo2)  - str_replace( ',', '.',$deducion2);echo  number_format(str_replace( ',', '.',$super_total ),2,',','.') ; ?></td>
                    </tr>
                    <tr align="right" valign="top">
                      <td colspan="9" align="left" style="padding: 0;">Conceptos Encontrados: <?php echo  $n_filas;?> </td>
                    </tr>
                    <tr align="right" valign="top">
                      <td colspan="9" style="padding: 0;"><input name="funcionario" type="hidden" id="funcionario" value="<?php echo $funcionario;?>">
                        <input name="pagina_anterior" type="hidden" id="pagina_anterior" value="<?php echo $pag_actual; ?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- <div class="mt-6 grid grid-cols-1 px-4 sm:grid-cols-2">
            <div></div>
            <div class="space-y-2 ltr:text-right rtl:text-left">
                <div class="flex items-center">
                    <div class="flex-1">Subtotal</div>
                    <div class="w-[37%]">$3255</div>
                </div>
                <div class="flex items-center">
                    <div class="flex-1">Tax</div>
                    <div class="w-[37%]">$700</div>
                </div>
                <div class="flex items-center">
                    <div class="flex-1">Shipping Rate</div>
                    <div class="w-[37%]">$0</div>
                </div>
                <div class="flex items-center">
                    <div class="flex-1">Discount</div>
                    <div class="w-[37%]">$10</div>
                </div>
                <div class="flex items-center text-lg font-semibold">
                    <div class="flex-1">Grand Total</div>
                    <div class="w-[37%]">$3945</div>
                </div>
            </div>
        </div> -->
    </div>
</div>
<!-- end main content section -->
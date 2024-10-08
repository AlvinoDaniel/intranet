<?php 
    include_once("../seguridad.php");
    include_once("../seguridad/proceso/confSAOS.php"); 
    include_once('../personal/componentes/cFP.php');

    $objGenerico1 = new cFP();
    //
    $cedula_fun = $ConfigCedula;
    $resultadoCarga = $objGenerico1->vista($cedula_fun);
    $n_filas1 = count($resultadoCarga);   
?>

<script type="text/javascript">
    function printDiv(nombreDiv) {
     var contenido= document.getElementById(nombreDiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//
//
var xidx = 0;
var cOffset = 23;
function win2(uno,dos){
  //
 
  Window.keepMultiModalWindow=false
  var win = new Window("ventana_"+xidx,{ className: "mac_os_x_dialog", title: "Información Detalla de los Datos Académicos del Funcionario", width:750, height:500, resizable: true,   url: "v_datos_fp_020.php?uno="+uno+"&dos="+dos, showEffectOptions: {duration:1}}); 
  //
  win.showCenter();
  win.setConstraint(true, {left:0, right:0, top: 30, bottom:10})
  win.toFront();
  win.setDestroyOnClose(); 
  focus("ventana_"+xidx)
  xidx++;
  //
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

    </div>
    <div class="panel" id="areaImprimir">
        <div class="flex flex-wrap justify-between gap-4 px-4">
            <div class="text-2xl font-semibold uppercase">FP-020</div>
        </div>
        <hr class="my-6 border-[#e0e6ed] dark:border-[#1b2e4b]" />
        <!-- <div class="flex flex-col flex-wrap justify-between gap-6 lg:flex-row"> -->
            
            <div class="grid-cols-1 grid gap-6 lg:grid-cols-2" style="font-size: 12px">
                <div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Cédula :</div>
                        <div><?php echo $_SESSION['sess_intra_usuario'];?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Apellidos :</div>
                        <div><?php echo $_SESSION['sess_intra_apellido'];?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Nombres :</div>
                        <div><?php echo $_SESSION['sess_intra_nombre'];?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Personal :</div>
                        <div><?php echo $generico[$_SESSION['sess_intra_generico']];?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Cond. Laboral :</div>
                        <div><?php echo $condicion[$_SESSION['sess_intra_condicion']];?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Núcleo :</div>
                        <div><?php echo $_SESSION['sess_intra_nucleo'];?></div>
                    </div>
                    <div class="mb-2 flex w-full items-center justify-between">
                        <div class="text-white-dark">Código Cargo :</div>
                        <div><?php echo $_SESSION['sess_intra_email'];?></div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <div class="table-responsive">
            <table style="font-size: 12px">
                <thead>
                    <tr>
                      <th  ><div align="center">#</div></th>
                      <th  >Descripci&oacute;n </th>
                      <th  ><div align="center">Fecha Vigencia</div></th>
                      <!-- <th  >Visualizar</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($resultadoCarga)){ reset($resultadoCarga);}  for($i = 0; $i < $n_filas1; $i++){ ?>
                    <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                      <td  ><?php echo $resultadoCarga[$i]['CODIGO']; ?></td>
                      <td  ><?php echo  $resultadoCarga[$i]['DESCRIPCION']; ?></td>
                      <td  ><?php echo $resultadoCarga[$i]['FP_FECHA_VIGENCIA'] ; ?></td>
                      <!-- <td  ><a href="#" onClick="win2('<?php echo md5($resultadoCarga[$i]['CODIGO']) ?>','<?php echo $resultadoCarga[$i]['CODIGO'] + 138987 ?>')" onMouseOver="MM_swapImage('Image9','','../imagenes/mostrar_2.png',1)" onMouseOut="MM_swapImgRestore()"><img src="../imagenes/visualizar.png" alt="Visualizar Información..." name="Image9" width="16" height="16" border="0" class="titulospequenosAzules"></a></td> -->
                    </tr>
                        <?php } ?>

                    <tr align="right" valign="top">
                      <td style="padding: 0;">&nbsp;</td>
                      <td >::Registros Encontrados <?php echo  $n_filas1;?> </td>
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
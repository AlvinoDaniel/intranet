<?php  
echo $nomosConfig_absolute_path;
    //include("cabecera.php");
    //include_once("segsistemas.php");
    include_once("../confSeg.php");
    include_once("../javascript/Sajax.php");
    //
    include_once("../personal/componentes/cPerson.php");
    //informacion de los nucleo
    $obj_person = new cPerson($nomosConfig_absolute_path, $nomosConfig_db_user_nomina ,$nomosConfig_db_passwd_nomina ,$nomosConfig_db, $nomosConfig_db_driver, $nomosConfig_db_debug  );
    //  __CLASS_
    $mensaje_envio = '';
    
    
    //
    //
    function fx_muestra_informacion($cedula){
        global $obj_person;
        //
        $resultado =  $obj_person->funcionario($n_filas, $cedula);
        //
        $email      = '0';
        $fecha_i    = '0';
        $fecha_n    = '0';
        $encontrado = '0';
        //
        if (count($resultado ) > 0 ){
                $email   = $resultado[0]['EMAIL'];
                $fecha_i = $resultado[0]['FECHA_INGRESO'];
                $fecha_n = $resultado[0]['FECHA_NAC'];
                $encontrado = '1';
        }
        //
        $htmlbuffer = '';
        //$htmlbuffer  = '<input name="f_o_fn" type="hidden" id="f_o_fn" value="'.$fecha_n.'" />';
        $htmlbuffer = $htmlbuffer .'<input name="f_o_encontrado" type="hidden" id="f_o_encontrado" value="'.$encontrado.'" />';
        //$htmlbuffer = $htmlbuffer .'<input name="f_o_fi" type="hidden" id="f_o_fi" value="'.$fecha_i.'" />';
        $htmlbuffer = $htmlbuffer .'<input name="f_o_correo"  type="hidden" id="f_o_correo" value="'.$email.'" />';
        //
        return  $htmlbuffer;
        //
    }

    sajax_init ();
    sajax_export("fx_muestra_informacion");
    sajax_handle_client_request();
    //$cedula=$_GET['cedula'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<script src="https://smtpjs.com/v3/smtp.js"></script>
<script type="text/javascript">

<?php  sajax_show_javascript(); ?>

function show_data (c) {
    document.getElementById("id_muestra_data").innerHTML = c; 
    document.getElementById("f_correo").value =  document.getElementById("f_o_correo").value
    if (document.getElementById("f_o_encontrado").value   == '0'){
            alert("C�dula No valida");
            
    }
}

function  buscarDatos() {   
    var ls_codigo  = document.form1.f_cedula.value ;
    x_fx_muestra_informacion(ls_codigo, show_data);
    console.log(ls_codigo)
}

function sendEmail(mensaje, correo) {
      Email.send({
        Host: "smtp.elasticemail.com",
        Port: "2525",
        Username: "intranet@udo.edu.ve",
        Password: "AC6FA467039D103B1D9C187F1F879951260D",
        To: correo,
        From: "intranet@udo.edu.ve",
        Subject: "Recuperacion de clave intranet",
        Body: "su clave de intranet es: "+mensaje,
      })
        .then(function (message) {
            console.log(message)
            console.log(correo+' '+mensaje)
          alert("Correo enviado, verifique su bandeja de entrada o la de correos no deseados (SPAM)")
        });
    }

</script>
<?php 
if(isset($_REQUEST['f_o_encontrado'])) {
        if($_REQUEST['f_o_encontrado'] == '1') { 
                    $correo = $_REQUEST['f_o_correo'];
                    $cedula_consulta =  $_REQUEST['f_cedula'];
                    $datos_retorno = $obj_person->getFuncionario($cedula_consulta );
                    $clave = $datos_retorno[0]["CLAVE"];

                    echo "<script>";
                    echo "sendEmail(".$clave.",'".$correo."')";
                    // echo "sendEmail('para prueba','ptata2292@gmail.com')";
                    echo "</script>";
                    
            }
        }
 ?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>UDO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" type="image/x-icon" href="favicon.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" media="screen" href="assets/css/perfect-scrollbar.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css" />
        <link defer rel="stylesheet" type="text/css" media="screen" href="assets/css/animate.css" />
        <!-- <script src="assets/js/perfect-scrollbar.min.js"></script> -->
        <!-- <script defer src="assets/js/popper.min.js"></script> -->
        <!-- <script defer src="assets/js/tippy-bundle.umd.min.js"></script> -->
        <!-- <script defer src="assets/js/sweetalert.min.js"></script> -->
    </head>

    <body   >
        <div class="fixed bottom-6 right-6 z-50" x-data="scrollToTop">
            <template x-if="showTopButton">
                <button type="button" class="btn btn-outline-primary animate-pulse rounded-full p-2" @click="goToTop">
                    <svg width="24" height="24" class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            opacity="0.5"
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z"
                            fill="currentColor"
                        />
                        <path
                            d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z"
                            fill="currentColor"
                        />
                    </svg>
                </button>
            </template>
        </div>

        <div class="main-container min-h-screen text-black dark:text-white-dark">
            <!-- start main content section -->
            <div class="flex min-h-screen items-center justify-center bg-[url('../images/map.svg')] bg-cover bg-center dark:bg-[url('../images/map-dark.svg')]">
                <div class="panel m-6 w-full max-w-lg sm:w-[480px]">
                    <h2 class="mb-3 text-2xl font-bold">Recuperar Contraseña</h2>
                    <p class="mb-7">Ingrese los datos solicitados para recuperar su clave</p>
                    <form class="space-y-5" action="" method="post" name="form1" id="form1" onsubmit="YY_checkform('form1','f_cedula','#q','0','Debe ingresar su n&uacute;mero de C&eacute;dula','f_o_correo','#q','0','Usted no posee correo electr&oacute;nico registrado...','f_o_encontrado','1_1','1','Field \'f_o_encontrado\' is not valid.');return document.MM_returnValue">
                        <div :class="errors.length > 0 && 'has-error'">
                            <label for="email">Cedula de Identidad</label>
                            <input id="f_cedula" name="f_cedula" type="text" class="form-input" placeholder="Ingrese su cedula de identidad" x-model="reset.cedula" onblur="buscarDatos()" size="10" maxlength="10"/>
                            <template x-if="errors.length > 0">
                                <p class="text-danger mt-1" x-text="errors[0]"></p>
                            </template>
                        </div>
                        <div>
                            <label for="password">Correo Electrónico</label>
                            <input id="f_correo" name="f_correo" type="email" class="form-input" placeholder="Correo Electrónico registrado" x-model="reset.email" disabled/>
                        </div>
                        <div id="id_muestra_data">
                            <input name="f_o_correo" type="hidden" id="f_o_correo" value="0" />
                          <input name="f_o_encontrado" type="hidden" id="f_o_encontrado" value="0" />
                        </div>
                        <!-- <button name="button" type="submit" class="Estilo8sinlinkColorAzulparaMTTO" id="button" class="btn btn-primary w-full">Recuperar Clave</button>
                        <input name="button" type="submit" class="Estilo8sinlinkColorAzulparaMTTO" id="button" value="Recuperar Clave" /> -->
                        <button type="submit" class="btn btn-primary w-full">Recuperar Clave</button>
                    </form>
                </div>
            </div>
            <!-- end main content section -->
        </div>

        <script src="assets/js/alpine-collaspe.min.js"></script>
        <script src="assets/js/alpine-persist.min.js"></script>
        <script defer src="assets/js/alpine-ui.min.js"></script>
        <script defer src="assets/js/alpine-focus.min.js"></script>
        <script defer src="assets/js/alpine.min.js"></script>

        <!-- <script src="assets/js/custom.js"></script> -->
    </body>
</html>

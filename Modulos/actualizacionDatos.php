<?php


	//   include_once("../javascript/Sajax.php");
	  // include_once($nomosConfig_absolute_path."adodb/adodb.inc.php");
      include_once("../personal/componentes/cPerson.php");
	
	  $cedula= $_SESSION['sess_intra_usuario'];

	
	  $objGenerico = new cPerson();

        $n_filas_fun = 0;
		$resultadoTotalFuncionario =  $objGenerico->getFuncionario($cedula);
		$nombre_fun = $resultadoTotalFuncionario[0]['APELLIDO'].' '.$resultadoTotalFuncionario[0]['NOMBRE'];

        $zona                = $resultadoTotalFuncionario[0]['URB_ZONA'];
		$calle               = $resultadoTotalFuncionario[0]['CALLE_AV'];
		$edificio            = $resultadoTotalFuncionario[0]['EDIF_CASA'];
		$apto                = $resultadoTotalFuncionario[0]['APTO_NUM'];
		$telefono_personal   = $resultadoTotalFuncionario[0]['TELEFONO_HABITACION'];
		$telefono_oficina    = $resultadoTotalFuncionario[0]['TELEFONO_OFICINA'];
		$email               = $resultadoTotalFuncionario[0]['EMAIL'];
		$cuenta              = $resultadoTotalFuncionario[0]['NRO_CUENTA'];
		$tipo                = $resultadoTotalFuncionario[0]['TIPO_CUENTA'];

        $TIPO_CUENTA['A'] = "AHORRO";
        $TIPO_CUENTA['C'] = "CORRIENTE";
?>

<div >
    <form x-data="actualizacion" class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
        <h6 class="mb-5 text-lg font-bold">Actualización de Datos</h6>
        <div class="flex flex-col sm:flex-row">
            <div class="mb-5 w-full sm:w-2/12 ltr:sm:mr-4 rtl:sm:ml-4">
                <img
                    src="assets//images/profile-34.jpeg"
                    alt="image"
                    class="mx-auto h-20 w-20 rounded-full object-cover md:h-32 md:w-32"
                />
            </div>
            <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-2">
                <div>
                    <label for="cedula">Cédula de Identidad</label>
                    <input name="cedula" id="cedula" maxLength="9" disabled type="text" class="form-input" value="<? echo $cedula; ?>" />
                </div>
                <div>
                    <label for="f_nombre">Nombres y Apellidos</label>
                    <input name="f_nombre" id="f_nombre" disabled type="text" class="form-input" value="<? echo $nombre_fun; ?>" />
                </div>
                <div>
                    <label for="zona">Urbanización/Zona</label>
                    <input name="zona" id="zona" maxLength="60" type="text" class="form-input" value="<? echo $zona; ?>"/>
                </div>
                <div>
                    <label for="calle">Calle/Av.</label>
                    <input name="calle" id="calle" maxLength="60" type="text" class="form-input" value="<? echo $calle; ?>"/>
                </div>
                <div>
                    <label for="location">Edificio/Casa</label>
                    <input name="edificio" id="edificio" maxLength="60" type="text" class="form-input" value="<? echo $edificio; ?>"/>
                </div>
                <div>
                    <label for="apto">Apto Nro.</label>
                    <input name="apto" id="apto" maxLength="60" type="text" class="form-input" value="<? echo $apto; ?>"/>
                </div>
                <div>
                    <label for="telefono_personal">Teléfono Personal</label>
                    <input name="telefono_personal" id="telefono_personal" maxLength="30" size="30" type="text" class="form-input" value="<? echo $telefono_personal; ?>"/>
                </div>
                <div>
                    <label for="telefono_oficina">Teléfono de Oficina</label>
                    <input  name="telefono_oficina" id="telefono_oficina" maxLength="30" type="text" class="form-input" value="<? echo $telefono_oficina; ?>"/>
                </div>
                <div>
                    <label for="email">Correo Electrónico</label>
                    <input  name="email" id="email" maxLength="60" type="email" class="form-input" value="<? echo $email; ?>"/>
                </div>
                <div>
                    <label for="tipo">Tipo de Cuenta</label>
                    <input name="tipo" id="tipo" maxLength="60" disabled type="text" class="form-input" value="<? echo $TIPO_CUENTA[$tipo]; ?>"/>
                </div>
                <div>
                    <label for="cuenta">Nro. de Cuenta</label>
                    <input name="cuenta" id="cuenta" maxLength="20" disabled type="text" class="form-input" value="<? echo $cuenta; ?>"/>
                </div>
                <div class="mt-3 sm:col-span-2">
                    <button type="button" class="btn btn-primary"  @click="saveData()">
                        <template x-if="loading">
                            <span class="animate-spin border-2 border-white border-l-transparent rounded-full w-5 h-5 ltr:mr-4 rtl:ml-4 inline-block align-middle"></span>
                        </template>
                        Actualizar
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
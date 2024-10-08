
<!-- start main content section -->
<div>
    <!-- <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Sales</span>
        </li>
    </ul> -->

    <div class="pt-5" x-data="info">
        
        <div class="mb-6 grid gap-6 sm:grid-cols-6 xl:grid-cols-6" >
            <div class="panel h-full pb-0 sm:col-span-6 xl:col-span-6" >
                <h5 class="mb-5 text-lg font-semibold dark:text-white-light">Información Personal</h5>

                <div class="perfect-scrollbar relative mb-4 -mr-3 pr-3">
                    <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-2">
                        <div class="flex flex-col py-1.5 text-base">
                            <div>Cédula de Identidad:</div>
                            <div class="font-bold">
                                <span x-text="$store.app.user?.CEDULA"></span>
                            </div>
                        </div>
                        <div class="flex flex-col py-1.5 text-base">
                            <div class="capitalize">Apellidos:</div>
                            <div class="font-bold">
                            <span x-text="$store.app.user?.APELLIDO"></span>
                            </div>
                        </div>
                        <div class="flex flex-col py-1.5 text-base">
                            <div>Nombres:</div>
                            <div class="font-bold">
                            <span x-text="$store.app.user?.NOMBRE"></span>
                            </div>
                        </div>
                        <div class="flex flex-col py-1.5 text-base">
                            <div>Fecha de Nacimiento:</div>
                            <div class="font-bold">
                            <span x-text="$store.app.user?.FECHA_NAC"></span>
                            </div>
                        </div>
                        <div class="flex flex-col py-1.5 text-base">
                            <div>Lugar de Nacimiento:</div>
                            <div class="font-bold">
                            <span x-text="$store.app.user?.LUGAR_NACIMIENTO"></span>
                            </div>
                        </div>
                        <div class="flex flex-col py-1.5 text-base">
                            <div>Urb./Zona:</div>
                            <div class="font-bold">
                            <span x-text="$store.app.user?.URB_ZONA"></span>
                            </div>
                        </div>
                        <div class="flex flex-col py-1.5 text-base">
                            <div>Calle/Av.:</div>
                            <div class="font-bold">
                            <span x-text="$store.app.user?.CALLE_AV"></span>
                            </div>
                        </div>
                        <div class="flex flex-col py-1.5 text-base">
                            <div>Edificio/Casa:</div>
                            <div class="font-bold">
                            <span x-text="$store.app.user?.EDIF_CASA"></span>
                            </div>
                        </div>
                        <div class="flex flex-col py-1.5 text-base">
                            <div>Apto./Nro.:</div>
                            <div class="font-bold">
                            <span x-text="$store.app.user?.APTO_NUM"></span>
                            </div>
                        </div>
                        <div class="flex flex-col py-1.5 text-base">
                            <div>Teléfono:</div>
                            <div class="font-bold">
                            <span x-text="$store.app.user?.TELEFONO_HABITACION"></span>
                            </div>
                        </div>
                        <div class="flex flex-col py-1.5 text-base">
                            <div>Teléfono de Oficina:</div>
                            <div class="font-bold">
                            <span x-text="$store.app.user?.TELEFONO_OFICINA"></span>
                            </div>
                        </div>
                        <div class="flex flex-col py-1.5 text-base">
                            <div>Correo Electrónico:</div>
                            <div class="font-bold">
                            <span x-text="$store.app.user?.EMAIL"></span>
                            </div>
                        </div>

                        <div class="flex flex-col py-1.5 text-base">
                            <div>Núcleo:</div>
                            <div class="font-bold">
                            <span x-text="$store.app.user?.NUCLEO"></span>
                            </div>
                        </div>
                        <div class="flex flex-col py-1.5 text-base">
                            <div>Tipo Personal:</div>
                            <div class="font-bold">
                            <span x-text="$store.app.user?.GENERICO"></span>
                            </div>
                        </div>
                        <div class="flex flex-col py-1.5 text-base">
                            <div>Condición Laboral:</div>
                            <div class="font-bold">
                            <span x-text="$store.app.user?.CONDICION"></span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            
            </div>
        </div>

        <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-6">
            <div class="panel h-full w-full">
                <div class="mb-5 flex items-center justify-between">
                    <h5 class="text-lg font-semibold dark:text-white-light">Información Académica</h5>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Título</th>
                                <th>Nivle</th>
                                <th>Fecha de Culminación</th>
                                <th  class="flex justify-center items-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-if="lengthAcad">
                                <tr class="group">
                                    <td class="" span="4">
                                        <div class="flex items-center">
                                            <span class="whitespace-normal">No se encontraron registros.</span>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                            <template x-for="academico in dataAcad">
                                <tr class="group">
                                    <td class="">
                                        <div class="flex items-center">
                                            <span class="whitespace-normal" x-text="academico.CODIGO"></span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="flex items-center">
                                            <span class="whitespace-normal" x-text="academico.DESCRIPCION"></span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="flex items-center">
                                            <span class="whitespace-normal" x-text="academico.NIVEL"></span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="flex items-center">
                                            <span class="whitespace-normal" x-text="academico.FECHA"></span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="flex justify-center items-center">
                                        <a href="javascript:;" x-on:click="getDataAcademica(academico.CODIGO)">
                                            <svg 
                                                xmlns="http://www.w3.org/2000/svg" 
                                                class="group-hover:!text-primary"
                                                width="20"
                                                height="20"
                                                viewBox="0 0 24 24"
                                                fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" clip-rule="evenodd" />
                                            <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                                            </svg>

                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-6">
            <div class="panel h-full w-full">
                <div class="mb-5 flex items-center justify-between">
                    <h5 class="text-lg font-semibold dark:text-white-light">Información Laboral</h5>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="w-4">Secuencia</th>
                                <th>Cargo</th>
                                <th>Núcleo</th>
                                <th>Unidad Ejecutora</th>
                                <th>Unidad Asignada</th>
                                <th>Código Cargo</th>
                                <th>Fecha Ingreso</th>
                            </tr>
                        </thead>
                        <tbody>
                        <template x-if="lengthLab">
                            <tr class="group" x-if="lengthLab">
                                    <td class="" span="4">
                                        <div class="flex items-center">
                                            <span class="whitespace-normal">No se encontraron registros.</span>
                                        </div>
                                    </td>
                                </tr>
                        </template>
                            <template x-for="laboral in dataLab">
                                <tr class="group">
                                    <td class="w-4">
                                        <div class="flex items-center">
                                            <span class="whitespace-normal" x-text="laboral.SEC_CLAVE"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                        <span class="whitespace-normal" x-text="laboral.DESCRIPCION"></span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="flex items-center">
                                        <span class="whitespace-normal" x-text="laboral.NUCLEO"></span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="flex items-center">
                                        <span class="whitespace-normal" x-text="laboral.UNIDAD_EJECUTORA"></span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="flex items-center">
                                        <span class="whitespace-normal" x-text="laboral.UNIDAD_ASIGNADO"></span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="flex items-center">
                                        <span class="whitespace-normal" x-text="laboral.CODIGO_CARGO"></span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="flex items-center">
                                            <span class="whitespace-normal" x-text="laboral.FECHA_INGRESO"></span>
                                        </div>
                                    </td>                                    
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- modal -->
        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
            <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
                <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-10/12 my-8">
                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <h5 class="font-bold text-lg">Datos Académicos del funcionario</h5>
                        <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24px"
                            height="24px"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="h-6 w-6"
                        >
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                        </button>
                    </div>
                    <div class="p-5">
                        
                        <div class="perfect-scrollbar relative mb-4 -mr-3 pr-3">
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-3">
                                <div class="flex flex-col py-1.5 text-base">
                                    <div>Renglon:</div>
                                    <div class="font-bold text-sm uppercase">
                                        <span x-text="datosAcademicos?.renglon"></span>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1.5 text-base">
                                    <div class="capitalize">Nivel Académico:</div>
                                    <div class="font-bold text-sm uppercase">
                                    <span x-text="datosAcademicos?.TIPO_NIVEL"></span>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1.5 text-base">
                                    <div>Grado de Estudio:</div>
                                    <div class="font-bold text-sm uppercase">
                                    <span x-text="datosAcademicos?.NIVEL"></span>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1.5 text-base">
                                    <div>Especialidad:</div>
                                    <div class="font-bold text-sm uppercase">
                                    <span x-text="datosAcademicos?.ESPECIALIDAD"></span>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1.5 text-base">
                                    <div>Área:</div>
                                    <div class="font-bold text-sm uppercase">
                                    <span x-text="datosAcademicos?.AREA"></span>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1.5 text-base">
                                    <div>Otra Especialidad:</div>
                                    <div class="font-bold text-sm uppercase">
                                    <span x-text="datosAcademicos?.OTRA_ESPEC !== '' ? datosAcademicos?.OTRA_ESPEC : 'N/A'"></span>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1.5 text-base">
                                    <div>Instituto Universitario:</div>
                                    <div class="font-bold text-sm uppercase">
                                    <span x-text="datosAcademicos?.INSTITUTO"></span>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1.5 text-base">
                                    <div>Otro Instituto:</div>
                                    <div class="font-bold text-sm uppercase">
                                    <span x-text="datosAcademicos?.LUGAR !== '' ? datosAcademicos?.LUGAR : 'N/A'"></span>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1.5 text-base">
                                    <div>Fecha de Inicio:</div>
                                    <div class="font-bold text-sm uppercase">
                                    <span x-text="datosAcademicos?.INICIO"></span>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1.5 text-base">
                                    <div>Fecha de Graduación:</div>
                                    <div class="font-bold text-sm uppercase">
                                    <span x-text="datosAcademicos?.GRADUA"></span>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1.5 text-base">
                                    <div>T&iacute;tulo Obtenido::</div>
                                    <div class="font-bold text-sm uppercase">
                                    <span x-text="datosAcademicos?.TITULO"></span>
                                    </div>
                                </div>
                                <!-- <div class="flex flex-col py-1.5 text-base">
                                    <div>Financiado:</div>
                                    <div class="font-bold text-sm uppercase">
                                    <span x-text="datosAcademicos?.FINANCIADO"></span>
                                    </div>
                                </div>

                                <div class="flex flex-col py-1.5 text-base">
                                    <div>Tipo de Financiamiento:</div>
                                    <div class="font-bold text-sm uppercase">
                                    <span x-text="datosAcademicos?.TIPO_FIN"></span>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1.5 text-base">
                                    <div>Nombre del Financiador:</div>
                                    <div class="font-bold text-sm uppercase">
                                    <span x-text="datosAcademicos?.FINANCIADOR"></span>
                                    </div>
                                </div> -->
                                <div class="flex flex-col py-1.5 text-base">
                                    <div>Estatus:</div>
                                    <div class="font-bold text-sm uppercase">
                                    <span x-text="datosAcademicos?.ESTATUS"></span>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end main content section -->
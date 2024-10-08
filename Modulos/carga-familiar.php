
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


        <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-6">
            <div class="panel h-full w-full">
                <div class="mb-5 flex items-center justify-between">
                    <h5 class="text-lg font-semibold dark:text-white-light">Carga Familiar</h5>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Cédula Identidad</th>
                                <th>Nombres y Apellidos</th>
                                <th>Parentesco</th>
                                <th>Genero</th>
                                <th>Fecha Nacimiento</th>
                                <th  class="flex justify-center items-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-if="Object.values(carga).length === 0">
                                <tr class="group">
                                    <td class="" span="4">
                                        <div class="flex items-center">
                                            <span class="whitespace-normal">No se encontraron registros.</span>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                            <template x-for="row in carga">
                                <tr class="group">
                                    <td class="">
                                        <div class="flex items-center">
                                            <span class="whitespace-normal" x-text="row.CODIGO"></span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="flex items-center">
                                            <span class="whitespace-normal" x-text="row.APELLIDOS + ' ' + row.DESCRIPCION"></span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="flex items-center">
                                            <span class="whitespace-normal" x-text="PARENTESCO[row.PAREN] ?? 'N/A'"></span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="flex items-center">
                                            <span class="whitespace-normal" x-text="ASEXO[row.SEXO] ?? 'N/A'"></span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="flex items-center">
                                            <span class="whitespace-normal" x-text="row.FECHA_NAC"></span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="flex justify-center items-center">
                                            <a href="" class="group">
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

    </div>
</div>

<!-- end main content section -->
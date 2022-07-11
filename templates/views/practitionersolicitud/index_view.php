<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f55] h-screen ">

    <?php require_once MODULES . "mod_header_main.php"; ?>

    <div class="w-full min-h-fit bg-transparent pt-2 flex " style="height: calc(100vh - 110px);">
        <?php require_once MODULES . "mod_sidebar_practitioner.php"; ?>
        <div class="block bg-[#f3f3f3]" style="width: calc(100% - 200px); border-left:8px solid #ffffff">
            <div class="main_panel_registerpp_practitioner w-full overflow-y-auto">
                <div class="py-1 w-full relative px-4" style="max-height: calc(100vh - 90px);">
                    <div class="overflow-x-auto container_register_teacher pb-2">
                        <h2 class="font-bold text-[1.2rem] py-2 px-1">Seleccione la PPP a realizar:</h2>
                        <form action="practitionersolicitud/register" class="w-full h-auto flex flex-wrap min-w-[450px]" method="post">
                            <div class="flex flex-wrap">
                                <?php echo Flasher::flash(); ?>
                                <div class="min-w-[200px] px-2 flex flex-wrap gap-0.5">
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-1 text-[.9rem]">
                                            ESPECIALIDAD
                                        </div>
                                        <select name="select_especilidad_sol" class="px-1 input-border-blue border-slate-500 h-7 text-[.8rem] w-full">
                                            <option value="">ESPECIALIDAD</option>
                                            <option value="1">COMPUTACION INFORMATICA</option>
                                            <option value="2">GASTRONOMIA</option>
                                        </select>
                                    </div>
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-1 text-[.9rem]">
                                            MÓDULO
                                        </div>
                                        <select name="select_module_soli" class="px-1 input-border-blue border-slate-500 h-7 text-[.8rem] w-full">
                                            <option value="">SELECCIONE MÓDULO</option>
                                            <option value="1">REPARACIÓN DE COMPUTADORAS</option>
                                            <option value="2">REDES</option>
                                            <option value="2">OFIMÁTICA</option>
                                        </select>
                                    </div>
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-1 text-[.9rem]">
                                            SECCIÓN
                                        </div>
                                        <select name="select_section_soli" class="px-1 input-border-blue border-slate-500 h-7 text-[.8rem] w-full">
                                            <option value="1">A</option>
                                            <option value="2">B</option>
                                            <option value="2">C</option>
                                        </select>
                                    </div>
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-1 text-[.9rem]">
                                            AÑO
                                        </div>
                                        <select name="select_year_soli" class="px-1 input-border-blue border-slate-500 h-7 text-[.8rem] w-full">
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2020">2019</option>
                                            <option value="2020">2018</option>
                                        </select>
                                    </div>
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-1 text-[.9rem]">
                                            PERIODO
                                        </div>
                                        <select name="select_period_soli" class="px-1 input-border-blue border-slate-500 h-7 text-[.8rem] w-full">
                                            <option value="I">I</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                            <option value="V">V</option>
                                        </select>
                                    </div>
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-1 text-[.9rem]">
                                            EMPRESA
                                        </div>
                                        <select name="select_empresa_soli" class="px-1 input-border-blue border-slate-500 h-7 text-[.8rem] w-full">
                                            <option value="I">CONSULTORA ARROBA EIRL</option>
                                            <option value="II">TERABYTE GRUPO SAC</option>
                                            <option value="II">IBM</option>
                                            <option value="II">MEGA SOFTWARE</option>
                                            <option value="II">DEFOFT SAC</option>
                                        </select>
                                    </div>
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-1 text-[.9rem]">
                                            TIPO
                                        </div>
                                        <select name="select_tipo_soli" class="px-1 input-border-blue border-slate-500 h-7 text-[.8rem] w-full">
                                            <option value="PP">PP</option>
                                        </select>
                                    </div>
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-1 text-[.9rem]">
                                            DOCENTE
                                        </div>
                                        <select name="select_teacher_soli" class="px-1 input-border-blue border-slate-500 h-7 text-[.8rem] w-full">
                                            <option value="1">JOSE DE LA CUBA</option>
                                        </select>
                                    </div>
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-2 text-[.9rem] min-w-[90px]">
                                            FECHA INICIO
                                        </div>
                                        <input type="date" name="date_soli_regis_start" class="px-2 input-border-blue border-slate-500 h-7 text-[.9rem] w-auto" required>
                                    </div>
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-2 text-[.9rem] min-w-[90px]">
                                            FECHA FIN
                                        </div>
                                        <input type="date" name="date_soli_regis_end" class="px-2 input-border-blue border-slate-500 h-7 text-[.9rem] w-auto" required>
                                    </div>
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-1 text-[.9rem]">
                                            TURNO
                                        </div>
                                        <select name="select_turno_soli" class="px-1 input-border-blue border-slate-500 h-7 text-[.8rem] w-full">
                                            <option value="MAÑANA">MAÑANA</option>
                                            <option value="TARDE">TARDE</option>
                                        </select>
                                    </div>
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-2 text-[.9rem] min-w-[90px]">
                                            HORA INICIO
                                        </div>
                                        <input type="time" name="tea_email_regis" class="px-2 input-border-blue border-slate-500 h-7 text-[.9rem] w-auto" required>
                                    </div>
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-2 text-[.9rem] min-w-[90px]">
                                            HORA FIN
                                        </div>
                                        <input type="time" name="tea_email_regis" class="px-2 input-border-blue border-slate-500 h-7 text-[.9rem] w-auto" required>
                                    </div>
                            </div>
                            </div>
                            <div class="py-2 flex items-center w-full justify-start px-2">
                                <button name="button_sendform_registerpp" type="submit" class="bg-blue-700 text-[#efefef] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[10rem]">
                                    <span>Agregar</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <div class="container_results_list block w-full px-5 bottom max-h-screen overflow-auto min-w-[800px] ">
                    <div class="list_title_results w-12/12">
                        <div class="flex bg-[rgba(2,77,131,.95)] w-12/12 text-slate-100 justify-center center text-sm py-0.5 rounded-sm">
                            <label class="w-2/12 text-center px-0.5 py-0.5">MÓDULO</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">AÑO</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">PERIODO</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">EMPRESA</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">FECHA INICIO</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">FECHA FIN</label>
                            <label class="w-1/12 text-center px-0.5 py-0.5">TURNO</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">HORA INICIO</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">HORA FIN</label>
                            <label class="w-1/12 text-center px-0.5 py-0.5">VALIDACIÓN</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once INCLUDES . "inc_footer.php"; ?>


</div>


<?php require_once INCLUDES . "inc_footer_html.php"; ?>
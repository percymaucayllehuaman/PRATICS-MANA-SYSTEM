<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f55] h-screen ">

    <?php require_once MODULES . "mod_header_main.php"; ?>




    <!-- <div class="panel-praticing bg-[#efefef] w-full flex"> -->
    <div class="w-full min-h-fit bg-transparent pt-2 flex " style="height: calc(100vh - 110px);">
        <?php require_once MODULES . "mod_sidebar_teacher.php"; ?>

        <div class="block bg-[#f3f3f3]" style="width: calc(100% - 200px); border-left:8px solid #ffffff">
            <div class="main_panel">
                <div class="main_panel_registervisitas_practitioner w-full overflow-y-auto">
                    <div class="py-1 w-full relative px-4" style="max-height: calc(100vh - 90px);">
                        <div class="overflow-x-auto container_register_teacher pb-2">
                            <h2 class="font-bold text-[1.2rem] py-2 px-1 w-full">Visitas y Supervisión</h2>
                            <div class="w-full flex">
                                <form action="teacherempresa/show_solucitus" method="post" class="w-autp items-center py-2 px-1">
                                    <div class="flex gap-3 flex-wrap">
                                        <div class="flex w-full gap-3 flex-wrap">
                                            <div class="w-auto flex items-center border flex-wrap ">
                                                <label for="" class="w-auto mr-2 px-1 text-[.9rem]">Seleccione Especialidad </label>
                                                <select name="select_especialidad_emp" class="text-[.8rem] h-8 rounded input-border-blue border-slate-500 px-1">
                                                    <option value="">COMPUTACION INFORMATICA</option>
                                                    <option value="">GASTRONOMÍA</option>
                                                </select>
                                            </div>
                                            <div class="w-auto flex items-center border">
                                                <label for="" class="w-auto mr-2 px-1 text-[.9rem]">Módulo </label>
                                                <select name="select_module_emp" class="text-[.8rem] h-8 rounded input-border-blue border-slate-500 px-1">
                                                    <option value="">DISEÑO WEB</option>
                                                    <option value="">OFIMATICA</option>
                                                    <option value="">REDES</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-auto px- py-2 my-2">
                                        <button class="bg-[rgba(10,25,255,.7)] text-[#efefef] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[8rem]">
                                            <span>Mostrar</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto w-12/12">
                    <div class="container_results_list block w-full px-5 bottom max-h-screen overflow-auto min-w-[800px] ">
                        <div class="list_title_results w-12/12">
                            <div class="flex bg-[rgba(2,77,131,.95)] w-12/12 text-slate-100 justify-center center text-sm py-0.5 rounded-sm">
                                <label class="w-2/12 text-center px-0.5 py-0.5">RUC</label>
                                <label class="w-2/12 text-center px-0.5 py-0.5">Empresa (Raz. Social)</label>
                                <label class="w-2/12 text-center px-0.5 py-0.5">Rubro</label>
                                <label class="w-2/12 text-center px-0.5 py-0.5">Dirección</label>
                                <label class="w-2/12 text-center px-0.5 py-0.5">Representante</label>
                                <label class="w-2/12 text-center px-0.5 py-0.5">Telefono</label>
                                <label class="w-1/12 text-center px-0.5 py-0.5">Validar</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once INCLUDES . "inc_footer.php"; ?>


</div>


<?php require_once INCLUDES . "inc_footer_html.php"; ?>
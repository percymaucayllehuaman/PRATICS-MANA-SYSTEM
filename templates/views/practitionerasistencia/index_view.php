<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f55] h-screen ">

    <?php require_once MODULES . "mod_header_main.php"; ?>




    <!-- <div class="panel-praticing bg-[#efefef] w-full flex"> -->
    <div class="w-full min-h-fit bg-transparent pt-2 flex " style="height: calc(100vh - 110px);">
        <?php require_once MODULES . "mod_sidebar_practitioner.php"; ?>

        <div class="main_panel block bg-[#f3f3f3]" style="width: calc(100% - 200px); border-left:8px solid #ffffff">
            <div class="main_panel_registerpp_practitioner w-full overflow-y-auto">
                <div class="py-1 w-full relative px-4" style="max-height: calc(100vh - 90px);">
                    <div class="overflow-x-auto container_register_teacher pb-2">
                        <h2 class="font-bold text-[1.2rem] py-2 px-1 w-full">Asistencia</h2>
                        <div class="flex w-full">
                            <form action="practitionerasistencia" method="post">
                                <div class="line my-1 mr-4 flex items-center">
                                    <input type="hidden" name="<?php echo "input"; ?>" value="hola">
                                    <div class="w-auto mx-1 text-[.9rem] min-w-[90px]">
                                        <button name="button_save_entrada_asistencia" class="bg-[#919191] text-[#fff] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[10rem]">
                                            <span>Registrar Entrada</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <form action="practitionerasistencia/">
                                <div class="line my-1 mr-4 flex items-center">
                                    <input type="hidden" name="id_user" value="<?php echo "input"; ?>">
                                    <input type="hidden" name="id_prac" value="<?php echo "input"; ?>">
                                    <div class="w-auto mx-1 text-[.9rem] min-w-[90px]">
                                        <button name="button_save_entrada_asistencia" class="bg-[#919191] text-[#fff] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[10rem]">
                                            <span>Registrar Salida</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="w-full flex">
                            <form action="practitionerasistencia" method="post" class="w-autp items-center py-2">
                                <div class="w-auto flex items-center border">
                                    <label for="" class="w-auto mr-2 px-1">Activiadad </label>
                                    <input type="text" placeholder="Cableado de la Red" class="min-w-[15rem] text-[.9rem] h-8 rounded input-border-blue border-slate-500 px-1">
                                </div>
                                <div class="w-auto px-1 py-2">
                                    <button class="bg-blue-700 text-[#efefef] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[10rem]">
                                        <span>Guardar</span>
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
                            <label class="w-2/12 text-center px-0.5 py-0.5">Fecha y Hora (ingreso)</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">Validación Entrada</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">Actividad</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">Validación Actividad</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">Fecha Hora (Salida)</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">FECHA FIN</label>
                            <label class="w-1/12 text-center px-0.5 py-0.5">Validación Salida</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">Obserbación</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once INCLUDES . "inc_footer.php"; ?>

</div>


<?php require_once INCLUDES . "inc_footer_html.php"; ?>
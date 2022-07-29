<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f55] h-screen ">

    <?php require_once MODULES . "mod_header_main.php"; ?>




    <!-- <div class="panel-praticing bg-[#efefef] w-full flex"> -->
    <div class="w-full min-h-fit bg-transparent pt-2 flex " style="height: calc(100vh - 110px);">
        <?php require_once MODULES . "mod_sidebar_admin.php"; ?>

        <div class="block bg-[#f3f3f3] overflow-auto" style="width: calc(100% - 200px); border-left:8px solid #ffffff">
            <div class="main_panel_registerespecialiad_module w-full overflow-y-auto" style="max-height: calc(100vh - 90px);">
                <div class=" px-2 py-1 w-full relative">
                    <div class="overflow-x-auto container_register_especialidad pb-2 px-5">
                        <h2 class="font-bold text-[1.2rem] py-2 w-full">Datos Personales </h2>
                        <form action="adminespecialidad/registerespecialidad" class="w-auto h-auto min-w-[250px] pt-3 pb-3 overflow-x-auto" method="post">
                            <?php echo Flasher::flash(); ?>
                            <div class="px-2 w-auto flex flex-wrap items-center gap-1">
                                <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                    <div for="" class="text-[.8rem] min-w-[8rem]">DNI</div>
                                    <input type="text" name="especialidad_name_admin" placeholder="Especialidad" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly>
                                </div>
                                <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                    <div for="" class="text-[.8rem] min-w-[8rem]">Apellido paterno</div>
                                    <input type="text" name="especialidad_description_admin" placeholder="Descripción" class="px-2 border-slate-500 h-6 text-[.8rem]  min-w-[15rem]  text-[#000]" required readonly>
                                </div>
                                <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                    <div for="" class="text-[.8rem] min-w-[8rem]">Apellido Materno</div>
                                    <input type="text" name="especialidad_name_admin" placeholder="Especialidad" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly>
                                </div>
                                <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                    <div for="" class="text-[.8rem] min-w-[8rem]">Nombres</div>
                                    <input type="text" name="especialidad_description_admin" placeholder="Descripción" class="px-2 border-slate-500 h-6 text-[.8rem]  min-w-[15rem]  text-[#000]" required readonly>
                                </div>
                                <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                    <div for="" class="text-[.8rem] min-w-[8rem]">Fecha de Nacimiento</div>
                                    <input type="text" name="especialidad_name_admin" placeholder="Especialidad" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly>
                                </div>
                                <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                    <div for="" class="text-[.8rem] min-w-[8rem]">Genero</div>
                                    <input type="text" name="especialidad_description_admin" placeholder="Descripción" class="px-2 border-slate-500 h-6 text-[.8rem]  min-w-[15rem]  text-[#000]" required readonly>
                                </div>
                                <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                    <div for="" class="text-[.8rem] min-w-[8rem]">Departamento</div>
                                    <input type="text" name="especialidad_name_admin" placeholder="Especialidad" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly>
                                </div>
                                <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                    <div for="" class="text-[.8rem] min-w-[8rem]">Provincia</div>
                                    <input type="text" name="especialidad_name_admin" placeholder="Especialidad" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly>
                                </div>
                                <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                    <div for="" class="text-[.8rem] min-w-[8rem]">Distrito</div>
                                    <input type="text" name="especialidad_description_admin" placeholder="Descripción" class="px-2 border-slate-500 h-6 text-[.8rem]  min-w-[15rem]  text-[#000]" required readonly>
                                </div>
                                <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                    <div for="" class="text-[.8rem] min-w-[8rem]">Correo Electrónico</div>
                                    <input type="text" name="especialidad_name_admin" placeholder="Especialidad" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly>
                                </div>
                                <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                    <div for="" class="text-[.8rem] min-w-[8rem]">Celular</div>
                                    <input type="text" name="especialidad_description_admin" placeholder="Descripción" class="px-2 border-slate-500 h-6 text-[.8rem]  min-w-[15rem]  text-[#000]" required readonly>
                                </div>
                                <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                    <div for="" class="text-[.8rem] min-w-[8rem]">Dirección</div>
                                    <input type="text" name="especialidad_name_admin" placeholder="Especialidad" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly>
                                </div>
                                <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                    <div for="" class="text-[.8rem] min-w-[8rem]">Grado de Instrucción</div>
                                    <input type="text" name="especialidad_description_admin" placeholder="Descripción" class="px-2 border-slate-500 h-6 text-[.8rem]  min-w-[15rem]  text-[#000]" required readonly>
                                </div>
                                <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                    <div for="" class="text-[.8rem] min-w-[8rem]">Estado C</div>
                                    <input type="text" name="especialidad_name_admin" placeholder="Especialidad" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly>
                                </div>
                            </div>
                            <div class="px-2 w-full">
                                <div class="line my-2 mx-1">
                                    <button name="button_sendform_conveniodocument" type="submit" class="bg-blue-700 text-[#efefef] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[10rem]">
                                        <span>Guardar</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once INCLUDES . "inc_footer.php"; ?>


</div>


<?php require_once INCLUDES . "inc_footer_html.php"; ?>
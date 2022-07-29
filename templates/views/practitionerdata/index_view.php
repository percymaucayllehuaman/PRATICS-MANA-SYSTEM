<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f55] h-screen ">

    <?php require_once MODULES . "mod_header_main.php"; ?>




    <!-- <div class="panel-praticing bg-[#efefef] w-full flex"> -->
    <div class="w-full min-h-fit bg-transparent pt-2 flex " style="height: calc(100vh - 110px);">
        <?php require_once MODULES . "mod_sidebar_practitioner.php"; ?>

        <div class="main_panel block bg-[#f3f3f3] overflow-auto" style="width: calc(100% - 200px); border-left:8px solid #ffffff">
            <div class=" px-2 py-1 w-full relative">
                <div class="overflow-x-auto container_register_especialidad pb-2 px-5">
                    <h2 class="font-bold text-[1.2rem] py-2 w-full">Datos Personales </h2>
                    <form action="practitionerdata" class="w-auto h-auto min-w-[250px] pt-3 pb-3 overflow-x-auto" method="post">
                        <?php echo Flasher::flash(); ?>
                        <div class="px-1 w-auto flex flex-wrap items-center gap-1">
                            <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                <div for="" class="text-[.8rem] min-w-[8rem]">DNI</div>
                                <input type="text" name="data_dni_prac" placeholder="DNI" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly value="<?php if($_SESSION['USER-LOGIN']->user_type == 'ESTUDIANTE'){echo $_SESSION['DATA-USER']->DNI; }?>">
                            </div>
                            <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                <div for="" class="text-[.8rem] min-w-[8rem]">Apellido Paterno</div>
                                <input type="text" name="data_lastnamefir_prac" placeholder="Apellido" class="px-2 border-slate-500 h-6 text-[.8rem]  min-w-[15rem]  text-[#000]" required readonly value="<?php if($_SESSION['USER-LOGIN']->user_type == 'ESTUDIANTE'){echo $_SESSION['DATA-USER']->apellido_paterno; }?>">
                            </div>
                            <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                <div for="" class="text-[.8rem] min-w-[8rem]">Apellido Materno</div>
                                <input type="text" name="data_lastnamese_prac" placeholder="Apellido" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly value="<?php if($_SESSION['USER-LOGIN']->user_type == 'ESTUDIANTE'){echo $_SESSION['DATA-USER']->apellido_materno; }?>">
                            </div>
                            <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                <div for="" class="text-[.8rem] min-w-[8rem]">Nombres</div>
                                <input type="text" name="data_name_prac" placeholder="Nombres" class="px-2 border-slate-500 h-6 text-[.8rem]  min-w-[15rem]  text-[#000]" required readonly value="<?php if($_SESSION['USER-LOGIN']->user_type == 'ESTUDIANTE'){echo $_SESSION['DATA-USER']->nombres; }?>">
                            </div>
                            <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                <div for="" class="text-[.8rem] min-w-[8rem]">Fecha de Nacimiento</div>
                                <input type="text" name="data_datebirth_prac" placeholder="Fecha de Nacimiento" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly value="<?php if($_SESSION['USER-LOGIN']->user_type == 'ESTUDIANTE'){echo $_SESSION['DATA-USER']->fecha_nac; }?>">
                            </div>
                            <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                <div for="" class="text-[.8rem] min-w-[8rem]">Género</div>
                                <input type="text" name="data_gender_prac" placeholder="Genero" class="px-2 border-slate-500 h-6 text-[.8rem]  min-w-[15rem]  text-[#000]" required readonly value="<?php if($_SESSION['USER-LOGIN']->user_type == 'ESTUDIANTE'){echo $_SESSION['DATA-USER']->sexo; }?>">
                            </div>
                            <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                <div for="" class="text-[.8rem] min-w-[8rem]">Departamento</div>
                                <input type="text" name="data_departament_prac" placeholder="Región" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly value="<?php if($_SESSION['USER-LOGIN']->user_type == 'ESTUDIANTE'){echo $_SESSION['DATA-USER']->departamento; }?>">
                            </div>
                            <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                <div for="" class="text-[.8rem] min-w-[8rem]">Provincia</div>
                                <input type="text" name="data_province_prac" placeholder="Provincia" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly value="<?php if($_SESSION['USER-LOGIN']->user_type == 'ESTUDIANTE'){echo $_SESSION['DATA-USER']->provincia; }?>">
                            </div>
                            <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                <div for="" class="text-[.8rem] min-w-[8rem]">Distrito</div>
                                <input type="text" name="data_district_prac" placeholder="Distrito" class="px-2 border-slate-500 h-6 text-[.8rem]  min-w-[15rem]  text-[#000]" required readonly value="<?php if($_SESSION['USER-LOGIN']->user_type == 'ESTUDIANTE'){echo $_SESSION['DATA-USER']->distrito; }?>">
                            </div>
                            <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                <div for="" class="text-[.8rem] min-w-[8rem]">Correo Electrónico</div>
                                <input type="email" name="data_email_prac" placeholder="Email" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly value="<?php if($_SESSION['USER-LOGIN']->user_type == 'ESTUDIANTE'){echo $_SESSION['DATA-USER']->correo; }?>">
                            </div>
                            <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                <div for="" class="text-[.8rem] min-w-[8rem]">Celular</div>
                                <input type="text" name="data_telephone_prac" placeholder="Celular" class="px-2 border-slate-500 h-6 text-[.8rem]  min-w-[15rem]  text-[#000]" required readonly value="<?php if($_SESSION['USER-LOGIN']->user_type == 'ESTUDIANTE'){echo $_SESSION['DATA-USER']->celular; }?>">
                            </div>
                            <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                <div for="" class="text-[.8rem] min-w-[8rem]">Dirección</div>
                                <input type="text" name="data_address_prac" placeholder="Dirección" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly value="<?php if($_SESSION['USER-LOGIN']->user_type == 'ESTUDIANTE'){echo $_SESSION['DATA-USER']->celular; }?>">
                            </div>
                            <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                <div for="" class="text-[.8rem] min-w-[8rem]">Grado de Instrucción</div>
                                <input type="text" name="data_gradoins_prac" placeholder="Grado de Instrucción" class="px-2 border-slate-500 h-6 text-[.8rem]  min-w-[15rem]  text-[#000]" required readonly value="<?php if($_SESSION['USER-LOGIN']->user_type == 'ESTUDIANTE'){echo $_SESSION['DATA-USER']->grado_instruccion; }?>">
                            </div>
                            <div class="line my-2 ml-1 flex flex-wrap mr-3">
                                <div for="" class="text-[.8rem] min-w-[8rem]">Estado Civil</div>
                                <input type="text" name="data_estadoc_prac" placeholder="Estado Civil" class="px-2 border-slate-500 h-6 text-[.8rem] min-w-[15rem] text-[#000]" required readonly value="<?php if($_SESSION['USER-LOGIN']->user_type == 'ESTUDIANTE'){echo $_SESSION['DATA-USER']->estado_civil; }?>">
                            </div>
                        </div>
                        <div class="px-2 w-full">
                            <div class="line my-2 mx-1">
                                <button name="button_sendform_data_prac" type="submit" class="bg-blue-700 text-[#efefef] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[10rem]">
                                    <span>Guardar</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require_once INCLUDES . "inc_footer.php"; ?>


</div>


<?php require_once INCLUDES . "inc_footer_html.php"; ?>
<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f55] h-screen ">

    <?php require_once MODULES . "mod_header_main.php"; ?>




    <!-- <div class="panel-praticing bg-[#efefef] w-full flex"> -->
    <div class="w-full min-h-fit bg-transparent pt-2 flex " style="height: calc(100vh - 110px);">
        <?php require_once MODULES . "mod_sidebar_teacher.php"; ?>

        <div class="block bg-[#f3f3f3] overflow-auto" style="width: calc(100% - 200px); border-left:8px solid #ffffff">
            <div class="main_panel">
                <div class="main_panel_registervisitas_practitioner w-full overflow-y-auto">
                    <div class="py-1 w-full relative px-4" style="max-height: calc(100vh - 90px);">
                        <div class="overflow-x-auto container_register_teacher pb-2px-1">
                            
                            <h2 class="font-bold text-[1.2rem] py-2 px-1 w-full"></h2> <!-- title -->
                            <div class="w-full text-[.9rem] text-center" id="results-flash-ajax-asistencia">
                                <?php Flasher::flash(); ?>
                            </div>
                            <div class="w-full flex">
                                <form action="teacherasistencia/show_asistencia" id="form_show_asistencia_teacher" method="post" class="w-autp items-center py-2">
                                    <div class="flex gap-3 flex-wrap">
                                        <div class="flex w-full gap-3 flex-wrap">
                                            <div class="w-auto flex items-center flex-wrap ">
                                                <div class="flex border h-8 items-center">
                                                    <label for="" class="w-auto mr-2 px-1 px-1 text-[.9rem]">Seleccione Especialidad </label>
                                                </div>
                                                <select name="select_especialidad_asis" class="text-[.9rem] h-8 rounded input-border-blue border-slate-500 px-1">
                                                    <?php
                                                    require_once(MODELS.'especialidad_model.php');
                                                    $es = new Especialidad_model();
                                                    foreach ($es->get_all('especialidad')->fetchAll() as $item) {
                                                        echo " <option value='" . $item['id_especialidad'] . "'>" . $item['nombre'] . "</option>";
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                            <div class="w-auto flex items-center border">
                                                <label for="" class="w-auto mr-2 px-1 text-[.9rem]">Módulo </label>
                                                <select name="select_module_asis" class="text-[.9rem] h-8 rounded input-border-blue border-slate-500 px-1">
                                                    <?php
                                                    require_once(MODELS.'modulo_model.php');
                                                    $mod = new Modulo_model();
                                                    foreach ($es->get_all_order_by('modulo','Especialidad_id_especialidad')->fetchAll() as $item) {
                                                        echo " <option value='" . $item['id_modulo'] . "'>" . $item['nombre'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-auto flex items-center border">
                                            <div class="flex border h-8 items-center">
                                                <label for="" class="w-auto mr-2 px-1 px-1 text-[.9rem]">Fecha </label>
                                            </div>
                                            <input name="select_date_asis" type="date" class="text-[.9rem] h-8 rounded input-border-blue border-slate-500 px-1" />
                                        </div>
                                    </div>
                                    <div class="w-auto px- py-2 my-2">
                                        <button name="button_show_asis" id="button_show_asistencia_teacher" class="bg-blue-700 text-[#efefef] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[8rem]">
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
                            <h2 class="font-bold text-[1rem] py-2 px-1 w-full text-[#5b5b5b]">Lista de Asistencia </h2>
                            <div class="flex bg-[rgba(2,77,131,.95)] w-12/12 text-slate-100 justify-center center text-sm py-0.5 rounded-sm">
                                <label class="w-3/12 text-center px-0.5 py-0.5">Estudiante</label>
                                <label class="w-3/12 text-center px-0.5 py-0.5">Actividad Realizada</label>
                                <label class="w-1/12 text-center px-0.5 py-0.5">Ingreso</label>
                                <label class="w-1/12 text-center px-0.5 py-0.5">Salida</label>
                                <label class="w-3/12 text-center px-0.5 py-0.5">Observación</label>
                                <label class="w-1/12 text-center px-0.5 py-0.5">Validación</label>
                            </div>
                        </div>
                        <style>
                            /* The switch - the box around the slider */
                            .switch {
                                position: relative;
                                display: inline-block;
                                width: 2.7rem;
                                /* width: 60px; */
                                height: 1.2rem;
                                /* height: 34px; */
                            }

                            /* Hide default HTML checkbox */
                            .switch input {
                                opacity: 0;
                                width: 0;
                                height: 0;
                            }

                            /* The slider */
                            .slider {
                                position: absolute;
                                cursor: pointer;
                                top: 0;
                                left: 0;
                                right: 0;
                                bottom: 0;
                                background-color: #ccc;
                                -webkit-transition: .4s;
                                transition: .4s;
                            }

                            .slider:before {
                                position: absolute;
                                content: "";
                                height: 10px;
                                width: 10px;
                                left: 4px;
                                bottom: 4.5px;
                                background-color: white;
                                -webkit-transition: .4s;
                                transition: .4s;
                            }

                            input:checked+.slider {
                                background-color: #2196F3;
                            }

                            input:focus+.slider {
                                box-shadow: 0 0 1px #2196F3;
                            }

                            input:checked+.slider:before {
                                -webkit-transform: translateX(26px);
                                -ms-transform: translateX(26px);
                                transform: translateX(26px);
                            }

                            /* Rounded sliders */
                            .slider.round {
                                border-radius: 34px;
                            }

                            .slider.round:before {
                                border-radius: 50%;
                            }
                        </style>
                        <div id="results_list_asistencia_teacher_filter" class="bg-[rgba(2,77,131,.1)] w-12/12 text-slate-800 justify-center center text-sm py-0.5 rounded-sm">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once INCLUDES . "inc_footer.php"; ?>


</div>


<?php require_once INCLUDES . "inc_footer_html.php"; ?>
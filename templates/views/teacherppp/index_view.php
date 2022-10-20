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
                            <div class="w-full flex">
                                <form action="teacherppp/show_ppp" id="form_send_ppp_teacher" method="post" class="w-autp items-center py-2">
                                    <div class="flex gap-3 flex-wrap">
                                        <div class="flex w-full gap-3 flex-wrap">
                                            <div class="w-auto flex items-center flex-wrap ">
                                                <div class="flex border h-8 items-center">
                                                    <label for="" class="w-auto mr-2 px-1 px-1 text-[.9rem]">Seleccione Especialidad </label>
                                                </div>
                                                <select id="select_especialidad_ppp_t" name="select_especialidad_pp" class="text-[.9rem] h-8 rounded input-border-blue border-slate-500 px-1">
                                                    <option value="">-- Seleccionar --</option>
                                                    <?php
                                                    require_once(MODELS . 'especialidad_model.php');
                                                    $es = new Especialidad_model();
                                                    foreach ($es->get_all('especialidad') as $item) {
                                                        echo "<option value='" . $item['id_especialidad'] . "'>" . $item['nombre'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="w-auto flex items-center border">
                                                <label for="" class="w-auto mr-2 px-1 text-[.9rem]">Módulo </label>
                                                <select id="select_modulo_pp_t" name="select_module_pp" class="text-[.9rem] h-8 rounded input-border-blue border-slate-500 px-1">
                                                    <option value="">-- Seleccionar --</option>
                                                    <?php
                                                    // require_once(MODELS.'modulo_model.php');
                                                    // $es = new Modulo_model();
                                                    // foreach ($es->get_all_order_by('modulo', 'Especialidad_id_especialidad') as $item) {
                                                    //     echo "<option value='" . $item['id_modulo'] . "'>" . $item['nombre'] . "</option>";
                                                    // }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-auto flex items-center border">
                                            <div class="flex border h-8 items-center">
                                                <label for="" class="w-auto mr-2 px-1 px-1 text-[.9rem]">Año </label>
                                            </div>
                                            <select name="select_year_visi" class="text-[.9rem] h-8 rounded input-border-blue border-slate-500 px-1">
                                                <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
                                                <option value="<?php echo date('Y') - 1; ?>"><?php echo date('Y') - 1; ?></option>
                                                <option value="<?php echo date('Y') - 2; ?>"><?php echo date('Y') - 2; ?></option>
                                                <option value="<?php echo date('Y') - 3; ?>"><?php echo date('Y') - 3; ?></option>
                                                <option value="<?php echo date('Y') - 4; ?>"><?php echo date('Y') - 4; ?></option>
                                            </select>
                                        </div>
                                        <div class="w-auto flex items-center border">
                                            <div class="flex border h-8 items-center">
                                                <label for="" class="w-auto mr-2 px-1 px-1 text-[.9rem]">Periodo </label>
                                            </div>
                                            <select name="select_period_visi" class="text-[.9rem] h-8 rounded input-border-blue border-slate-500 px-1">
                                                <option value="I">I</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-auto px- py-2 my-2">
                                        <button id="button_send_show_ppp" class="button_send_show_ppp bg-blue-700 text-[#efefef] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[8rem]">
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
                            <h2 class="font-bold text-[1rem] py-2 px-1 w-full text-[#5b5b5b]">PPP Solicitados para Validar</h2>
                            <div class="flex bg-[rgba(2,77,131,.95)] w-12/12 text-slate-100 justify-center center text-sm py-0.5 rounded-sm">
                                <label class="w-3/12 text-center px-0.5 py-0.5">Estudiante</label>
                                <label class="w-3/12 text-center px-0.5 py-0.5">Empresa</label>
                                <label class="w-2/12 text-center px-0.5 py-0.5">Fecha Inicio</label>
                                <label class="w-2/12 text-center px-0.5 py-0.5">Fecha Fin</label>
                                <label class="w-1/12 text-center px-0.5 py-0.5">Turno</label>
                                <label class="w-1/12 text-center px-0.5 py-0.5">
                                    Validado
                                </label>
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
                        <div id="results_list_ppp_teacher_filter" class="bg-[rgba(2,77,131,.1)] w-12/12 text-slate-800 justify-center center text-sm py-0.5 rounded-sm">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once INCLUDES . "inc_footer.php"; ?>

</div>

<?php require_once INCLUDES . "inc_footer_html.php"; ?>
<script>
    $(document).ready(function() {
        // $("#form_filter_empresa_validation_teacher").on("submit", function(event) {
        //     event.preventDefault();
        // });
        //form_filter_empresa_validation_teacher
        $("#select_especialidad_ppp_t").change(function() {
            $.ajax({
                type: "POST",
                url: window.location.href + "/load_modules",
                data: $("#form_send_ppp_teacher").serialize(), //send data of form id=form_send_ppp_teacher
                success: function(response) {
                    var jsonData = JSON.parse(response);
                    // user is logged in successfully in the back-end
                    // let's redirect
                    // if (jsonData.success == "1")
                    if (jsonData.success != null) {

                        // console.log(jsonData.success);
                        let data = jsonData.success;
                        let row = "<option value=''>--seleccionar--</option>";
                        for (const item in data) {
                            row = row + "<option value='" + data[item]['id_modulo'] + "'>" + data[item]['nombre'] + "</option>";
                        }
                        $('#select_modulo_pp_t').html(row);


                    } else if (jsonData.success == []) {
                        alert('0 Resultados');
                    } else {
                        alert('0 Resultados');
                    }
                }
            });

        });



        /* show PPP */
        $("#form_send_ppp_teacher").on("submit", function(event) {
            event.preventDefault();
            // console.log($(this).serialize());
        });
        //form_send_ppp_teacher
        $("#button_send_show_ppp").click(function() {
            $.ajax({
                type: "POST",
                url: window.location.href + "/show_ppp",
                data: $("#form_send_ppp_teacher").serialize(), //send data of form id=form_send_ppp_teacher
                success: function(response) {
                    var jsonData = JSON.parse(response);
                    // user is logged in successfully in the back-end
                    // let's redirect
                    // if (jsonData.success == "1")
                    if (jsonData.success != null) {

                        // console.log(jsonData.success);
                        let data = jsonData.success;
                        let row = '';
                        for (const item in data) {
                            // console.log(data[item]['validacion']);
                            if (data[item]['validacion'] != '0000-00-00 00:00:00') {
                                data[item]['validacion_view'] = "<label class='switch'><input type='checkbox' checked class='switch input_checkbox'><span class='slider round'></span></label>";
                            } else {
                                data[item]['validacion_view'] = "<label class='switch'><input type='checkbox' class='input_checkbox'><span class='slider round'></span></label>";
                            }
                            row = row + "<form class='flex w-12/12 text-slate-800 center text-sm py-0.5 rounded-sm px-1' style='border-bottom: 1px solid rgba(2,77,131,.8)'>" +
                                "<label class='w-3/12 text-left px-0.5 py-0.5'>" + data[item]['apellido_paterno'] + " " + data[item]['apellido_materno'] + " " + data[item]['nombres'] + "</label>" +
                                "<label class='w-3/12 text-left px-0.5 py-0.5'>" + data[item][32] + "</label>" +
                                "<label class='w-2/12 text-center px-0.5 py-0.5'>" + data[item]['fecha_inicio'] + "</label>" +
                                "<label class='w-2/12 text-center px-0.5 py-0.5'>" + data[item]['fecha_fin'] + "</label>" +
                                "<label class='w-1/12 text-center px-0.5 py-0.5'>" + data[item]['turno'] + "</label>" +
                                "<label class='w-1/12 text-center px-0.5 py-0.5'><input type='hidden' value='"+data[item]['id_practicas']+"'><input id='"+data[item]['id_practicas']+"' type='hidden' value='"+data[item]['validacion']+"'>  " + data[item]['validacion_view'] + "</label>" +
                                "</form>";
                        }
                        $('#results_list_ppp_teacher_filter').html(row);

                        /** ajax for validate PPP */
                        $('.input_checkbox').on("click", function(e) {
                            console.log($(this).parent().parent().children().eq(0).val());   ///value of input id_practicas
                            console.log($(this).parent().parent().children().eq(1).val());   // value date_validacion
                            $.ajax({
                                type: 'POST',
                                url: window.location.href + "/validate_practica",
                                data: {
                                    id_practicas: $(this).parent().parent().children().eq(0).val(),
                                    fecha_validate_practica: $(this).parent().parent().children().eq(1).val()
                                },
                                success: function(response) {
                                    var jsonDataValidate = JSON.parse(response);
                                    console.log(jsonDataValidate);
                                    if (jsonDataValidate.success == 1 || jsonDataValidate.success == 2) {
                                        ////falta actualizar al valor del input fecha_validacion al actualizar en el front
                                        $("#" + jsonDataValidate.id_practicas_json).parent().children().eq(1).val(jsonDataValidate.date_validation);
                                        console.log(jsonDataValidate.date_validation);
                                        // console.log($(this).parent().parent().children().eq(2));
                                    }
                                }
                            });
                        });


                    } else if (jsonData.success == []) {
                        $('#results_list_ppp_teacher_filter').html("<div class='text-[.9rem]'>0 Resultados</div>");
                    } else {
                        $('#results_list_ppp_teacher_filter').html("<div class='text-[.9rem]'>0 Resultados</div>");
                    }
                }
            });
        });



    });
</script>
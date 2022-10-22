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
                                                <select id="select_especialidad_teacherasis" name="select_especialidad_asis" class="text-[.9rem] h-8 rounded input-border-blue border-slate-500 px-1">
                                                    <option value="">--Seleccionar--</option>
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
                                                <select id="select_modules_teacherasis" name="select_module_asis" class="text-[.9rem] h-8 rounded input-border-blue border-slate-500 px-1">
                                                    <option value="">--Seleccionar--</option>
                                                    <?php
                                                    // require_once(MODELS.'modulo_model.php');
                                                    // $mod = new Modulo_model();
                                                    // foreach ($es->get_all_order_by('modulo','Especialidad_id_especialidad')->fetchAll() as $item) {
                                                    //     echo " <option value='" . $item['id_modulo'] . "'>" . $item['nombre'] . "</option>";
                                                    // }
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

<script>

    ///load data visitas
    $(document).ready(function (){

        ///load modules with ajax                                                            
        ///cargando el combobox de modulos con ayax
        $("#select_especialidad_teacherasis").change(function() {
            $.ajax({
                type: "POST",
                url: window.location.href + "/load_modules",
                data: $("#form_show_asistencia_teacher").serialize(), //send data of form id=form_send_ppp_teacher
                success: function(response) {
                    var jsonData = JSON.parse(response);
                    // if (jsonData.success == "1")
                    if (jsonData.success != null) {
                        // console.log(jsonData.success);
                        let data = jsonData.success;
                        let row = "<option value=''>--seleccionar--</option>";
                        for (const item in data) {
                           row = row + "<option value='"+data[item]['id_modulo']+"'>"+data[item]['nombre']+"</option>";
                        }
                        $('#select_modules_teacherasis').html(row);
                    } else if (jsonData.success == []) {
                        alert('0 Resultados');
                    } else {
                        alert('0 Resultados');
                    }
                }
            });

        });

        /* FOR MODULE asistencia docente*/

        $("#form_show_asistencia_teacher").on( "submit", function(event) {
            event.preventDefault();
        });
        //
        $("#button_show_asistencia_teacher").click(function(){    
            $.ajax({
                type: "POST",
                url: window.location.href+"/show_asistencia",
                data: $("#form_show_asistencia_teacher").serialize(),    //send data of form id=form_show_asistencia_teacher
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    // user is logged in successfully in the back-end
                    // let's redirect
                    // if (jsonData.success == "1")
                    if(jsonData.success == 1){
                        // console.log(jsonData.success);
                        let contenthtml = '<div class="border rounded py-2 text-stone-500 bg-red-50 border-red-100">Seleccione todos los campos </div>';
                        // $('#results-flash-ajax-asistencia').html(contenthtml);
                        alert('Seleccione todos los campos');
                    }
                    else if(jsonData.success != null && jsonData.success != 1){
                    
                        // console.log(jsonData.success);
                        let data = jsonData.success;
                        let row = '';
                        for(const item in data){
                            if(data[item]['validacion_actividad']!='0000-00-00 00:00:00'){data[item]['validacion_view']="<label class='switch'><input type='checkbox' class='input_checkbox' checked><span class='slider round'></span></label>";}
                            else{data[item]['validacion_view'] = "<label class='switch'><input type='checkbox' class='input_checkbox'><span class='slider round'></span></label>";}
                            
                            row = row+"<div class='flex w-12/12 text-slate-800 center text-sm py-0.5 rounded-sm px-1' style='border-bottom: 1px solid rgba(2,77,131,.8)'>"+
                            "<label class='w-3/12 text-left px-0.5 py-0.5'>"+data[item]['28']+" "+data[item]['29']+" "+data[item]['30']+"</label>"+
                            "<label class='w-3/12 text-left px-0.5 py-0.5'>"+data[item]['actividad']+"</label>"+
                            "<label class='w-1/12 text-center px-0.5 py-0.5'>"+data[item]['fecha_hora_entrada'].substring(11,19)+"</label>"+
                            "<label class='w-1/12 text-center px-0.5 py-0.5'>"+data[item]['fecha_hora_salida'].substring(11,19)+"</label>"+
                            "<label class='w-3/12 text-center px-0.5 py-0.5'>"+data[item]['observacion']+"</label>"+
                            "<label class='w-1/12 text-center px-0.5 py-0.5'><input type='hidden' value='"+data[item]['validacion_actividad']+"' id='"+data[item]['id_asistencia_actividad']+"'><input type='hidden' value='"+data[item]['id_asistencia_actividad']+"'>"+data[item]['validacion_view']+"</label>"+
                            "</div>";
                        }
                        $('#results_list_asistencia_teacher_filter').html(row);

                        /** ajax for validate asistencia actividad */
                        $('.input_checkbox').on("click", function(e) {
                            // console.log($(this).parent().parent().children().eq(0).val());   ///value of date_validacion 
                            // console.log($(this).parent().parent().children().eq(1).val());   ///input id_practicas
                            $.ajax({
                                type: 'POST',
                                url: window.location.href + "/validate_asistencia_actividad",
                                data: {
                                    id_asistencia_actividad: $(this).parent().parent().children().eq(1).val(),
                                    fechaValidate_asistencia_actividad: $(this).parent().parent().children().eq(0).val()
                                },
                                success: function(response) {
                                    var jsonDataValidate = JSON.parse(response);
                                    console.log(jsonDataValidate);
                                    if (jsonDataValidate.success == 1 || jsonDataValidate.success == 2) {
                                        // $("#" + jsonDataValidate.id_asistencia_actividad).parent().children().eq(0).val(jsonDataValidate.date_asistenciaactividad);
                                        $("#" + jsonDataValidate.id_asistencia_actividad).val(jsonDataValidate.date_asistenciaactividad);
                                        // console.log($("#" + jsonDataValidate.id_asistencia_actividad).val());
                                        
                                    }
                                }
                            });
                        });
                    }
                    else if(jsonData.success == []){
                        $('#results_list_asistencia_teacher_filter').html("<div class='text-[.9rem]'>0 Resultados</div>");
                    }else{
                        $('#results_list_asistencia_teacher_filter').html("<div class='text-[.9rem]'>0 Resultados</div>");
                    }
                }
            });

        });


    });                                                            




</script>
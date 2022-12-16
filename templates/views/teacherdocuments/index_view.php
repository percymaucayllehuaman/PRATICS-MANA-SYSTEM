<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f55] h-screen ">

    <?php require_once MODULES . "mod_header_main.php"; ?>




    <!-- <div class="panel-praticing bg-[#efefef] w-full flex"> -->
    <div class="w-full min-h-fit bg-transparent pt-2 flex " style="height: calc(100vh - 110px);">
        <?php require_once MODULES . "mod_sidebar_teacher.php"; ?>

        <div class="block bg-[#f3f3f3] overflow-auto" style="width: calc(100% - 200px); border-left:8px solid #ffffff">
            <div class="main_panel">
                <div class="main_panel_registervisitas_teacher w-full overflow-y-auto">
                    <div class="py-1 w-full relative px-4" style="max-height: calc(100vh - 90px);">
                        <div class="overflow-x-auto container_register_teacher pb-2px-1">
                            <h2 class="font-bold text-[1.2rem] py-2 px-1 w-full text-[#4b4b4b]">Validar Documentos</h2> <!-- title -->
                            <div class="w-full flex">
                                <form id="form_teacher_documents" action="teacherdocuments/show_documents" method="post" class="w-autp items-center py-2">
                                    <div class="flex gap-3 flex-wrap">
                                        <div class="flex w-full gap-3 flex-wrap">
                                            <div class="w-auto flex items-center flex-wrap ">
                                                <div class="flex border h-8 items-center">
                                                    <label for="" class="w-auto mr-2 px-1 px-1 text-[.9rem]">Seleccione Especialidad</label>
                                                </div>
                                                <select id="select_especialidad_documents_teacher" name="select_especialidad_documents" class="text-[.9rem] h-8 rounded input-border-blue border-slate-500 px-1">
                                                    <option value="">-- seleccionar --</option>
                                                    <?php
                                                    require_once(MODELS.'especialidad_model.php');
                                                    $es = new Especialidad_model();
                                                    foreach($es->get_all('especialidad')->fetchAll() as $item){
                                                        echo '<option value='.$item['id_especialidad'].'>'.$item['nombre'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="w-auto flex items-center border">
                                                <label for="" class="w-auto mr-2 px-1 text-[.9rem]">Módulo </label>
                                                <select id="select_modulos_documents_teacher" name="select_module_documents" class="text-[.9rem] h-8 rounded input-border-blue border-slate-500 px-1">
                                                    <option value="">-- seleccionar --</option>
                                                    <?php
                                                    // require_once(MODELS.'modulo_model.php');
                                                    // $es = new Modulo_model();
                                                    // foreach($es->get_all_order_by('modulo','especialidad_id_especialidad')->fetchAll() as $item){
                                                    //     echo '<option value='.$item['id_modulo'].'>'.$item['nombre'].'</option>';
                                                    // }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-auto px- py-2 my-2">
                                        <button name="button_show_documents" class="button_show_documents_teacher bg-blue-700 text-[#efefef] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[8rem]">
                                            <span>Mostrar</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto w-12/12">
                    <div class="container_results_list block w-full px-5 bottom max-h-screen overflow-auto min-w-[600px] ">
                        <div class="list_title_results w-12/12">
                            <h2 class="font-bold text-[1rem] py-2 px-1 w-full text-[#5b5b5b]">Lista de Estudiantes:</h2>
                            <div class="flex bg-[rgba(2,77,131,.95)] w-12/12 text-slate-100 center text-sm py-0.5 rounded-sm">
                                <label class="w-1/12 text-center px-0.5 py-0.5">#</label>
                                <label class="w-3/12 text-center px-0.5 py-0.5">Estudiante</label>
                                <label class="w-2/12 text-center px-0.5 py-0.5">Fecha</label>
                                <label class="w-2/12 text-center px-0.5 py-0.5">Documento</label>
                                <label class="w-1/12 text-center px-0.5 py-0.5">Archivo Entregado</label>
                                <label class="w-2/12 text-center px-0.5 py-0.5">Validación</label>
                                <label class="w-2/12 text-center px-0.5 py-0.5">Observación</label>
                            </div>
                            <div id="results_list_estudiantes_documents" class="w-12/12 py-0.5 rounded-sm text-sm">

                            </div>
                            <?php  
                               if(isset($_SESSION['data-doc'])){
                                    if($_SESSION['data-doc'] != null){   //$_SESSION['data-doc'] != null
                                        $i = 0;
                                        foreach($_SESSION['data-doc'] as $item){
                                            $i++;
                                            // var_dump($item);
                                            $validacion = '';
                                            if($item[6] == '0000-00-00 00:00:00'){$validacion = '';}
                                            if($item[6] != '0000-00-00 00:00:00'){$validacion = 'checked';}
                                            $r = '<form class="flex bg-[rgba(2,77,131,.1)] text-slate-800 text-sm py-0.5 rounded-sm">
                                            <div class="w-1/12 text-center px-0.5 py-0.5">
                                                '.$i.'
                                            </div>
                                            <div class="w-3/12 px-0.5 py-0.5">
                                                '.ucwords($item['nombres'].' ' .$item['apellido_paterno'].' '. $item['apellido_materno']).'
                                            </div>
                                            <div class="w-2/12 text-center px-0.5 py-0.5">
                                                '.$item['fecha'].'
                                            </div>
                                            <div class="w-2/12 text-center px-0.5 py-0.5">
                                                '.$item[4].'
                                            </div>
                                            <div class="w-1/12 text-center px-0.5 py-0.5">
                                                <a href="'.BASEPATH.'resources/data/'.$item['ruta_archivo'].'" target="_blank" rel="noopener noreferrer" class ="decoration-1">
                                                    Ver
                                                </a>
                                            </div>
                                            <div class="w-2/12 text-center px-0.5 py-0.5">
                                                <input type="hidden" id="'.'id_'.$item['id_documentos'].'" value="'.$item['id_documentos'].'">
                                                <input type="hidden" value="'.$item[6].'">
                                                <label class="switch">
                                                    <input type="checkbox"  '.$validacion.' class="input_checkbox_validation">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="w-2/12 text-center px-0.5 py-0.5">
                                                <input class="outline-0 border rounded w-[95%] px-1" name="" value="'.$item['observacion'].'">
                                            </div>
                                        </form>';
                                        echo $r;
                                        }
                                    }
                                    else if($_SESSION['data-doc'] == false){
                                        echo "<div class='px-1 flex bg-[rgba(2,77,131,.1)] text-slate-800 text-sm py-0.5 rounded-sm'>No hay Documentos</div>";
                                   } 
                                   unset($_SESSION['data-doc']);
                               }
                            ?>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once INCLUDES . "inc_footer.php"; ?>


</div>


<?php require_once INCLUDES . "inc_footer_html.php"; ?>

<script>

    ///load modules with ayax
    $(document).ready(function (){
        ///cargando el combobox de modulos con ayax
        $("#select_especialidad_documents_teacher").change(function() {
            $.ajax({
                type: "POST",
                url: window.location.href + "/load_modules",
                data: $("#form_teacher_documents").serialize(), //send data of form id=form_send_ppp_teacher
                success: function(response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success != null) {
                        console.log(jsonData.success);
                        let data = jsonData.success;
                        let row = "<option value=''>-- seleccionar --</option>";
                        for (const item in data) {
                           row = row + "<option value='"+data[item]['id_modulo']+"'>"+data[item]['nombre']+"</option>";
                        }
                        $('#select_modulos_documents_teacher').html(row);
                    } else if (jsonData.success == []) {
                        alert('0 Resultados');
                    } else {
                        alert('0 Resultados');
                    }
                }
            });

        });

        $('#form_teacher_documents').submit(function (e){
            // e.preventDefault();   ///no send form
        });

        $('.input_checkbox_validation').on("click", function(e) {
            // console.log($(this).parent().parent().children().eq(0).val());
            // console.log($(this).parent().parent().children().eq(1).val());
            $.ajax({
                type: 'POST',
                url: window.location.href + "/validate_document_by_teacher",
                data: {
                    id_document: $(this).parent().parent().children().eq(0).val(),
                    date_validation: $(this).parent().parent().children().eq(1).val()
                },
                success: function(response) {
                    var jsonDataValidate = JSON.parse(response);
                    console.log(jsonDataValidate);
                    if(jsonDataValidate.success == 1 || jsonDataValidate.success == 2){
                        $("#id_"+jsonDataValidate.id_document).parent().children().eq(1).val(jsonDataValidate.date_validate);                        
                    }
                   
                }
            });
        });

        // $('.button_show_documents_teacher').click(function(){
        //     ///cargando el combobox de modulos con ayax
        //     $.ajax({
        //         type: "POST",
        //         url: window.location.href + "/show_documents",
        //         data: $("#form_teacher_documents").serialize(), //send data of form id=form_send_ppp_teacher
        //         success: function(response) {
        //             var jsonData = JSON.parse(response);
        //             console.log(jsonData);
        //             if (jsonData.success == 1){
        //                 let row = '';
        //                 for(let item in jsonData.data){
        //                     if(!data[item]['asistencia_ent_sal']){ data[item]['asistencia_ent_sal'] = "X"; }
        //                         else{ data[item]['asistencia_ent_sal'] = "";}
        //                     if(!data[item]['actividad_trabajo']){ data[item]['actividad_trabajo'] = "X"; }
        //                         else{data[item]['actividad_trabajo'] = "";}
        //                     if(!data[item]['no_se_encontro']){ data[item]['no_se_encontro'] = "X"; }
        //                         //else{data[item]['no_se_encontro'] = "";}
        //                     row += ""+
        //                     "<label>"+item+"</label>"+
        //                     "<label></label>"+
        //                     "<label></label>"+
        //                     "<label></label>"+
        //                     "<label></label>"+
        //                     "<label></label>"+
        //                     "<label></label>"+
        //                     "<label></label>"+
        //                     "</div>";

        //                 }
        //             }else if(jsonData.success == 2){
        //                 alert('0 Resultados');
        //                 $('#results_list_estudiantes_documents').html("<label class='w-2/12 px-1'>No hay Resultados</label>");
        //             }else if(jsonData.success == 3){
        //                 alert('Seleccione Especialidad y Módulo');
        //             }
        //             // if (jsonData.success != null) {
        //             //     let data = jsonData.success;
        //             //     let row = '';
        //             //     console.log(data);
        //             //     for (const item in data) {
        //             //         if(!data[item]['asistencia_ent_sal']){ data[item]['asistencia_ent_sal'] = "X"; }
        //             //             else{ data[item]['asistencia_ent_sal'] = "";}
        //             //         if(!data[item]['actividad_trabajo']){ data[item]['actividad_trabajo'] = "X"; }
        //             //             else{data[item]['actividad_trabajo'] = "";}
        //             //         if(!data[item]['no_se_encontro']){ data[item]['no_se_encontro'] = "X"; }
        //             //             //else{data[item]['no_se_encontro'] = "";}
                            
        //             //         row += "<div class='w-full 12/12 flex'>"+
        //             //         "<label class='w-2/12 text-center'>"+data[item]['fecha']+"</label>"+
        //             //         "<label class='w-2/12 text-center'>"+data[item]['asistencia_ent_sal']+"</label>"+
        //             //         "<label class='w-2/12 text-center'>"+data[item]['actividad_trabajo']+"</label>"+
        //             //         "<label class='w-2/12 text-center'>"+data[item]['no_se_encontro']+"</label>"+
        //             //         "<label class='w-4/12 '>"+data[item]['sugerencias']+"</label>"+
        //             //         "</div>";
        //             //     }
        //             //     $('#div_visitas_p_content_lists').html(row);
        //             // } else if (jsonData.success == []) {
        //             //     $('#div_results_visitas_pract').html('No hay Resultados');
        //             //     alert('No hay Resultados');
        //             // } else {
        //             //     alert('No hay Resultados');
        //             // }
        //         }
        //     });
        // });
    });                                                            

</script>
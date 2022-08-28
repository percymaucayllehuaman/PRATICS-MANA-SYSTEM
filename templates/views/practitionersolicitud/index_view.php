<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f55] h-screen ">

    <?php require_once MODULES . "mod_header_main.php"; ?>

    <div class="w-full min-h-fit bg-transparent pt-2 flex " style="height: calc(100vh - 110px);">
        <?php require_once MODULES . "mod_sidebar_practitioner.php"; ?>
        <div class="block bg-[#f3f3f3] overflow-auto" style="width: calc(100% - 200px); border-left:8px solid #ffffff">
            <div class="main_panel_registerpp_practitioner w-full overflow-y-auto">
                <div class="py-1 w-full relative px-4" style="max-height: calc(100vh - 90px);">
                    <div class="overflow-x-auto container_register_teacher pb-2">
                        <h2 class="font-bold text-[1.2rem] py-2 px-1">Solicite PPP a realizar:</h2>
                        <form id="form_regis_practicas_prac" action="practitionersolicitud/register" class="w-full h-auto flex flex-wrap min-w-[450px]" method="post">
                            <div class="flex flex-wrap">
                                <?php echo Flasher::flash(); ?>
                                <div class="min-w-[200px] px-2 flex flex-wrap gap-0.5">
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-1 text-[.9rem]">
                                            ESPECIALIDAD
                                        </div>
                                        <select id="select_especilidad_sol_p" name="select_especilidad_sol" class="px-1 input-border-blue border-slate-500 h-7 text-[.8rem] w-full">
                                            <?php
                                                echo "<option value=''>Seleccione Especialidad</option>";
                                                require_once(MODELS.'especialidad_model.php');
                                                $es = new Especialidad_model();
                                                $data = $es->get_all("especialidad")->fetchAll();

                                                foreach ($data as $item) {
                                                    echo "<option value='" . $item['id_especialidad'] . "'>" . $item['nombre'] . "</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-1 text-[.9rem]">
                                            MÓDULO
                                        </div>
                                        <select id="select_modulo_sol_p" name="select_module_soli" class="px-1 input-border-blue border-slate-500 h-7 text-[.8rem] w-full">
                                            <?php
                                                echo "<option value=''>Seleccione Módulo</option>";
                                                // require_once(MODELS.'modulo_model.php');
                                                // $m = new Modulo_model();
                                                // $data = $m->get_all_order_by("modulo","Especialidad_id_especialidad")->fetchAll();
                                                // foreach ($data as $item) {
                                                //     echo "<option value='".$item['id_modulo']."'>".$item['nombre']."</option>";
                                                // }
                                            ?>
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
                                            <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
                                            <option value="<?php echo date('Y') - 1; ?>"><?php echo date('Y') - 1; ?></option>
                                            <option value="<?php echo date('Y') - 2; ?>"><?php echo date('Y') - 2; ?></option>
                                            <option value="<?php echo date('Y') - 3; ?>"><?php echo date('Y') - 3; ?></option>
                                            <option value="<?php echo date('Y') - 4; ?>"><?php echo date('Y') - 4; ?></option>
                                            <option value="<?php echo date('Y') - 5; ?>"><?php echo date('Y') - 5; ?></option>
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
                                            <?php
                                                require_once(MODELS.'empresa_model.php');
                                                $m = new Empresa_model();
                                                $data = $m->get_all('empresa')->fetchAll();
                                                echo "<option value=''>Seleccione Empresa</option>";
                                                foreach ($data as $item) {
                                                    echo "<option value='".$item['RUC_codigo_ident']."'>".$item['nombre']."</option>";
                                                }
                                            ?>
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
                                            <?php
                                                require_once(MODELS.'docentes_model.php');
                                                $m = new Docentes_model();
                                                $data = $m->get_all('docentes')->fetchAll();
                                                echo "<option value=''>Seleccione Docente</option>";
                                                foreach ($data as $item) {
                                                    echo "<option value='".$item['DNI']."'>".$item['nombres']."</option>";
                                                }
                                            ?>
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
                                        <input type="time" name="prac_timestart_regis" class="px-2 input-border-blue border-slate-500 h-7 text-[.9rem] w-auto" required>
                                    </div>
                                    <div class="line my-1 mr-4 flex border items-center">
                                        <div class="w-auto mx-2 text-[.9rem] min-w-[90px]">
                                            HORA FIN
                                        </div>
                                        <input type="time" name="prac_timeend_regis" class="px-2 input-border-blue border-slate-500 h-7 text-[.9rem] w-auto" required>
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
                        <div class="flex bg-[rgba(2,77,131,.95)] w-12/12 text-slate-100 justify-center center text-sm py-0.5 rounded-sm px-1">
                            <label class="w-2/12 text-center px-0.5 py-0.5">MÓDULO</label>
                            <label class="w-1/12 text-center px-0.5 py-0.5">AÑO</label>
                            <label class="w-1/12 text-center px-0.5 py-0.5">PERIODO</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">EMPRESA</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">FECHA INICIO</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">FECHA FIN</label>
                            <label class="w-1/12 text-center px-0.5 py-0.5">TURNO</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">HORA INICIO</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">HORA FIN</label>
                            <label class="w-1/12 text-center px-0.5 py-0.5">VALIDACIÓN</label>
                        </div>

                        <?php
                            require_once(MODELS.'practicas_model.php');
                            $p = new Practicas_model();
                            $data = $p->get_practicas_by_estudiante($_SESSION['USER-LOGIN']->usuario);
                            $data = $data->fetchAll();
                            if($data){
                                
                               foreach($data as $row){
                                    require_once(MODELS.'modulo_model.php');
                                    $m = new Modulo_model();
                                    $m = $m->get_modulo_by_id($row['Modulo_id_modulo']);

                                    require_once(MODELS.'empresa_model.php');
                                    $e = new Empresa_model();
                                    $e = $e->get_empresa_by_id($row['Empresa_RUC']);
                                    if($row['validacion']=="0000-00-00 00:00:00"){$row['validacion']='No';}
                                    echo "<div class='flex w-12/12 text-slate-700 justify-center center text-sm py-0.5 rounded-sm px-1' style ='border-bottom: 1px solid rgba(2,77,131,.95)'>";
                                        $r = "<label class='w-2/12 text-left px-0.5 py-0.5'>".$m->nombre."</label>".
                                        "<label class='w-1/12 text-left px-0.5 py-0.5'>".$row['anio']."</label>".
                                        "<label class='w-1/12 text-left px-0.5 py-0.5'>".$row['periodo']."</label>".
                                        "<label class='w-2/12 text-left px-0.5 py-0.5'>".$e->nombre."</label>".
                                        "<label class='w-2/12 text-left px-0.5 py-0.5'>".$row['fecha_inicio']."</label>".
                                        "<label class='w-2/12 text-left px-0.5 py-0.5'>".$row['fecha_fin']."</label>".
                                        "<label class='w-1/12 text-left px-0.5 py-0.5'>".$row['turno']."</label>".
                                        "<label class='w-2/12 text-left px-0.5 py-0.5'>".$row['hora_inicio']."</label>".
                                        "<label class='w-2/12 text-left px-0.5 py-0.5'>".$row['hora_fin']."</label>".
                                        "<label class='w-1/12 text-center px-0.5 py-0.5'>".$row['validacion']."</label>";
                                        echo $r;
                                    echo "</div>";
                               }

                            }else{
                                echo "<div class='text-[.9rem] text-slate-700'>No hay Practicas Solicitadas</div>";
                            }
                        ?>
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
        $("#select_especilidad_sol_p").change(function() {
            $.ajax({
                type: "POST",
                url: window.location.href + "/load_modules",
                data: $("#form_regis_practicas_prac").serialize(), //send data of form id=form_send_ppp_teacher
                success: function(response) {
                    var jsonData = JSON.parse(response);
                    // user is logged in successfully in the back-end
                    // let's redirect
                    // if (jsonData.success == "1")
                    if (jsonData.success != null) {

                        console.log(jsonData.success);
                        let data = jsonData.success;
                        let row = "<option value=''>--seleccionar--</option>";
                        for (const item in data) {
                            row = row + "<option value='"+data[item]['id_modulo']+"'>"+data[item]['nombre']+"</option>";
                        }
                        $('#select_modulo_sol_p').html(row);
                    } else if (jsonData.success == []) {
                        alert('0 Resultados');
                    } else {
                        alert('0 Resultados');
                    }
                }
            });

        });
    });
</script>

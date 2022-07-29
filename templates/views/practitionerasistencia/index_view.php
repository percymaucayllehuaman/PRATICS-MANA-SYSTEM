<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f55] h-screen ">

    <?php require_once MODULES . "mod_header_main.php"; ?>




    <!-- <div class="panel-praticing bg-[#efefef] w-full flex"> -->
    <div class="w-full min-h-fit bg-transparent pt-2 flex " style="height: calc(100vh - 110px);">
        <?php require_once MODULES . "mod_sidebar_practitioner.php"; ?>

        <div class="main_panel block bg-[#f3f3f3] overflow-auto" style="width: calc(100% - 200px); border-left:8px solid #ffffff">
            <div class="main_panel_registerpp_practitioner w-full overflow-y-auto min-h-fit">
                <div class="py-1 w-full relative px-4" style="max-height: calc(100vh - 90px);">
                    <div class="overflow-x-auto container_register_teacher pb-2">
                        <h2 class="font-bold text-[1.2rem] py-2 px-1 w-full">Asistencia</h2>
                        <?php echo Flasher::flash(); ?>
                        <div class="flex w-full">
                            <form action="practitionerasistencia/register_entrada" method="post">
                                <div class="line my-1 mr-4 flex items-center">
                                    <input type="hidden" name="<?php echo "input"; ?>" value="hola">
                                    <div class="w-auto mx-1 text-[.9rem] min-w-[90px]">
                                        <button name="button_save_entrada_asistencia" name="btn_send_entrada" class="bg-[#919191] text-[#fff] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[10rem]">
                                            <span>Registrar Entrada</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <form action="practitionerasistencia/register_salida" method="post">
                                <div class="line my-1 mr-4 flex items-center">
                                    <input type="hidden" name="id_user" value="<?php echo "input"; ?>">
                                    <input type="hidden" name="id_prac" value="<?php echo "input"; ?>">
                                    <div class="w-auto mx-1 text-[.9rem] min-w-[90px]">
                                        <button name="button_save_entrada_asistencia" name="btn_send_salida" class="bg-[#919191] text-[#fff] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[10rem]">
                                            <span>Registrar Salida</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="w-full flex">
                            <form action="practitionerasistencia/register_actividad" method="post" class="w-autp items-center py-2">
                                <div class="w-auto flex items-center border">
                                    <label for="" class="w-auto mr-2 px-1">Activiadad </label>
                                    <textarea name="textarea_actividad" placeholder="Describe la actividad" rows="2" cols="10" class="min-w-[15rem] text-[.9rem]  rounded input-border-blue border-slate-500 px-1 py-1" required></textarea>
                                </div>
                                <div class="w-auto px-1 py-2">
                                    <button name="btn_end_actividad" class="bg-blue-700 text-[#efefef] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[10rem]">
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
                            <label class="w-[5%] text-center px-0.5 py-0.5">#</label>
                            <label class="w-[30%] text-center px-0.5 py-0.5">Actividad</label>
                            <label class="w-[15%] text-center px-0.5 py-0.5">Fecha</label>
                            <label class="w-[10%] text-center px-0.5 py-0.5">Hora Entrada</label>
                            <label class="w-[10%] text-center px-0.5 py-0.5">Hora Salida</label>
                            <label class="w-[15%] text-center px-0.5 py-0.5">Validado</label>
                            <label class="w-[20%] text-center px-0.5 py-0.5">Obserbación</label>
                        </div>
                        <?php
                            $asis = new Asistenciaactividad_model();
                            $data = $asis->get_all_by_dni($_SESSION['USER-LOGIN']->usuario);
                            $i = 0;
                            foreach($data as $item){
                                $i++;
                                if($item['validacion_actividad']=='0000-00-00 00:00:00'){$item['validacion_actividad']="No";}
                                if($item['fecha_hora_salida']=='0000-00-00 00:00:00'){$item['fecha_hora_salida']="Falta Registrar";}
                                echo '<div class="flex bg-[rgba(2,77,131,.1)] w-12/12 text-slate-900 justify-center center text-sm py-0.5 rounded-sm" style="border-bottom: 1px solid rgba(2,77,131,.6)">';
                            
                                $v = '<label class="w-[5%] text-center px-0.5 py-0.5">'.$i.'</label>
                                <label class="w-[35%] text-left px-0.5 py-0.5">'.$item['actividad'].'</label>
                                <label class="w-[15%] text-center px-0.5 py-0.5">'.$item['fecha'].'</label>
                                <label class="w-[10%] text-center px-0.5 py-0.5">'.substr($item['fecha_hora_entrada'],-8).'</label>
                                <label class="w-[10%] text-center px-0.5 py-0.5">'.substr($item['fecha_hora_entrada'],-8).'</label>
                                <label class="w-[20%] text-center px-0.5 py-0.5">'.$item['validacion_actividad'].'</label>
                                <label class="w-[20%] text-center px-0.5 py-0.5">'.$item['observacion'].'</label>';
                                echo $v;
                                echo '</div>';
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
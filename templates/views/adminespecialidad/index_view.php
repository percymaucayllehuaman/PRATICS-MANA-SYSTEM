<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f55] h-screen ">

    <?php require_once MODULES . "mod_header_main.php"; ?>


    <div class="w-full min-h-fit bg-transparent pt-2 flex " style="height: calc(100vh - 110px);">
        <?php require_once MODULES . "mod_sidebar_admin.php"; ?>

        <div class="block bg-[#f3f3f3] overflow-y-auto" style="width: calc(100% - 250px); border-left:8px solid #ffffff;">
            <div class="main_panel_registerespecialiad_module w-full">
                <div class=" px-2 py-1 w-full relative">
                    <div class="overflow-x-auto container_register_especialidad pb-2 px-5">
                        <!-- <style>::-webkit-scrollbar {width:5px;}::-webkit-scrollbar-track {background: #f1f1f1; }</style> -->
                        <h2 class="font-bold text-[1.2rem] py-2 w-full">Registro de Especialidad </h2>
                        <?php echo Flasher::flash(); ?>
                        <form action="adminespecialidad/registerespecialidad" class="w-auto h-auto min-w-[250px] border input-border-blue pt-3 pb-3 overflow-x-auto" method="post">
                            
                            <div class="px-2 w-auto flex flex-wrap items-center gap-4">
                                <div class="line my-2 mx-1">
                                    <!-- <label for="" class="w-full">DNI</label> -->
                                    <input type="text" name="especialidad_name_admin" placeholder="Especialidad" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] min-w-[15rem]" required>
                                </div>
                                <div class="line my-2 mx-1">
                                    <input type="text" name="especialidad_description_admin" placeholder="Descripción" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem]  min-w-[15rem] " required>
                                </div>
                            </div>
                            <div class="px-2 w-full">
                                <div class="line my-2 mx-1">
                                    <button name="button_sendform_conveniodocument" type="submit" class="bg-blue-700 text-[#efefef] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[10rem]">
                                        <span>Registrar Especialidad</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <h2 class="font-bold text-[1.2rem] py-2">Registro de Módulo </h2>
                        
                        <form action="adminespecialidad/registermodule" class="w-auto h-auto flex flex-wrap input-border-blue py-3" method="post">
                            <?php echo Flasher::flash(); ?>
                            <div class="px-2 w-auto flex flex-wrap items-center gap-4">
                                <div class="line my-2 mx-1">
                                    <!-- <label for="" class="w-full">DNI</label> -->
                                    <select name="select_especialidad_regis" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] min-w-[15rem]">
                                        <option value="">Seleccione Especialidad</option>
                                    <?php 
                                        require_once(MODELS.'especialidad_model.php');
                                        $e = new Especialidad_model();
                                        foreach($e->get_all('especialidad')->fetchAll() as $item){
                                            echo "<option value='".$item['id_especialidad']."'>".$item['nombre']."</option>";
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="line my-2 mx-1">
                                    <input type="text" name="module_name_admin" placeholder="Módulo" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem]  min-w-[15rem] " required>
                                </div>
                                <div class="line my-2 mx-1">
                                    <input type="text" name="module_description_admin" placeholder="Descripción" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem]  min-w-[15rem] " required>
                                </div>
                            </div>
                            <div class="px-2 w-full">
                                <div class="line my-2 mx-1">
                                    <button name="button_sendform_conveniodocument" type="submit" class="bg-blue-700 text-[#efefef] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[10rem]">
                                        <span>Registrar Modulo</span>
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
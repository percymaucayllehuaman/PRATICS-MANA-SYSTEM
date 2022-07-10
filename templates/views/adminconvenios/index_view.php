<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f55] h-screen ">

    <?php require_once MODULES . "mod_header_main.php"; ?>




    <!-- <div class="panel-praticing bg-[#efefef] w-full flex"> -->
    <div class="w-full min-h-fit bg-transparent pt-2 flex " style="height: calc(100vh - 110px);">
        <?php require_once MODULES . "mod_sidebar_admin.php"; ?>

        <div class="block bg-[#f3f3f3]" style="width: calc(100% - 200px); border-left:8px solid #ffffff; max-height:calc(100vh - 90px)">
            <div class="main_panel_registerconvenio w-full">
                <div class=" px-2 py-1 w-full relative">
                    <div class="overflow-x-auto container_register_teacher pb-2">
                        <!-- <style>::-webkit-scrollbar {width:5px;}::-webkit-scrollbar-track {background: #f1f1f1; }</style> -->
                        <h2 class="text-center font-bold text-[1.2rem] py-2">Registro de Convenio de Practicas </h2>
                        <?php echo Flasher::flash(); ?>
                        <form action="adminconvenios/register" class="w-full h-auto flex flex-wrap min-w-[450px]" method="post">
                            <div class="px-2 w-12/12 flex flex-wrap items-center">
                                <div class="line my-2">
                                    <label for="label_ruc_validate" class="text-[.9rem]">RUC/CODIGO/IDENTIFICACIÓN</label>
                                    <!-- <input type="text" name="tea_dni_regis" maxlength="8" placeholder="DNI" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] w-full" required> -->
                                </div>
                                <div class="line my-2 mx-1">
                                    <!-- <label for="" class="w-full">DNI</label> -->
                                    <input type="text" name="convenio_ruc_validate" placeholder="20608535..." class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] w-full" required>
                                </div>
                                <div class="line my-2 mx-5">
                                    <button name="button_validate_empresa" type="button" class="h-8 bg-[#17a2b8] text-[#efefef] hover:text-white hover:bg-blue-800 px-2 py-1 rounded-md text-[.8rem]">
                                        <span>Validar >></span>
                                    </button>
                                </div>
                                <div class="line my-2 flex items-center justify-center">
                                    <label for="" class="text-[.9rem] min-w-[90px]">Razón Social</label>
                                    <input type="text" name="empresa_name_regis" placeholder="Consultora Arroba EIRL" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] w-full min-w-[300px]" required>
                                </div>
                            </div>
                            <div class="px-2 w-12/12 flex flex-wrap items-center">
                                <input type="file" name="document_convenio_admin" class="text-[.9rem]">
                            </div>
                            <div class="pt-5 flex items-center w-full justify-center">
                                <button name="button_sendform_conveniodocument" type="submit" class="bg-blue-700 text-[#efefef] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[10rem]">
                                    <span>Entregar Convenio</span>
                                </button>
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
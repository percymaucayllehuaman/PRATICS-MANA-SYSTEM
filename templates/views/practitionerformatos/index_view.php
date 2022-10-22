<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f55] h-screen ">

    <?php require_once MODULES . "mod_header_main.php"; ?>

    <div class="w-full min-h-fit bg-transparent pt-2 flex " style="height: calc(100vh - 110px);">
        <?php require_once MODULES . "mod_sidebar_practitioner.php"; ?>

        <div class="main_panel block bg-[#f3f3f3] overflow-auto" style="width: calc(100% - 200px); border-left:8px solid #ffffff">
            <div class="main_panel ">
                <div class="main_panel_registervisitas_practitioner w-full overflow-y-auto">
                    <div class="py-1 w-full relative px-4" style="max-height: calc(100vh - 90px);">
                        <div class="overflow-x-auto container_register_teacher pb-2">
                            <h2 class="font-bold text-[1.2rem] py-2 px-1 w-full">Formatos de Documentos</h2>
                            <div class="overflow-x-auto w-auto max-w-[800px]">
                                <div class="container_results_list block w-auto px-1 bottom max-h-screen overflow-auto min-w-[700px] ">
                                    <div class="flex bg-[rgba(2,77,131,.95)] w-12/12 text-slate-100 text-sm py-0.5 rounded-sm px-1">
                                        <label class="w-3/12 text-center px-0.5 py-0.5">Documento</label>
                                        <label class="w-3/12 text-center px-0.5 py-0.5">Última Actualización</label>
                                        <label class="w-3/12 text-center px-0.5 py-0.5">Opción</label>
                                        <label class="w-3/12 text-center px-0.5 py-0.5">Descripción</label>
                                    </div>
                                    <div class="flex bg-[rgba(2,77,131,.1)] w-12/12 text-slate-800 px-1 text-sm py-0.5 rounded-sm" style="border-bottom: 1px solid rgba(2,77,131,.95);">
                                        <label class="w-3/12 text-center px-0.5 py-0.5">Ficha PPP</label>
                                        <label class="w-3/12 text-center px-0.5 py-0.5">02/05/2022</label>
                                        <label class="w-3/12 text-center px-0.5 py-0.5">
                                            <?php
                                                echo "<a class='underline decoration-1' href='//".HOST."/sisepp/resources/data/documents/formato-informePPP.pdf' "." target='_blank' rel='noopener noreferrer'>Descargar</a>";
                                            ?>
                                        </label>
                                        <label class="w-3/12 text-center px-0.5 py-0.5">Descripción</label>
                                    </div>
                                    <div class="flex bg-[rgba(2,77,131,.1)] w-12/12 text-slate-800 px-1 text-sm py-0.5 rounded-sm" style="border-bottom: 1px solid rgba(2,77,131,.95);">
                                        <label class="w-3/12 text-center px-0.5 py-0.5">Informe PP</label>
                                        <label class="w-3/12 text-center px-0.5 py-0.5">02/05/2022</label>
                                        <label class="w-3/12 text-center px-0.5 py-0.5">
                                            <?php 
                                                echo "<a class='underline decoration-1' href='//".HOST."/sisepp/resources/data/documents/formato-fichaPPP.pdf' "." target='_blank' rel='noopener noreferrer'>Descargar</a>";
                                            ?>
                                            
                                            <!-- <a href="resouces/formatos/informe.pdf" class="decoration-1">Descargar</a> -->
                                        </label>
                                        <label class="w-3/12 text-center px-0.5 py-0.5">Descripción</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require_once INCLUDES . "inc_footer.php"; ?>


</div>


<?php require_once INCLUDES . "inc_footer_html.php"; ?>
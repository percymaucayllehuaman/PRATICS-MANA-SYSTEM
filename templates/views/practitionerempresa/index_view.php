<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f55] h-screen ">

    <?php require_once MODULES . "mod_header_main.php"; ?>




    <!-- <div class="panel-praticing bg-[#efefef] w-full flex"> -->
    <div class="w-full min-h-fit bg-transparent pt-2 flex " style="height: calc(100vh - 110px);">
        <?php require_once MODULES . "mod_sidebar_practitioner.php"; ?>

        <div class="block bg-[#f3f3f3] overflow-auto" style="width: calc(100% - 200px); border-left:8px solid #ffffff">
            <div class="main_panel_registerempresa_practitioner w-full overflow-y-auto">
                <div class="py-1 w-full relative px-4" style="max-height: calc(100vh - 90px);">
                    <div class="overflow-x-auto container_register_teacher pb-2">
                        <h2 class="font-bold text-[1.2rem] py-2">Registro de datos de Empresa</h2>
                        <form action="practitionerempresa/register" class="w-full h-auto flex flex-wrap min-w-[450px]" method="post">
                            <div class="flex flex-wrap">
                                <?php echo Flasher::flash(); ?>
                                <div class="min-w-[200px] px-2 flex flex-wrap gap-1">
                                    <div class="line my-1 w-4/12 mr-4">
                                        <input type="text" name="prac_empresa_ruc_regis" maxlength="11" placeholder="RUC/CÓDIGO/ID" class="px-2 rounded input-border-blue border-slate-500 h-7 text-[.9rem] w-full" required>
                                    </div>
                                    <div class="line my-1 w-4/12 mr-4">
                                        <input type="text" name="prac_raz_empresa_regis" placeholder="Razon Social Empresa" class="px-2 rounded input-border-blue border-slate-500 h-7 text-[.9rem] w-full" required>
                                    </div>
                                    <div class="line my-1 w-4/12 mr-4">
                                        <input type="text" name="prac_rubro_empresa_regis" placeholder="Rubro de la Empresa" class="px-2 rounded input-border-blue border-slate-500 h-7 text-[.9rem] w-full" required>
                                    </div>
                                    <div class="line my-1 w-4/12 mr-4">
                                        <input type="text" name="prac_departamento_em_regis" placeholder="Departamento" class="px-2 rounded input-border-blue border-slate-500 h-7 text-[.9rem] w-full" required>
                                    </div>
                                    <div class="line my-1 w-4/12 mr-4">
                                        <input type="text" name="prac_prov_emp_regis" placeholder="Provincia" class="px-2 rounded input-border-blue border-slate-500 h-7 text-[.9rem] w-full" required>
                                    </div>
                                    <div class="line my-1 w-4/12 mr-4">
                                        <input type="text" name="prac_dist_empr_regis" placeholder="Distrito" class="px-2 rounded input-border-blue border-slate-500 h-7 text-[.9rem] w-full" required>
                                    </div>
                                    <div class="line my-1 w-4/12 mr-4">
                                        <input type="text" name="prac_address_empr_regis" placeholder="Dirección Fiscal" class="px-2 rounded input-border-blue border-slate-500 h-7 text-[.9rem] w-full" required>
                                    </div>
                                    <div class="line my-1 w-4/12 mr-4">
                                        <input type="text" name="prac_repre_empr_regis" placeholder="Representante (Nombres)" class="px-2 rounded input-border-blue border-slate-500 h-7 text-[.9rem] w-full" required>
                                    </div>
                                    <div class="line my-1 w-4/12 mr-4">
                                        <select name="prac_select_gender_em" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] w-full">
                                            <option value="">Género Representante</option>
                                            <option value="MASCULINO">MASCULINO</option>
                                            <option value="FEMENINO">FEMENINO</option>
                                        </select>
                                    </div>
                                    <div class="line my-1 w-4/12 mr-4">
                                        <input type="tel" name="prac_tele_empr_regis" placeholder="Teléfono" class="px-2 rounded input-border-blue border-slate-500 h-7 text-[.9rem] w-full" required>
                                    </div>
                                    <div class="line my-1 w-4/12 mr-4">
                                        <input type="email" name="prac_emp_email_regis" placeholder="Correo electrónico" class="px-2 rounded input-border-blue border-slate-500 h-7 text-[.9rem] w-full" required>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 flex items-center w-full justify-start px-2">
                                <button name="prac_button_sendform_registerempresa" type="submit" class="bg-blue-700 text-[#efefef] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[10rem]">
                                    <span>Registrar</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <div class="container_results_list block w-full px-5 bottom max-h-screen overflow-auto min-w-[800px] ">
                    <div class="list_title_results w-12/12">
                        <div class="flex bg-[rgba(2,77,131,.95)] w-12/12 text-slate-100 justify-center center text-sm py-0.5 rounded-sm">
                            <label class="w-[5%] text-center px-0.5 py-0.5">#</label>
                            <label class="w-[15%] text-center px-0.5 py-0.5">RUC/ID</label>
                            <label class="w-[15%] text-center px-0.5 py-0.5">Razon Social</label>
                            <label class="w-[15%] text-center px-0.5 py-0.5">Rubro</label>
                            <label class="w-[25%] text-center px-0.5 py-0.5">Representante</label>
                            <label class="w-[10%] text-center px-0.5 py-0.5">Celular Rep.</label>
                            <label class="w-[15%] text-center px-0.5 py-0.5">Fecha Validacion</label>
                            <label class="w-[10%] text-center px-0.5 py-0.5">...</label>
                        </div>
                        <?php
                        $em = new Empresa_model();
                        $data_em = $em->get_empresas_by_estudent($_SESSION['USER-LOGIN']->usuario)->fetchAll();
                        if($data_em){
                            $i=0;
                            foreach($data_em as $item){
                                $i++;
                                if($item['fecha_hora_validacion']=='0000-00-00 00:00:00'){$item['fecha_hora_validacion']='Por Validar';}
                                echo "<div class='flex bg-[rgba(255,255,255,.25)] w-12/12 text-slate-800 text-[.9rem] justify-center center text-sm py-0.5 rounded-sm' style='border-bottom:1px solid rgba(2,77,131,.95)'>";
                                    $row = "".
                                    "<label class='w-[5%] text-center px-0.5 py-0.5'>".$i."</label>".
                                    "<label class='w-[15%] text-left px-0.5 py-0.5'>".$item['RUC_codigo_ident']."</label>".
                                    "<label class='w-[15%] text-left px-0.5 py-0.5'>".$item['nombre']."</label>".
                                    "<label class='w-[15%] text-left px-0.5 py-0.5'>".$item['rubro']."</label>".
                                    "<label class='w-[25%] text-left px-0.5 py-0.5'>".$item['nom_ape_encargado']."</label>".
                                    "<label class='w-[10%] text-left px-0.5 py-0.5'>".$item['celular']."</label>".
                                    "<label class='w-[15%] text-left px-0.5 py-0.5'>".$item['fecha_hora_validacion']."</label>".
                                    "<label class='w-[10%] text-left px-0.5 py-0.5'>"."</label>";
                                    echo $row;
                                echo "</div>";

                            }
                            // var_dump($em->get_empresas_by_estudent($_SESSION['USER-LOGIN']->usuario)->fetchAll());
                        }else{
                            echo "<div class='text-[.9rem]'>No hay Lista ...</div>";
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
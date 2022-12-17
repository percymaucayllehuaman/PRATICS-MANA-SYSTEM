<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f55] h-screen ">

    <?php require_once MODULES . "mod_header_main.php"; ?>
    <!-- <div class="panel-praticing bg-[#efefef] w-full flex"> -->
    <div class="w-full min-h-fit bg-transparent pt-2 flex " style="height: calc(100vh - 110px);">
        <?php require_once MODULES . "mod_sidebar_admin.php"; ?>

        <div class="block bg-[#f3f3f3] overflow-y-auto" style="width: calc(100% - 250px); border-left:8px solid #ffffff;  max-height:calc(100vh - 90px)">
            <div class="main_panel_registerteacher w-full">
                <div class=" px-4 py-1 w-full relative">
                    <div class="overflow-x-auto container_register_teacher pb-2" >
                        <!-- <style>::-webkit-scrollbar {width:5px;}::-webkit-scrollbar-track {background: #f1f1f1; }</style> -->
                        <h2 class="text-left font-bold text-[1.2rem] py-2 px-2">Registro Docente</h2>
                        <?php echo Flasher::flash(); ?> 
                        <form action="admindocentes/register" class="w-full h-auto flex flex-wrap min-w-[450px]" method="post">
                            <div class="w-6/12 flex flex-wrap justify-center">
                                
                                <div class="min-w-[200px] px-2 w-6/12 ">
                                    <div class="line my-2">
                                        <!-- <label for="" class="w-full">DNI</label> -->
                                        <input type="text" name="tea_dni_regis" maxlength="8" placeholder="DNI" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] w-full" required>
                                    </div>
                                    <div class="line my-2">
                                        <!-- <label for="" class="w-full">DNI</label> -->
                                        <input type="text" name="tea_appat_regis" placeholder="Apellido Paterno" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] w-full" required>
                                    </div>
                                    <div class="line my-2">
                                        <!-- <label for="" class="w-full">DNI</label> -->
                                        <input type="text" name="tea_apmat_regis" placeholder="Apellido Materno" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] w-full" required>
                                    </div>
                                    <div class="line my-2">
                                        <!-- <label for="" class="w-full">DNI</label> -->
                                        <input type="text" name="tea_names_regis" placeholder="Nombres" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] w-full" required>
                                    </div>
                                    <div class="line my-2">
                                        <!-- <label for="" class="w-full">DNI</label> -->
                                        <input type="date" name="tea_birthdate_regis" placeholder="Fecha de Nacimiento" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] w-full" required>
                                    </div>
                                </div>
                                <div class="min-w-[200px] px-2 w-6/12">
                                    <div class="line my-2">
                                        <!-- <label for="" class="w-full">DNI</label> -->
                                        <select type="text" name="select_gender_tea" placeholder="ingrese DNI" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] w-full">
                                            <option value="">Genero</option>
                                            <option value="MASCULINO">Masculino</option>
                                            <option value="FEMENINO">Femenino</option>
                                        </select>
                                    </div>
                                    <div class="line my-2">
                                        <!-- <label for="" class="w-full">DNI</label> -->
                                        <select type="text" name="select_espe_tea" placeholder="ingrese DNI" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] w-full" required>
                                            <option value="">--Seleccione Especialidad--</option>
                                            <?php 
                                            require_once(MODELS.'especialidad_model.php');
                                            $e = new Especialidad_model();
                                            foreach($e->get_all('especialidad')->fetchAll() as $item){
                                                echo "<option value='".$item['id_especialidad']."'>".$item['nombre']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="line my-2">
                                        <!-- <label for="" class="w-full">DNI</label> -->
                                        <input type="tel" name="tea_tele_regis" maxlength="15" placeholder="Celular" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] w-full" required>
                                    </div>
                                    <div class="line my-2">
                                        <!-- <label for="" class="w-full">DNI</label> -->
                                        <input type="email" name="tea_email_regis" placeholder="Correo electrónico" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] w-full" required>
                                    </div>
                                    <div class="line my-2">
                                        <!-- <label for="" class="w-full">DNI</label> -->
                                        <input type="text" name="tea_addres_regis" placeholder="Dirección Actual" class="px-2 rounded input-border-blue border-slate-500 h-8 text-[.9rem] w-full" required>
                                    </div>
                                </div>

                            </div>
                            <div class="user_password_create w-6/12 min-w-[200px] px-2 justify-center flex-column">
                                <div class="flex items-center pt-5 justify-center">
                                    <h2 class="text-center font-bold">
                                        Crea Usuario y Contraseña
                                    </h2>
                                </div>

                                <div class="flex items-center pt-5 justify-center">
                                    <label for="" class="w-[30px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="25">
                                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M256 288c79.53 0 144-64.47 144-144s-64.47-144-144-144c-79.52 0-144 64.47-144 144S176.5 288 256 288zM351.1 320H160c-88.36 0-160 71.63-160 160c0 17.67 14.33 32 31.1 32H480c17.67 0 31.1-14.33 31.1-32C512 391.6 440.4 320 351.1 320z" />
                                        </svg>
                                    </label>
                                    <input name="tea_usernamedni" maxlength="8" type="text" class="text-[14px] input-border-blue mx-2 border-1 h-7 px-1 box-border rounded min-w-[200px] text-[#525252]" placeholder="Usuario(dni)" required>
                                </div>
                                <div class="pt-5 justify-center flex">
                                    <label for="" class="w-[30px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="25">
                                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M80 192V144C80 64.47 144.5 0 224 0C303.5 0 368 64.47 368 144V192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80zM144 192H304V144C304 99.82 268.2 64 224 64C179.8 64 144 99.82 144 144V192z" />
                                        </svg>
                                    </label>
                                    <input name="tea_password_login" type="password" class="text-[14px] input-border-blue mx-2 h-7 boder-1 px-1 box-border rounded min-w-[200px] text-[#525252]" placeholder="Contraseña" required>
                                </div>
                                <div class="pt-5 justify-center flex">
                                    <label for="" class="w-[30px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="25">
                                            <path d="M80 192V144C80 64.47 144.5 0 224 0C303.5 0 368 64.47 368 144V192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80zM144 192H304V144C304 99.82 268.2 64 224 64C179.8 64 144 99.82 144 144V192z" />
                                        </svg>
                                    </label>
                                    <input name="tea_password_confirm" type="password" class="text-[14px] input-border-blue mx-2 h-7 boder-1 px-1 box-border rounded min-w-[200px] text-[#525252]" placeholder="Confirmar Contraseña" required>
                                </div>
                            </div>
                            
                            <div class="pt-5 flex items-center w-full justify-center">
                                <button name="button_sendform_registerteacher" type="submit" class="bg-blue-700 text-[#efefef] hover:text-white hover:bg-blue-800 px-5 py-1 rounded-md min-w-[15rem]">
                                    <span>Registrar Docente</span>
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
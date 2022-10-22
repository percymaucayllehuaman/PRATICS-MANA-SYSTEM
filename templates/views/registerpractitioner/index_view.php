<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f5f5] h-screen">
    <div class="header-login-main px-5 py-0 w-full background-color-primary h-[100px] min-h-fit">
        <div class="flex box-border py-0 items-center h-full flex-row overflow-hidden">
            <div class="w-full h-full w-2/12 flex items-center min-w-fit">
                <img src="assets/images/logo_cetpro.png" alt="logo CETPRO" class="h-[90px] min-w-fit">
            </div>
            <div class="w-8/12">
                <div class="w-full relative text-center text-lg min-h-fit pb-2">
                    <strong class="text-[#ededed]">
                        CETPRO SAN JERÓNIMO
                    </strong>
                </div>
                <div class="w-full relative text-center">
                    <strong class="text-black text-xl">
                        <span class="text-black text-xl" style="font-weight: 500;">Bienvenido al </span>
                        <?php echo SYSTEM_FULLNAME; ?>
                    </strong>
                </div>
            </div>
            <div class="w-2/12 min-w-fit h-full">
                <div class="w-fit l-0 flex min-h-fit items-center h-full right-0 float-right">
                    <!-- <img src="assets/images/logo_cetpro.png" alt="" class="w-[40px] h-[45px]"> -->
                    <a href="login" class="text-[.9rem] bolder bg-green-900 text-[#efefef] px-3 py-1 mr-2 raidus-2 hover:bg-green-700 rounded">
                        Ir a Login
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="28" height="30">
                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z" />
                    </svg>
                </div>
            </div>

        </div>
    </div>
    <div class="w-full px-5">
        <div class="container-login w-full flex justify-center h-auto py-1 min-h-fit">
            <form action="registerpractitioner/register" class="w-full py-3 flex flex-wrap justify-center" method="post">
                <div class="w-full flex justify-center py-3">
                    <h2 class="font-bold text-[1.2rem] text-[#585858]">Registro de Estudiante</h2>
                </div>
                <?php echo Flasher::flash(); ?>
                <?php echo insert_inputs(); ?>
                <div class="flex-col w-fit w-min gap-4 flex">
                    <div>
                        <input name="inp_dni_prac" type="text" class="text input-border-blue px-1 text-[.9rem] h-7 rounded min-w-[15rem]" maxlength="8" placeholder="DNI" required>
                    </div>
                    <div>
                        <input name="inp_lastnamefirst_prac" type="text" class="text input-border-blue px-1 text-[.9rem] h-7 rounded min-w-[15rem]" placeholder="Apellido Paterno" required>
                    </div>
                    <div>
                        <input name="inp_lastnamesecond_prac" type="text" class="text input-border-blue px-1 text-[.9rem] h-7 rounded min-w-[15rem]" placeholder="Apellido Materno" required>
                    </div>
                    <div>
                        <input name="inp_names_prac" type="text" class="text input-border-blue px-1 text-[.9rem] h-7 rounded min-w-[15rem]" placeholder="Nombres" required>
                    </div>
                    <div>
                        <label for="date_practitioner" class="text-[.8rem]">Fech.Nacimiento </label>
                        <input name="inp_birthdate_prac" id="date_practitioner" type="date" class="text input-border-blue px-1 text-[.9rem] h-7 rounded min-w-[15rem]" placeholder="Fecha de Nacimiento" required>
                    </div>
                    <div>
                        <select name="select_gender_prac" id="" class="text input-border-blue px-1 text-[.9rem] h-7 rounded min-w-[15rem]">
                            <option value="">Seleccione Genero</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div>
                        <input name="inp_departament_prac" type="text" class="text input-border-blue px-1 text-[.9rem] h-7 rounded min-w-[15rem]" placeholder="Departamento" required>
                    </div>
                </div>
                <div class="px-5 flex-col flex gap-4">
                    <div>
                        <input name="inp_province_prac" type="text" class="text input-border-blue px-1 text-[.9rem] h-7 rounded min-w-[15rem]" placeholder="Provincia" required>
                    </div>
                    <div>
                        <input name="inp_district_prac" type="text" class="text input-border-blue px-1 text-[.9rem] h-7 rounded min-w-[15rem]" placeholder="Distrito" required>
                    </div>
                    <div>
                        <input name="inp_email_prac" type="email" class="text input-border-blue px-1 text-[.9rem] h-7 rounded min-w-[15rem]" placeholder="Correo Eletrónico" required>
                    </div>
                    <div>
                        <input name="inp_phone_prac" type="tel" class="text input-border-blue px-1 text-[.9rem] h-7 rounded min-w-[15rem]" placeholder="Celular" required>
                    </div>
                    <div>
                        <input name="inp_address_prac" type="text" class="text input-border-blue px-1 text-[.9rem] h-7 rounded min-w-[15rem]" placeholder="Dirección" required>
                    </div>
                    <div>
                        <select name="select_grado_prac" id="" class="text input-border-blue px-1 text-[.9rem] h-7 rounded min-w-[15rem]">
                            <option value="">Grado de Instrucción</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                            <option value="Superior">Superior</option>
                        </select>
                    </div>
                    <div>
                        <select name="select_estadocivil_prac" id="" class="text input-border-blue px-1 text-[.9rem] h-7 rounded min-w-[15rem]">
                            <option value="">Estado Civil</option>
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="Viudo">Viudo</option>
                            <option value="Divorciado">Divorciado</option>
                        </select>

                    </div>
                </div>
                <div class="px-3">
                    <h2 class="text-center">
                        <strong class="text-[#585858] text-[1rem]" style="font-weight: 500;">Para completar cree su Usuario y Contraseña</strong>
                    </h2>
                    <div class="flex items-center pt-5 justify-center">
                        <label for="" class="w-[30px]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="25">
                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M256 288c79.53 0 144-64.47 144-144s-64.47-144-144-144c-79.52 0-144 64.47-144 144S176.5 288 256 288zM351.1 320H160c-88.36 0-160 71.63-160 160c0 17.67 14.33 32 31.1 32H480c17.67 0 31.1-14.33 31.1-32C512 391.6 440.4 320 351.1 320z" />
                            </svg>
                        </label>
                        <input name="input_user_name" maxlength="8" type="text" class="text-[14px] input-border-blue mx-2 border-1 h-7 px-1 box-border rounded min-w-[200px] text-[#525252]" placeholder="Usuario(DNI)" required>
                    </div>
                    <div class="pt-5 justify-center flex">
                        <label for="" class="w-[30px]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="25">
                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M80 192V144C80 64.47 144.5 0 224 0C303.5 0 368 64.47 368 144V192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80zM144 192H304V144C304 99.82 268.2 64 224 64C179.8 64 144 99.82 144 144V192z" />
                            </svg>
                        </label>
                        <input name="input_password_user" type="password" class="text-[14px] input-border-blue mx-2 h-7 boder-1 px-1 box-border rounded min-w-[200px] text-[#525252]" placeholder="Contraseña" required>
                    </div>
                    <div class="pt-5 justify-center flex">
                        <label for="" class="w-[30px]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="25">
                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M80 192V144C80 64.47 144.5 0 224 0C303.5 0 368 64.47 368 144V192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80zM144 192H304V144C304 99.82 268.2 64 224 64C179.8 64 144 99.82 144 144V192z" />
                            </svg>
                        </label>
                        <input name="input_repassword_user" type="password" class="text-[14px] input-border-blue mx-2 h-7 boder-1 px-1 box-border rounded min-w-[200px] text-[#525252]" placeholder="Confirmar Contraseña" required>
                    </div>
                </div>

                <div class="pt-8 flex items-center w-full justify-center">
                    <button name="button_sendform_registerprac" type="submit" class="w-fit bg-blue-700 text-[#efefef] hover:text-white px-5 py-1 rounded">
                        <span>Registrarme</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

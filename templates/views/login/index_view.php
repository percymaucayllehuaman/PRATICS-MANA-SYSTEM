
<?php require_once INCLUDES."inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f5f5] h-screen">
    <div class="header-login-main px-5 py-0 w-full background-color-primary h-[100px] min-h-fit">
        <div class="flex box-border py-0 items-center h-full flex-row overflow-hidden">
            <div class="w-full h-full w-2/12 flex items-center min-w-fit">
                <img src="assets/images/logo_cetpro.png" alt="logo CETPRO" class="h-[90px] w-[80px]">
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
                            <?php echo SYSTEM_FULLNAME;?>
                    </strong>
                </div>
            </div>
            <div class="w-2/12 min-w-fit h-full">
                <div class="w-fit l-0 flex min-h-fit items-center h-full right-0 float-right">
                    <!-- <img src="assets/images/logo_cetpro.png" alt="" class="w-[40px] h-[45px]"> -->
                    <a href="registerpractitioner" class="text-xm bolder bg-green-900 text-[#efefef] px-2 py-1 mr-2 raidus-2 hover:bg-green-700 rounded">
                        Registrarme
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="28" height="30">
                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/>
                    </svg>
                </div>
            </div>
            
        </div>
    </div>
    <div class="w-full h-fit">
        <div class="container-login max-w-[350px] mx-auto h-fit py-5 min-h-fit">
            <?php echo Flasher::flash(); ?> 
            <form action="login/post_login" class="w-full py-5" method="post">
                <?php echo insert_inputs(); ?>
                <h2 class="text-center text-[20px]">
                    <strong class="" style="font-weight: 700;">Iniciar Sesión</strong>
                </h2>
                <div class="flex items-center pt-5 justify-center">
                    <label for="" class="w-[30px]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="25"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M256 288c79.53 0 144-64.47 144-144s-64.47-144-144-144c-79.52 0-144 64.47-144 144S176.5 288 256 288zM351.1 320H160c-88.36 0-160 71.63-160 160c0 17.67 14.33 32 31.1 32H480c17.67 0 31.1-14.33 31.1-32C512 391.6 440.4 320 351.1 320z"/>
                        </svg>
                    </label>
                    <input name="input-user-login" maxlength="8" type="text" class="text-[14px] input-border-blue mx-2 border-1 h-7 px-1 box-border rounded min-w-[200px] text-[#525252]" placeholder="Usuario" required>
                </div>
                <div class="pt-5 justify-center flex">
                    <label for="" class="w-[30px]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"  width="25"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M80 192V144C80 64.47 144.5 0 224 0C303.5 0 368 64.47 368 144V192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80zM144 192H304V144C304 99.82 268.2 64 224 64C179.8 64 144 99.82 144 144V192z"/>
                        </svg>
                    </label>
                    <input name="input-password-login" type="password" class="text-[14px] input-border-blue mx-2 h-7 boder-1 px-1 box-border rounded min-w-[200px] text-[#525252]" placeholder="Contraseña" required>
                </div>
                <div class="pt-8 flex items-center w-full justify-center">
                    <button name="button-send-form-login" type="submit" class="w-fit bg-blue-700 text-[#efefef] hover:text-white px-3 py-1 rounded">
                        <span>Iniciar Sesión</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

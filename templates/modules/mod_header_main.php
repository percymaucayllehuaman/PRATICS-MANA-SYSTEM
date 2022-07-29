
<div class="header-main px-5 py-0 w-full background-color-primary h-[80px] min-h-fit">
    <div class="flex box-border py-0 items-center h-full flex-row overflow-hidden">
        <div class="w-full h-full w-2/12 flex items-center min-w-fit">
            <?php
                echo "<img src='".ASSETS."images/logo_cetpro.png'"." alt='logo CETPRO' class='h-[70px] w-auto'>";
            ?>
        </div>
        <div class="w-8/12">
            <div class="w-full relative text-center text-lg min-h-fit pb-2">
                <strong class="text-[#ededed] text-xl">
                    CETPRO SAN JERÓNIMO
                </strong>
            </div>
            <div class="w-full relative text-center">
                <strong class="text-black text-xm leading-3">
                    Sistema de Seguimiento de Prácticas Profesionales
                </strong>
            </div>
        </div>
        <div class="w-2/12 min-w-fit h-full">
            <div class="w-fit l-0 flex min-h-fit items-center h-full right-0 float-right">
                <!-- <img src="assets/images/logo_cetpro.png" alt="" class="w-[40px] h-[45px]"> -->
                <a href="#" class="w-fit rounded-md border-inherit border flex px-2 py-1 items-center pd-3 boder-1 border-[#f2f2f2] hover:bg-[rgba(0,0,0,.1)] ">
                    <label for="" class="pr-2 text-white text-[.9rem]" style="font-weight: 500;">
                        <?php   
                            if(isset($_SESSION['USER-LOGIN'])){
                                if($_SESSION['USER-LOGIN']->user_type =="ADMIN"){
                                    echo ucfirst($_SESSION['USER-LOGIN']->user_type);
                                }else if($_SESSION['USER-LOGIN']->user_type =="DOCENTE" || $_SESSION['USER-LOGIN']->user_type =="ESTUDIANTE"){
                                   if($_SESSION['DATA-USER']){
                                        echo ucfirst(explode(" ",$_SESSION['DATA-USER']->nombres)[0]);
                                   }
                                }
                            }else{
                                echo "Manuel";   
                            }
                        ?>
                    </label>
                    <figure>
                        <img src="resources/user.png" width="40" height="40" alt="" class="bg-white rounded-full p-1">
                    </figure>
                </a>
                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="28" height="30">
                    <path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/>
                </svg> -->

                <!-- <a href="#" class="text-xm bolder bg-blue-900 text-[#efefef] px-2 py-1 ml-2 raidus-2 hover:bg-blue-700 rounded">
                    Cerrar Sesión
                </a> -->
            </div>
        </div>
        
    </div>
</div>
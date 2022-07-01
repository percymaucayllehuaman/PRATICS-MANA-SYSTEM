<?php require_once INCLUDES . "inc_head_html.php"; ?>

<div class="body-main w-full max-w-[1200px] mx-auto my-0 relative bg-[#f5f55] h-screen ">
   
    <?php require_once MODULES."mod_header_main.php"; ?>     
    

    <div class="w-full min-h-fit bg-transparent pt-2 flex " style="height: calc(100vh - 110px);">
        <?php require_once MODULES."mod_sidebar_admin.php"; ?>
        
        <div class="block bg-[#f3f3f3]" style="width: calc(100% - 200px); border-left:8px solid #ffffff;">
            <div class="main_panel_birth">
                <div class="container_search_birth_for w-full px-5 py-2 pb-1 block h-auto m-0 overflow-hidden box-border my-auto">
                    <form class="relative w-fit inline-block h-fit py-1" action="?" method="post">
                        <label class="block px-0.5 mx-0 w-fit float-left">
                            <style type="text/css">
                                .select_option_search_birth {
                                    outline: 1px solid #adadad;
                                    width: auto;
                                }

                                .select_option_search_birth option {
                                    zoom: 1.1;
                                    padding: 5px 0px;
                                    box-sizing: border-box;
                                    display: block;
                                }

                                .width_input_search_birth_ {
                                    width: calc((100vw - 220px) / 3);
                                    min-width: 200px;
                                }
                            </style>
                            <select name="select_option_search_birth" id="" class="text-sm bg-white focus:outline-none w-auto px-1 py-1 
                                rounded-md select_option_search_birth h-8 mx-1">
                                <option value="option_names_birth" selected class="option">Nombres</option>
                                <option value="option_number_document" class="option">Documento Identidad</option>
                            </select>
                        </label>
                        <label class="mx-0 relative w-fit float-left">
                            <input class="placeholder:normal placeholder:text-slate-400 block bg-white 
                            border border-slate-300 
                            py-1 pl-2 pr-2 shadow-sm 
                            focus:outline-none 
                            focus:border-sky-100 
                            focus:ring-sky-500 focus:ring-1 
                            width_input_search_birth_ 
                            text-sm 
                            h-8 
                            rounded-xl" placeholder="Buscar ..." type="text" name="input_search_birth" />
                        </label>
                        <label class="block w-fit float-left">
                            <button type="submit" class="mx-1 hover:bg-[#e8e8e8]  px-5 py-1 rounded-md bg-white h-8">
                                <!--rounded-full px-2 py-1 -->
                                <i class="fas fa-search"></i>
                            </button>
                        </label>
                        <div class="w-fit block float-left">
                            <a href="birth/register" class="bg-green-700 px-2 mx-3 py-1.5 hover:bg-green-800 rounded 
                            text-slate-50 h-8 block 
                            text-sm">
                                <i class="fas fa-plus px-1 py-1 flex-nowrap"></i>
                                Registrar Partida
                            </a>
                        </div>
                    </form>

                </div>
                <div class="container_results_list block w-full px-5 bottom max-h-screen overflow-auto w-10/12">
                    <div class="list_title_results w-12/12">
                        <div class="flex bg-[rgba(2,77,131,.95)] w-12/12 text-slate-100 justify-center center text-sm py-0.5 rounded-sm">
                            <label class="w-1/12 text-center px-0.5 py-0.5">#</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">Nombres</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">Primer Apellido</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">Segundo Apellido</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">DNI</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">Codigo</label>
                            <label class="w-1/12 text-center px-0.5 py-0.5">Print</label>
                            <label class="w-1/12 text-center px-0.5 py-0.5">Ver</label>
                            <label class="w-2/12 text-center px-0.5 py-0.5">Opciones</label>
                            <label class="w-1/12 text-center px-0.5 py-0.5">...</label>
                        </div>
                    </div>
                    <form action="" class="flex w-12/12 border-b hover:bg-slate-300 bg-[rgba(217,217,217,.5)] border-blue-400" method="post">
                        <label name="order_num_item_birth" class="w-1/12 text-[14px] px-0.5 py-1 text-slate-800 text-center">1</label>
                        <input name="name_birth_res" class="w-2/12 text-[14px] px-0.5 py-1 text-slate-800 outline-none bg-transparent" value="Jose Luis" readonly/>
                        <input name="lastname_first_res" class="w-2/12 text-[14px] px-0.5 py-1 text-slate-800 outline-none bg-transparent" value="Flores" readonly/>
                        <input name="lastname_second_res" class="w-2/12 text-[14px] px-0.5 py-1 text-slate-800 outline-none bg-transparent" value="Damiano" readonly/>
                        <input name="dni_birth_res" class="w-2/12 text-[14px] px-0.5 py-1 text-slate-800 outline-none bg-transparent" value="20501429" readonly/>
                        <input name="code_birth_res" class="w-2/12 text-[14px] px-0.5 py-1 text-slate-800 outline-none bg-transparent" value="N-1996-51" readonly/>
                        <label name="" class="w-1/12 text-[14px] px-0.5 py-1 text-slate-800 text-center">
                            <i class="fas fa-print text-[16px]"></i> <!--print-->
                        </label>
                        <label class="w-1/12 text-[14px] px-0.5 py-0.5 text-slate-800 text-center">
                            <a href="http://google.com" target="_blank"> <!--swatch-->
                                <i class="fas fa-eye"></i>    
                            </a>
                        </label>
                        <label class="w-2/12 text-[14px] px-0.5 py-0.5 text-slate-800 text-center">
                            <button name="button_delete_birth_res">     <!--button delete-->
                                <i class="fas fa-trash-alt px-2 py-1"></i>
                            </button>
                            <button name="button_edit_birth_res">   <!--button edith-->
                                <i class="fas fa-pen px-2 py-1"></i>
                            </button>
                        </label>
                        <label class="w-1/12 text-[13px] px-0.5 py-1 text-slate-800 min-w-fit">
                            <button name="button_rectifier_birth_res  overflow-hidden" class="" type="submit">       <!--button rectify-->
                                Rectificar
                            </button>
                        </label>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>

    <?php require_once INCLUDES . "inc_footer.php"; ?>
    

</div>


<?php require_once INCLUDES . "inc_footer_html.php"; ?>
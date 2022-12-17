
  <nav class="menu-student-main w-[250px] float-left overflow-auto">
      <ul class="w-full flex-column overflow-auto max-width-1200">
          <li class="w-full block m-0 p-0">
              <a href="<?php echo BASEPATH.'teacherempresa'; ?>" class="module_link_student w-full flex items-center gap-2 px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER=='teacherempresa'){echo 'bg-[rgba(2,77,131,1)]';}?> <?php if(CONTROLLER==''){echo '';} ?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                <span class="flex items-center pl-2" style="width: 40px;">
                    <i class="fa-solid fa-list-check text-[1.5rem] "></i>
                </span>  
                <span class="flex items-center" style="font-weight: 500;">    
                    Validar Empresa
                </span>    
              </a>
          </li>
          <li>
              <a href="<?php echo BASEPATH.'teacherppp'; ?>" class="module_link_student w-full flex items-center gap-2 px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER=='teacherppp'){echo 'bg-[rgba(2,77,131,1)]';}?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                <span class="flex items-center pl-2" style="width: 40px;">  
                    <i class="fa-solid fa-check-to-slot text-[1.5rem] "></i>
                </span>  
                <span class="flex items-center" style="font-weight: 500;">  
                    Aceptar PPP
                </span>  
              </a>
          </li>
          <li>
              <a href="<?php echo BASEPATH.'teacherasistencia'; ?>" class="module_link_student w-full flex items-center gap-2 px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER=='teacherasistencia'){echo 'bg-[rgba(2,77,131,1)]';}?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                <span class="flex items-center pl-2" style="width: 40px;">  
                    <i class="fa-regular fa-calendar-check text-[1.5rem]"></i>
                    <!-- <i class="fa-solid fa-clipboard-user text-[1.5rem]"></i> -->
                </span>  
                <span class="flex items-center" style="font-weight: 500;">  
                    Asistencia/actividad
                </span>    
              </a>
          </li>
          <li>
              <a href="<?php echo BASEPATH.'teachervisitas'; ?>" class="module_link_student w-full flex items-center gap-2 px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER=='teachervisitas'){echo 'bg-[rgba(2,77,131,1)]';}?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                <span class="flex items-center pl-2" style="width: 40px;">  
                    <i class="fa-solid fa-eye text-[1.5rem]" ></i> 
                </span>  
                <span style="font-weight: 500;">
                    Visitas/supervisión
                </span>    
              </a>
          </li>
          <li>              
            <a href="<?php echo BASEPATH.'teacherdocuments'; ?>" class="module_link_student w-full gap-2 flex items-center px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER=='teacherdocuments'){echo 'bg-[rgba(2,77,131,1)]';}?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                <span class="flex items-center pl-2" style="width: 40px;"> 
                    <i class="fa-solid fa-file-circle-check text-[1.5rem]"></i>
                </span>  
                <span style="font-weight: 500;">
                        Validar Documentos
                </span>        
            </a>
          </li>
          <li>
              <a href="<?php echo BASEPATH.'teacherdata'; ?>" class="module_link_student w-full flex items-center gap-2 px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER=='teacherdata'){echo 'bg-[rgba(2,77,131,1)]';}?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                <span class="flex items-center pl-2" style="width: 40px;"> 
                    <i class="fa-solid fa-circle-info text-[1.5rem]"></i>
                </span>  
                <span style="font-weight: 500;">
                    Mis Datos
                </span>    
              </a>
          </li>
          <li>
              <a href="<?php echo BASEPATH.'teacherlogout'; ?>" class="module_link_student w-full flex items-center gap-2 px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER=='teacherlogout'){echo 'bg-[rgba(2,77,131,1)]';}?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                <span class="flex items-center pl-2" style="width: 40px;"> 
                    <i class="fa-solid fa-power-off text-[1.5rem]"></i>
                </span>  
                <span style="font-weight: 500;">
                    Cerrar Sesión
                </span>    
              </a>
          </li>
      </ul>
  </nav>
  
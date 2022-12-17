
  <nav class="menu-student-main w-[250px] float-left overflow-auto">
      <ul class="w-full flex-column overflow-auto max-width-1200">
          <li class="w-full block m-0 p-0">
              <a href="<?php echo BASEPATH.'practitionerempresa'; ?>" class="module_link_student  w-full flex items-center gap-2 px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER == 'practitionerempresa'){echo 'bg-[rgba(2,77,131,1)]';}?> " style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                <span class="flex items-center px-2" style="width: 40px;"> 
                    <i class="fa-solid fa-table-list text-[1.5rem]"></i>
                </span>  
                <span style="font-weight: 500;">
                    Empresa
                </span> 
              </a>
          </li>
          <li>
            <a href="<?php echo BASEPATH.'practitionersolicitud'; ?>" class="module_link_student w-full flex items-center gap-2 px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER == 'practitionersolicitud'){echo 'bg-[rgba(2,77,131,1)]';}?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                <span class="flex items-center px-2" style="width: 40px;"> 
                    <i class="fa-solid fa-square-arrow-up-right text-[1.5rem]"></i>
                </span>  
                <span style="font-weight: 500;">
                    Solicutud PPP
                </span> 
            </a>
          </li>
          <li>
              <a href="<?php echo BASEPATH.'practitionervisitas'; ?>" class="module_link_student w-full flex items-center gap-2 px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER == 'practitionervisitas'){echo 'bg-[rgba(2,77,131,1)]';}?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                <span class="flex items-center px-2" style="width: 40px;"> 
                    <i class="fa-solid fa-eye text-[1.5rem]" ></i>
                </span>  
                <span style="font-weight: 500;">
                    Visitas/Supervisión
                </span>
              </a>
          </li>
          <li>
            <a href="<?php echo BASEPATH.'practitionerasistencia'; ?>" class="module_link_student w-full flex items-center gap-2 px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER == 'practitionerasistencia'){echo 'bg-[rgba(2,77,131,1)]';}?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                  <span class="flex items-center px-2" style="width: 40px;"> 
                    <i class="fa-regular fa-calendar-check text-[1.5rem]"></i>
                </span>  
                <span style="font-weight: 500;">
                    Asistencia/Actividad
                </span>
              </a>
          </li>
          <li>
              <a href="<?php echo BASEPATH.'practitionerdocuments'; ?>" class="module_link_student w-full flex items-center gap-2 px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER == 'practitionerdocuments'){echo 'bg-[rgba(2,77,131,1)]';}?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                  <span class="flex items-center px-2" style="width: 40px;"> 
                    <i class="fa-solid fa-upload text-[1.5rem]"></i>
                </span>  
                <span style="font-weight: 500;">
                    Cargar Documentos
                </span>
              </a>
          </li>
          <li>
              <a href="<?php echo BASEPATH.'practitionerformatos'; ?>" class="module_link_student w-full flex items-center gap-2 px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER == 'practitionerformatos'){echo 'bg-[rgba(2,77,131,1)]';}?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                  <span class="flex items-center px-2" style="width: 40px;"> 
                    <i class="fa-solid fa-file-circle-check text-[1.5rem]"></i>
                </span>  
                <span style="font-weight: 500;">
                    Formato Documentos
                </span>
              </a>
          </li>
          <li>
              <a href="<?php echo BASEPATH.'practitionerdata'; ?>" class="module_link_student w-full flex items-center gap-2 px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER == 'practitionerdata'){echo 'bg-[rgba(2,77,131,1)]';}?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                  <span class="flex items-center px-2" style="width: 40px;"> 
                    <i class="fa-solid fa-circle-info text-[1.5rem]"></i>
                </span>  
                <span style="font-weight: 500;">
                    Mis Datos
                </span>
              </a>
          </li>
          <li>
              <a href="<?php echo BASEPATH.'practitionerlogout'; ?>" class="module_link_student w-full flex items-center gap-2 px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER == 'practitionerlogout'){echo 'bg-[rgba(2,77,131,1)]';}?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                  <span class="flex items-center px-2" style="width: 40px;"> 
                    <i class="fa-solid fa-power-off text-[1.5rem]"></i>
                </span>  
                <span style="font-weight: 500;">
                    Cerrar Sesión
                </span>
              </a>
          </li>
      </ul>
  </nav>
  
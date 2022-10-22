
  <nav class="menu-student-main w-[200px] float-left overflow-auto">
      <ul class="w-full flex-column overflow-auto max-width-1200">
          <li class="w-full block m-0 p-0">
              <a href="<?php echo BASEPATH.'admindocentes'; ?>" class="module_link_student w-full px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER=='admindocentes'){echo 'bg-[rgba(2,77,131,1)]';} ?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                  Docentes
              </a>
          </li>
          <li>
              <a href="<?php echo BASEPATH.'adminconvenios'; ?>" class="module_link_student w-full px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER=='adminconvenios'){echo 'bg-[rgba(2,77,131,1)]';} ?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                  Convenios
              </a>
          </li>
          <li>
              <a href="<?php echo BASEPATH.'adminespecialidad'; ?>" class="module_link_student w-full px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER=='adminespecialidad'){echo 'bg-[rgba(2,77,131,1)]';} ?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                  Especialidad/Módulo
              </a>
          </li>
          <li>
              <a href="<?php echo BASEPATH.'admindata'; ?>" class="module_link_student w-full px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER=='admindata'){echo 'bg-[rgba(2,77,131,1)]';} ?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                  Mis Datos
              </a>
          </li>
          <li>
              <a href="<?php echo BASEPATH.'adminlogout'; ?>" class="module_link_student w-full px-2 box-border block py-3 hover:text-[#f3f3f3] hover:bg-[rgba(2,77,131,1)] background-color-primary text-[#f2f2f2] <?php if(CONTROLLER=='adminlogout'){echo 'bg-[rgba(2,77,131,1)]';} ?>" style="font-weight: 500; letter-spacing:.04rem; border-bottom: 2px solid #f5f5f5;">
                  Cerrar Sesión
              </a>
          </li>
      </ul>
  </nav>
  
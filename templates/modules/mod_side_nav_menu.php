
<div class="sidebar_left">
    <nav class="nav_left_main">
        <ul class="ul">
            <li class="li_items">
                <a class="a-items birth <?php if(CONTROLLER == 'birth'){echo 'active_module';} ?>" href="<?php echo BASEPATH.'birth'; ?>">
                    <span class="icon_module_name">
                        <i class="fas fa-baby"></i>
                    </span>
                    <span class="module_name">
                        Nacimiento
                    </span>
                </a>
            </li>
            <li class="li_items">
                <a class="a-items marriage <?php if(CONTROLLER == 'marriage'){echo 'active_module';} ?>" href="<?php echo BASEPATH.'marriage'; ?>">
                    <span class="icon_module_name">
                        <!-- <i class="fas fa-rings-wedding">.:.</i> -->
                        <i class="fas fa-restroom"></i>
                    </span>
                    <span class="module_name">
                        Matrimonio
                    </span>
                </a>
            </li>
            <li class="li_items">
                <a class="a-items death <?php if(CONTROLLER == 'death'){echo 'active_module';} ?>" href="<?php echo BASEPATH.'death'; ?>">
                    <span class="icon_module_name">
                        <!-- <i class="fas fa-coffin">.:.</i> -->
                        <i class="fas fa-user-alt-slash"></i>
                        <!-- <i class="fas fa-book-dead"></i> -->
                    </span>
                    <span class="module_name">
                        Defunción
                    </span>
                </a>
            </li>
            <li class="li_items">
                <a class="a-items users <?php if(CONTROLLER == 'users'){echo 'active_module';} ?>" href="<?php echo BASEPATH.'users'; ?>">
                    <span class="icon_module_name">
                        <i class="fas fa-users"></i>
                    </span>
                    <span class="module_name">
                        Usuarios
                    </span>
                </a>
            </li>
            <li class="li_items">
                <a class="a-items profile <?php if(CONTROLLER == 'profile'){echo 'active_module';} ?>" href="<?php echo BASEPATH.'profile'; ?>">
                    <span class="icon_module_name">
                        <i class="fas fa-address-card"></i>
                    </span>
                    <span class="module_name">
                        Mi perfil
                    </span>
                </a>
            </li>
            <li class="li_items">
                <a class="a-items setting <?php if(CONTROLLER == 'setting'){echo 'active_module';} ?>" href="<?php echo BASEPATH.'setting'; ?>">
                    <span class="icon_module_name">
                        <i class="fas fa-cogs"></i>
                    </span>
                    <span class="module_name">
                        Configuración
                    </span>
                </a>
            </li>
            <li class="li_items">
                <a class="a-items logout <?php if(CONTROLLER == 'logout'){echo 'active_module';} ?>" href="<?php echo BASEPATH.'logout/logout'; ?>">
                    <span class="icon_module_name">
                        <i class="fas fa-power-off"></i>
                    </span>
                    <span class="module_name">
                        Cerrar Sesión
                    </span>
                </a>
            </li>
        </ul>
    </nav>
</div>
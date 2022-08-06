<!-- [ Layout sidenav ] Start -->
<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-dark">
    <!-- Brand demo (see assets/css/demo/demo.css) -->
    <div class="app-brand demo">
        <span class="app-brand-logo demo">
            <img src="<?=base_url('assets/images/')?>logo.png" alt="Brand Logo" width="30" class="img-fluid">
        </span>
        <a href="#" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Kader PKS</a>
        <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
        </a>
    </div>
    <div class="sidenav-divider mt-0"></div>

    <!-- Links -->
    <ul class="sidenav-inner py-1">

        <!-- QUERY dari menu -->

        <?php 
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`, `menu`
        FROM `user_menu` JOIN `user_access_menu` 
        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
        WHERE `user_access_menu`.`role_id` = $role_id
        ORDER BY `user_access_menu`.`menu_id` ASC ";
        $menu = $this->db->query($queryMenu)->result_array();
        ?>


        <!-- LOOPING MENU -->
        <?php foreach ($menu as $m):?>
            <!-- Heading -->
            <li class="sidenav-header small font-weight-semibold"><?= $m['menu'] ?></li>

            <!-- SIAPKAN SUB MENU SESUAI MENU -->

            <?php
            $menuId = $m['id'];  
            $querySubMenu = "SELECT *
            FROM `user_sub_menu` JOIN `user_menu` 
            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
            WHERE `user_sub_menu`.`menu_id` = $menuId 
            AND `user_sub_menu`.`is_active` = 1";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

            <?php foreach ($subMenu as $sm) :?>
                <?php if ($title == $sm['title']):?>
                    <li class="sidenav-item active">
                        <?php else :  ?>
                            <li class="sidenav-item">
                            <?php endif ?>
                            <a href="<?=base_url($sm['url']);?>" class="sidenav-link">
                                <i class="sidenav-icon feather <?= $sm['icon'];?>"></i>
                                <div><?= $sm['title'] ;?></div>
                            </a>
                        </li>
                    <?php endforeach ?>
                    <li class="sidenav-divider mb-1"></li>
                <?php endforeach ?>

                <!-- UI elements -->
                <!-- <li class="sidenav-item">
                    <a href="javascript:" class="sidenav-link sidenav-toggle">
                        <i class="sidenav-icon feather icon-box"></i>
                        <div>UI components</div>
                    </a>
                    <ul class="sidenav-menu">
                        <li class="sidenav-item">
                            <a href="bui_alert.html" class="sidenav-link">
                                <div>Alerts</div>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="bui_badges.html" class="sidenav-link">
                                <div>Badges</div>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="bui_button.html" class="sidenav-link">
                                <div>Buttons</div>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="charts_morrisjs.html" class="sidenav-link">
                                <div>Charts</div>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="bui_dropdowns.html" class="sidenav-link">
                                <div>Dropdowns</div>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="bui_pagination.html" class="sidenav-link">
                                <div>Pagination and breadcrumbs</div>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="bui_progress.html" class="sidenav-link">
                                <div>Progress bars</div>
                            </a>
                        </li>

                    </ul>
                </li> -->

                <!-- Forms & Tables -->
        <!-- <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">Forms & Tables</li>
        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-clipboard"></i>
                <div>Forms</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="forms_layouts.html" class="sidenav-link">
                        <div>Layouts and elements</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="forms_input-groups.html" class="sidenav-link">
                        <div>Input groups</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidenav-item">
            <a href="tables_bootstrap.html" class="sidenav-link">
                <i class="sidenav-icon feather icon-grid"></i>
                <div>Tables</div>
            </a>
        </li> -->

        <!--  Icons -->
        <!-- <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">Icons</li>
        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-feather"></i>
                <div>Icons</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="icons_feather.html" class="sidenav-link">
                        <div>Feather</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="icons_linearicons.html" class="sidenav-link">
                        <div>Linearicons</div>
                    </a>
                </li>
            </ul>
        </li> -->

        <!-- Pages -->
        <!-- <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">Pages</li>
        <li class="sidenav-item">
            <a href="pages_authentication_login-v1.html" class="sidenav-link">
                <i class="sidenav-icon feather icon-lock"></i>
                <div>Login</div>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="pages_authentication_register-v1.html" class="sidenav-link">
                <i class="sidenav-icon feather icon-user"></i>
                <div>Signup</div>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="pages_faq.html" class="sidenav-link">
                <i class="sidenav-icon feather icon-anchor"></i>
                <div>FAQ</div>
            </a>
        </li> -->
    </ul>
</div>
<!-- [ Layout sidenav ] End -->
<!-- [ Layout container ] Start -->
<div class="layout-container">
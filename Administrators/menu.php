<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="img/avatar3.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Hello,<?php echo $FullName; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php
        $parts = explode('/', $_SERVER["SCRIPT_NAME"]);
        $file = $parts[count($parts) - 1];
        ?>
        <?php
        $page = empty($_GET['gpage']) ? '' : $_GET['gpage'];
        $getCountry = empty($_GET['cuntry']) ? '' : $_GET['cuntry'];
        ?>
        <ul class="sidebar-menu">
            <li>
                <a href="dashboard.php?gpage=home" <?php if ($page == "home") { ?>class="actv"<?php } ?>>
                    <i class="fa fa-pencil-square-o"></i><span>Main Menu</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php?gpage=media" <?php if ($page == "media") { ?>class="actv"<?php } ?>>
                    <i class="fa fa-picture-o" aria-hidden="true"></i> <span>Media files</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php?gpage=new" <?php if ($page == "new") { ?>class="actv"<?php } ?>>
                    <i class="fa fa-file"></i> <span>News</span>
                </a>
            </li>
            <li>
                <a  href="r-refurbished.php?_type=f" <?php if ($file == "r-refurbished.php") { ?>class="actv"<?php } ?>>
                    <i class="fa fa-plus"></i> <span>Refurbished</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php?gpage=slider" <?php if ($page == "slider") { ?>class="actv"<?php } ?>>
                    <i class="fa fa-picture-o"></i> <span>Front page gallery</span>
                </a>
            </li>
            <li class="treeview <?php if ($page == "lng") { ?>active<?php } ?>">
                <a href="#">
                    <i class="fa fa-language"></i>
                    <span>Title Product language</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="dashboard.php?gpage=lng&cuntry=en" <?php if ($getCountry == "en") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i> United Kingdom
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?gpage=lng&cuntry=th" <?php if ($getCountry == "th") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i> Thailand
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?gpage=lng&cuntry=la" <?php if ($getCountry == "la") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i> Laos
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?gpage=lng&cuntry=mm" <?php if ($getCountry == "mm") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i> Myanmar
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?gpage=lng&cuntry=pk" <?php if ($getCountry == "pk") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i> Pakistan
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?gpage=lng&cuntry=sa" <?php if ($getCountry == "sa") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i> Saudi Arabia
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?gpage=lng&cuntry=bd" <?php if ($getCountry == "bd") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i> Bangladesh
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?gpage=lng&cuntry=ir" <?php if ($getCountry == "ir") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i> Iran
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?gpage=lng&cuntry=vn" <?php if ($getCountry == "vn") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i> Vietnam
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?gpage=lng&cuntry=id" <?php if ($getCountry == "id") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i> Indonesia
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?gpage=lng&cuntry=ru" <?php if ($getCountry == "ru") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i> Russia
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="about-page.php?tab_status=tb-com-pro&language=EN"  class="<?php if ($file == "about-page.php") { ?>actv<?php } ?>">
                    <i class="fa fa-cogs"></i>
                    <span>About page</span>
                </a>

            </li>
            </li>
            <?php
            if ($file == "f-disk-driers.php" || $file == "f-howtochoose.php" || $file == "f-twin_screw_presses.php" || $file == "f-fishcooker.php" || $file == "f-complete_fishmeal.php" || $file == "f-deodoriser-smell.php" || $file == "f-energy_saving.php" || $file == "f-accessories.php") {
                $active = "active";
            }
            ?>
            <li class="treeview <?php echo empty($active) ? '' : $active; ?>">
                <a href="#">
                    <i class="fa fa-gear"></i>
                    <span>Fishmeal Plants</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="f-disk-driers.php" <?php if ($file == "f-disk-driers.php") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i>Disk Driers</a>
                    </li>
                    <li><a href="f-howtochoose.php" <?php if ($file == "f-howtochoose.php") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i>How to choose a Fishmeal</a>
                    </li>
                    <li><a href="f-twin_screw_presses.php" <?php if ($file == "f-twin_screw_presses.php") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i>Twin Screw Presses</a>
                    </li>
                    <li><a href="f-fishcooker.php" <?php if ($file == "f-fishcooker.php") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i>Fish cooker</a>
                    </li>
                    <li><a href="f-complete_fishmeal.php" <?php if ($file == "f-complete_fishmeal.php") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i>Complete fishmeal</a>
                    </li>
                    <li><a href="f-deodoriser-smell.php" <?php if ($file == "f-deodoriser-smell.php") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i>Deodorizer Smell Removal</a>
                    </li>
                    <li><a href="f-energy_saving.php?tab_status=tb-energy&language=EN" <?php if ($file == "f-energy_saving.php") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i>Energy Saving</a>
                    </li>
                    <li><a href="f-accessories.php" <?php if ($file == "f-accessories.php") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i>Accessories Equipment</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="dashboard.php?gpage=gallery" <?php if ($page == "gallery") { ?>class="actv"<?php } ?>>
                    <i class="fa fa-picture-o"></i> <span>Photo gallery</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php?gpage=faq" <?php if ($page == "faq") { ?>class="actv"<?php } ?>>
                    <i class="fa fa-question-circle"></i> <span>FAQ</span>
                </a>
            </li>
            <li>
                <a href="contact-page.php" class="<?php if ($file == "contact-page.php") { ?>actv<?php } ?>">
                    <i class="fa fa-envelope"></i><span>Contact us</span>
                </a>
            </li>
            <li class="treeview <?php if ($page == "user") { ?>active<?php } ?>">
                <a href="#">
                    <i class="fa fa-gear"></i>
                    <span>Setting</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="dashboard.php?gpage=user" <?php if ($page == "user") { ?>class="act"<?php } ?>>
                            <i class="fa fa-angle-double-right"></i><i class="fa fa-user"></i>User</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="dashboard.php?gpage=subscribe" <?php if ($page == "subscribe") { ?>class="actv"<?php } ?>>
                    <i class="fa fa-envelope"></i> <span>E-Mail Subscribe</span>
                </a>
            </li>
            <li>
                <a href="index.php?l=Y">
                    <i class="fa fa-power-off"></i> <span>Log out</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

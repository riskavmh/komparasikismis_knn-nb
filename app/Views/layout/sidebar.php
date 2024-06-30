<div class="nav-left-sidebar sidebar-light">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">

                    <!--  -->
                    <li class="nav-divider">
                        Menu
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link <?= ($active=='dashboard')?"active":""; ?>" href="<?=base_url('');?>"><i class="fa fa-fw fa-bullseye"></i>Dashboard</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?= ($active=='training')?"active":""; ?>" href="<?=base_url('training');?>"><i class="fa fa-fw fa-file-alt"></i>Data Training</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?= ($active=='testing')?"active":""; ?>" href="<?=base_url('testing');?>"><i class="fa fa-fw fa-clipboard"></i>Data Testing</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?= ($collapse=='uji')?'active':''; ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-vials"></i>Uji Data</a>
                        <div id="submenu-2" class="<?= ($collapse=='uji')?'':'collapse'; ?> submenu bg-light" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link <?= ($active=='knn')?'active':''; ?>" href="<?=base_url('knn');?>">K-Nearest Neighbor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= ($active=='nbc')?'active':''; ?>" href="<?=base_url('nbc');?>">Naive Bayes Classifier</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!--  -->
                    <!-- <li class="nav-divider">
                        Lainnya
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> Pengaturan </a>
                        <div id="submenu-6" class="collapse submenu bg-light" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/blank-page.html">Blank Page</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/blank-page-header.html">Blank Page Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/login.html">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/404-page.html">404 page</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/sign-up.html">Sign up Page</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/forgot-password.html">Forgot Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/pricing.html">Pricing Tables</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/timeline.html">Timeline</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/calendar.html">Calendar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/sortable-nestable-lists.html">Sortable/Nestable List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/widgets.html">Widgets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/media-object.html">Media Objects</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/cropper-image.html">Cropper</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/color-picker.html">Color Picker</a>
                                </li>
                                
                            </ul>
                        </div>
                    </li> -->
                </ul>
            </div>
        </nav>
</div>
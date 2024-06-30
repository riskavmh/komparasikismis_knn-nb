<!-- ============================================================== -->
<!-- navbar -->
<!-- ============================================================== -->
<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="">
            <!-- <img class="logo-img" src="<?=base_url('assets');?>/images/logo.jpg" alt="logo" width="40"> -->
            <span class="teks-hijau" style="margin-left:5px; color: #442B15; zoom:55%;">Komparasi Jenis Kismis</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- <img src="<?php //echo ($user['level'] == "1") ? base_url('assets/images/user1.jpg') : (($user['level'] == "2") ? base_url('assets/images/user2.jpg') : base_url('assets/images/user3.jpg'));?>" alt="User Avatar" class="rounded-circle user-avatar-md"> -->
                        <!-- <img src="<?= base_url('assets/images/user2.jpg'); ?>" alt="User Avatar" class="rounded-circle user-avatar-md"> -->
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        <?php //foreach ($user as $u) { dd($user)?>
                        <div class="nav-user-info bg-white">
                            <h5 class="mb-0 nav-user-name">
                                <?php echo $user['username'] ?>                            
                            </h5>
                            <span class="status"></span><span class="ml-2 text-muted"><?php echo $user['nama'] ?></span>
                        </div>
                        <?php //} ?>
                        <!-- <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a> -->
                        <!-- <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a> -->
                        <a class="dropdown-item" href="<?=base_url('logout')?>"><i class="fas fa-power-off mr-2"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- ============================================================== -->
<!-- end navbar -->
<!-- ==============================================================
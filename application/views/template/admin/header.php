<div class="content-page">



    <div class="content">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topbar-right-menu float-right mb-0">



                <?php if ($this->session->userdata('hak_akses') == '1') { ?>
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-bell noti-icon"></i>
                            <span class="noti-icon-badge"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-right">

                                    </span>Notification
                                </h5>
                            </div>

                            <div style="max-height: 230px;" data-simplebar>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">1 min ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info">
                                        <i class="mdi mdi-account-plus"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="text-muted">5 hours ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="<?= base_url() ?>assets/template/assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" />
                                    </div>
                                    <p class="notify-details">Cristina Pride</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Hi, How are you? What about our next meeting</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">4 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="<?= base_url() ?>assets/template/assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" />
                                    </div>
                                    <p class="notify-details">Karen Robinson</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Wow ! this admin looks good and awesome design</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info">
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked
                                        <b>Admin</b>
                                        <small class="text-muted">13 days ago</small>
                                    </p>
                                </a>
                            </div>

                            <!-- All-->
                            <a href="<?= base_url('pesan') ?>" class="dropdown-item text-center text-primary notify-item notify-all">
                                View All
                            </a>

                        </div>
                    </li>
                <?php } ?>


                <li class="dropdown notification-list">
                    <?php if (
                        $this->session->userdata('hak_akses') == '1' || $this->session->userdata('hak_akses') == '2'
                    ) { ?>
                        <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                            <!-- <span class="account-user-avatar">
                                <div class="avatar-md">
                                    <span class="avatar-title bg-success rounded-circle">
                                        md
                                    </span>
                                </div>
                            </span> -->
                            <span class="account-user-avatar">

                                <!-- <div class="avatar-md" style="width: 55px; height: 55px;">
                                    <span class="avatar-title bg-success rounded-circle" alt="user-image">
                                        <?php
                                        $nama_lengkap = $this->session->userdata('nama');
                                        $nama_parts = explode(" ", $nama_lengkap);
                                        $nama_depan = $nama_parts[0]; // Nama depan
                                        $nama_belakang = isset($nama_parts[1]) ? $nama_parts[1] : ''; // Nama belakang, jika ada

                                        // Mengambil karakter pertama dari nama depan dan nama belakang
                                        $inisial_depan = substr($nama_depan, 0, 1); // Karakter pertama dari nama depan
                                        $inisial_belakang = substr($nama_belakang, 0, 1); // Karakter pertama dari nama belakang

                                        ?>

                                        <span id="firstName"> <?= $inisial_depan[0] ?></span>
                                        <?php if ($inisial_belakang == null) { ?>
                                            <span id="lastName" hidden><?= $inisial_belakang[0] ?></span>
                                        <?php } else { ?>
                                            <span id="lastName"><?= $inisial_belakang ?></span>
                                        <?php } ?>
                                    </span>
                                </div> -->
                                <div class="avatar-xs">
                                    <span class="avatar-title bg-success rounded-circle" style="padding: 16px;">
                                        <?php

                                        $nama_lengkap = $this->session->userdata('nama');
                                        $nama_parts = explode(" ", $nama_lengkap);
                                        $nama_depan = $nama_parts[0]; // Nama depan
                                        $nama_belakang = isset($nama_parts[1]) ? $nama_parts[1] : ''; // Nama belakang, jika ada

                                        // Mengambil karakter pertama dari nama depan dan nama belakang
                                        $inisial_depan = substr($nama_depan, 0, 1); // Karakter pertama dari nama depan
                                        $inisial_belakang = substr($nama_belakang, 0, 1); // Karakter pertama dari nama belakang

                                        ?>

                                        <span id="firstName"> <?= $inisial_depan[0] ?></span>
                                        <?php if ($inisial_belakang == null) { ?>
                                            <span id="lastName" hidden><?= $inisial_belakang[0] ?></span>
                                        <?php } else { ?>
                                            <span id="lastName"><?= $inisial_belakang ?></span>
                                        <?php } ?>
                                    </span>
                                </div>
                                <!-- <img src="<?= base_url() ?>assets/template/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle"> -->
                            </span>
                        <?php } ?>

                        <?php if (
                            $this->session->userdata('hak_akses') == '1'
                        ) { ?>
                            <span>
                                <span class="account-user-name"><?=
                                                                $this->session->userdata('nama');
                                                                ?></span>
                                <span class="account-position">ADMINISTRATOR</span>
                            </span>

                        <?php } ?>

                        <?php if (
                            $this->session->userdata('hak_akses') == '2'
                        ) { ?>
                            <span>
                                <span class="account-user-name"><?=
                                                                $this->session->userdata('nama');
                                                                ?></span>
                                <span class="account-position">KURIKULUM</span>
                            </span>

                        <?php } ?>
                        </a>



                        <?php if (
                            $this->session->userdata('hak_akses') == '3'
                        ) { ?>
                            <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="<?= base_url() ?>assets/template/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                </span>
                                <span>
                                    <span class="account-user-name"><?= $this->session->userdata('nama'); ?></span>
                                    <span class="account-position">Guru Mata Pelajaran</span>
                                </span>
                            </a>
                        <?php } ?>


                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="<?= base_url('profil') ?>" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-circle mr-1"></i>
                                <span>Akun Saya</span>
                            </a>

                            <!-- item-->
                            <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-edit mr-1"></i>
                            <span>Settings</span>
                        </a> -->

                            <!-- item-->
                            <a href="<?= base_url('logout') ?>" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout mr-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                </li>

            </ul>
            <button class="button-menu-mobile open-left disable-btn">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="app-search dropdown d-none d-lg-block">
                <form>
                    <div class="input-group">
                        <h4 class="text-solid">e-Schedule</h4>
                    </div>
                </form>

            </div>
        </div>
        <!-- end Topbar -->
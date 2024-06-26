<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <!-- LOGO -->
        <a href="<?= base_url('dashboard') ?>" class="logo text-center logo-light">
            <span class="logo-lg">
                <h1>e-Schedule SMA</h1>
                <!-- <img src="<?= base_url() ?>assets/template/assets/images/logo.png" alt="" height="16"> -->
            </span>
            <span class="logo-sm">
                <h1>e-Schedule SMA</h1>

                <!-- <img src="<?= base_url() ?>assets/template/assets/images/logo_sm.png" alt="" height="16"> -->
            </span>
        </a>

        <!-- LOGO -->
        <a href="<?= base_url('dashboard') ?>" class="logo text-center logo-dark">
            <span class="logo-lg">
                <h1>e-Schedule SMA</h1>

                <!-- <img src="<?= base_url() ?>assets/template/assets/images/logo-dark.png" alt="" height="16"> -->
            </span>
            <span class="logo-sm">
                <h1>e-Schedule SMA</h1>

                <!-- <img src="<?= base_url() ?>assets/template/assets/images/logo_sm_dark.png" alt="" height="16"> -->
            </span>
        </a>

        <div class="h-100" id="left-side-menu-container" data-simplebar>

            <?php if (
                $this->session->userdata('hak_akses') == '1' ||
                $this->session->userdata('hak_akses') == '2'
            ) { ?>
                <center>
                    <div class="avatar-md mt-2 mb-3">
                        <span class="avatar-title bg-success text-black font-20 rounded-circle">
                            <!-- <?php
                                    $nama = $this->session->userdata('nama');
                                    $nama = explode(" ", $nama);
                                    $nama_sisa = implode(" ", array_slice($nama, 1));
                                    ?> -->


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
                </center>
            <?php } ?>

            <?php if (
                $this->session->userdata('hak_akses') == '3'
            ) { ?>
                <center>
                    <div class="avatar-md mt-2 mb-3">
                        <span class="avatar-title bg-success-lighten text-black font-20 rounded-circle">
                            <?php
                            $nama = $this->session->userdata('nama');
                            $nama = explode(" ", $nama);
                            $nama_sisa = implode(" ", array_slice($nama, 1));
                            ?>
                            <span id="firstName"><?= $nama[0] ?></span>
                            <?php if ($nama_sisa == null) { ?>
                                <span id="lastName" hidden><?= $nama[0] ?></span>
                            <?php } else { ?>
                                <span id="lastName"><?= $nama_sisa ?></span>
                            <?php } ?>

                        </span>
                    </div>
                </center>
            <?php } ?>


            <!--- Sidemenu -->
            <ul class="metismenu side-nav">

                <li class="side-nav-title side-nav-item">Pengguna</li>

                <li class="side-nav-item">


                    <a href="<?= base_url('dashboard') ?>" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="<?= base_url('profil') ?>" class="side-nav-link">
                        <i class="uil-user-circle"></i>
                        <span> Profil </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="<?= base_url('bantuan') ?>" class="side-nav-link">
                        <i class="uil-info-circle"></i>
                        <span> Bantuan </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="<?= base_url('logout') ?>" class="side-nav-link">
                        <i class="uil-sign-out-alt"></i>
                        <span> Logout </span>
                    </a>
                </li>



                <?php if ($this->session->userdata('hak_akses') == '1') { ?>
                    <li class="side-nav-title side-nav-item">ADMINISTRATOR</li>
                    <li class="side-nav-item">
                        <a href="#" class="side-nav-link">
                            <i class="uil-users-alt"></i>
                            <span> Guru </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="<?= base_url('guru') ?>">Data Guru</a>
                            </li>
                            <li>
                                <a href="<?= base_url('guru-pengampu') ?>">Guru Pengampu</a>
                            </li>
                        </ul>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?= base_url('ruangan') ?>" class="side-nav-link">
                            <i class="uil-building"></i>
                            <span> Ruangan </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?= base_url('kelas') ?>" class="side-nav-link">
                            <i class="uil-home"></i>
                            <span> Kelas </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?= base_url('mata-pelajaran') ?>" class="side-nav-link">
                            <i class="uil-clipboard-alt"></i>
                            <span> Mata Pelajaran </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="#" class="side-nav-link">
                            <i class="uil-clock"></i>
                            <span> Waktu </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="<?= base_url('jam') ?>">Jam</a>
                            </li>
                            <!-- <li>
                            <a href="<?= base_url('hari') ?>">Hari</a>
                        </li> -->
                        </ul>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?= base_url('jadwal-khusus') ?>" class="side-nav-link">
                            <i class="uil-edit"></i>
                            <span> Jadwal Khusus </span>
                        </a>
                    </li>

                    <li class="side-nav-title side-nav-item">Setting Sistem</li>

                    <li class="side-nav-item">
                        <a href="<?= base_url('pesan') ?>" class="side-nav-link">
                            <i class="uil-comments-alt"></i>
                            <span> Pesan </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?= base_url('users') ?>" class="side-nav-link">
                            <i class="uil-users-alt"></i>
                            <span> Users Sistem </span>
                        </a>
                    </li>

                <?php } ?>

                <?php if ($this->session->userdata('hak_akses') == '2') { ?>
                    <li class="side-nav-title side-nav-item">KURIKULUM</li>

                    <li class="side-nav-item">
                        <a href="#" class="side-nav-link">
                            <i class="uil-edit"></i>
                            <span> Update Data </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="<?= base_url('mata-pelajaran') ?>">Mata Pelajaran</a>
                            </li>
                            <li>
                                <a href="<?= base_url('jadwal-khusus') ?>">Jadwal Khusus</a>
                            </li>
                            <li>
                                <a href="<?= base_url('jam') ?>">Jam</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item">
                        <a href="<?= base_url('guru-pengampu') ?>" class="side-nav-link">
                            <i class="uil-users-alt"></i>
                            <span> Guru Pengampu</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?= base_url('request-jadwal') ?>" class="side-nav-link">
                            <i class="uil-table"></i>
                            <span>Request Jadwal</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?= base_url('tahun-akademik') ?>" class="side-nav-link">
                            <i class="uil-schedule"></i>
                            <span> Tahun Akademik</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?= base_url('penjadwalan') ?>" class="side-nav-link">
                            <i class="uil-file-alt"></i>
                            <span> Penjadwalan</span>
                        </a>
                    </li>
                <?php } ?>


                <?php if ($this->session->userdata('hak_akses') == '3') { ?>
                    <li class="side-nav-title side-nav-item">GURU MAPEL</li>
                <?php } ?>
            </ul>


            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
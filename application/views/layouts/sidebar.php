 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="<?= base_url('dashboard') ?>" class="brand-link">
         <!-- <img src="<?= base_url() ?>public/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
         <center>
             <span class="brand-text font-weight-light text-center" style="text-align: center;"><strong>e-Schedule SMA</strong></span>
         </center>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3  d-flex">
             <div class="image">
                 <img src="<?= base_url() ?>public/user.png" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block"><?= $this->session->userdata('nama') ?></a>
             </div>
         </div>


         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <?php if (
                        $this->session->userdata('hak_akses') == '1'
                    ) { ?>
                     <li class="nav-header ">Administrator</li>


                 <?php } ?>

                 <?php if (
                        $this->session->userdata('hak_akses') == '2'
                    ) { ?>
                     <li class="nav-header ">Bagian Kurikulum</li>


                 <?php } ?>

                 <?php if (
                        $this->session->userdata('hak_akses') == '3'
                    ) { ?>
                     <li class="nav-header ">Guru / Guru Mata Pelajaran</li>


                 <?php } ?>

                 <li class="nav-item">
                     <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
                         <!-- <i class="nav-icon fas fa-th-large"></i> -->
                         <svg width="17px" height="17px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                             <title>dashboard</title>
                             <desc>Created with Sketch.</desc>
                             <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <g id="Rounded" transform="translate(-341.000000, -245.000000)">
                                     <g id="Action" transform="translate(100.000000, 100.000000)">
                                         <g id="-Round-/-Action-/-dashboard" transform="translate(238.000000, 142.000000)">
                                             <g>
                                                 <polygon id="Path" points="0 0 24 0 24 24 0 24"></polygon>
                                                 <path d="M4,13 L10,13 C10.55,13 11,12.55 11,12 L11,4 C11,3.45 10.55,3 10,3 L4,3 C3.45,3 3,3.45 3,4 L3,12 C3,12.55 3.45,13 4,13 Z M4,21 L10,21 C10.55,21 11,20.55 11,20 L11,16 C11,15.45 10.55,15 10,15 L4,15 C3.45,15 3,15.45 3,16 L3,20 C3,20.55 3.45,21 4,21 Z M14,21 L20,21 C20.55,21 21,20.55 21,20 L21,12 C21,11.45 20.55,11 20,11 L14,11 C13.45,11 13,11.45 13,12 L13,20 C13,20.55 13.45,21 14,21 Z M13,4 L13,8 C13,8.55 13.45,9 14,9 L20,9 C20.55,9 21,8.55 21,8 L21,4 C21,3.45 20.55,3 20,3 L14,3 C13.45,3 13,3.45 13,4 Z" id="🔹Icon-Color" fill="#ffffff"></path>
                                             </g>
                                         </g>
                                     </g>
                                 </g>
                             </g>
                         </svg>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>




                 <?php if (
                        $this->session->userdata('hak_akses') == '1'
                    ) { ?>
                     <li class="nav-item <?= $this->uri->segment(1) == 'guru' || $this->uri->segment(1) == 'guru-pengampu' || $this->uri->segment(1) == 'riwayat-hasil' ? 'menu-open' : '' ?>">
                         <a href="#" class="nav-link <?= $this->uri->segment(1) == 'guru' || $this->uri->segment(1) == 'guru-pengampu' || $this->uri->segment(1) == 'riwayat-hasil' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-users"></i>
                             <p>
                                 Data Guru
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="<?= base_url('guru') ?>" class="nav-link <?= $this->uri->segment(1) == 'guru' ? 'active' : '' ?>">
                                     <i class="far fa-check-circle nav-icon"></i>
                                     <p>Guru</p>
                                 </a>
                             </li>


                             <li class="nav-item">
                                 <a href="<?= base_url('guru-pengampu') ?>" class="nav-link <?= $this->uri->segment(1) == 'guru-pengampu' ? 'active' : '' ?>">
                                     <i class="far fa-check-circle nav-icon"></i>
                                     <p>Guru Pengampu</p>
                                 </a>
                             </li>


                         </ul>
                     </li>

                     <li class="nav-item">
                         <a href="<?= base_url('kelas') ?>" class="nav-link <?= $this->uri->segment(1) == 'kelas' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-chalkboard"></i>
                             <p>
                                 Kelas
                             </p>
                         </a>
                     </li>

                 <?php } ?>

                 <?php if (
                        $this->session->userdata('hak_akses') == '2'
                    ) { ?>
                     <li class="nav-item">
                         <a href="<?= base_url('guru-pengampu') ?>" class="nav-link <?= $this->uri->segment(1) == 'guru-pengampu' ? 'active' : '' ?>">

                             <i class="nav-icon fas fa-users"></i>
                             <p>
                                 Guru Pengampu
                             </p>
                         </a>
                     </li>
                 <?php } ?>


                 <?php if (
                        $this->session->userdata('hak_akses') == '1' || $this->session->userdata('hak_akses') == '2'
                    ) { ?>
                     <li class="nav-item">
                         <a href="<?= base_url('mata-pelajaran') ?>" class="nav-link <?= $this->uri->segment(1) == 'mata-pelajaran' ? 'active' : '' ?>">

                             <i class="nav-icon fas fa-clipboard-list"></i>
                             <p>
                                 Mata Pelajaran
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url('jam') ?>" class="nav-link <?= $this->uri->segment(1) == 'jam' ? 'active' : '' ?>">

                             <i class="nav-icon fas fa-clock"></i>
                             <p>
                                 Sesi / Waktu
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="<?= base_url('jadwal-khusus') ?>" class="nav-link <?= $this->uri->segment(1) == 'jadwal-khusus' ? 'active' : '' ?>">

                             <i class="nav-icon fas fa-calendar-week"></i>
                             <p>
                                 Jadwal Khusus
                             </p>
                         </a>
                     </li>

                 <?php } ?>

                 <?php if (
                        $this->session->userdata('hak_akses') == '2'
                    ) { ?>


                     <li class="nav-item">
                         <a href="<?= base_url('tahun-akademik') ?>" class="nav-link <?= $this->uri->segment(1) == 'tahun-akademik' ? 'active' : '' ?>">

                             <i class="nav-icon fas fa-calendar-alt"></i>

                             <p>
                                 Tahun Akademik
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="<?= base_url('penjadwalan') ?>" class="nav-link <?= $this->uri->segment(1) == 'penjadwalan' ? 'active' : '' ?>">

                             <i class="nav-icon far fa-calendar-check"></i>

                             <p>
                                 Proses Penjadwalan <span class="right badge custom-success">Buat</span>
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="<?= base_url('jadwal-fix') ?>" class="nav-link <?= $this->uri->segment(1) == 'jadwal-fix' ? 'active' : '' ?>">

                             <i class="nav-icon far fa-calendar-alt"></i>

                             <p>
                                 Jadwal Fix Share <span class="right badge custom-badge">FIX</span>
                             </p>
                         </a>
                     </li>


                 <?php } ?>



                 <?php if (
                        $this->session->userdata('hak_akses') == '3'
                    ) { ?>
                     <li class="nav-item">
                         <a href="<?= base_url('jadwalku') ?>" class="nav-link <?= $this->uri->segment(1) == 'jadwalku' ? 'active' : '' ?>">

                             <i class="nav-icon fas fa-calendar-check"></i>
                             <p>
                                 Jadwal Mengajar
                             </p>
                         </a>
                     </li>



                     <li class="nav-item">
                         <a href="<?= base_url('mapelku') ?>" class="nav-link <?= $this->uri->segment(1) == 'mapelku' ? 'active' : '' ?>">

                             <i class="nav-icon fas fa-clipboard-list"></i>
                             <p>
                                 Mata Pelajaran
                                 <span class="right badge custom-badge">Diajarkan</span>
                             </p>
                         </a>
                     </li>

                 <?php } ?>

                 <?php if (
                        $this->session->userdata('hak_akses') == '1'
                    ) { ?>
                     <li class="nav-header ">Utility</li>
                     <li class="nav-item">
                         <a href="<?= base_url('pengguna') ?>" class="nav-link <?= $this->uri->segment(1) == 'pengguna' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-user-cog"></i>
                             <p>
                                 Role Pengguna
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url('set-notifikasi') ?>" class="nav-link <?= $this->uri->segment(1) == 'set-notifikasi' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-bell"></i>
                             <p>
                                 Set Waktu Notifikasi
                             </p>
                         </a>
                     </li>
                 <?php } ?>
                 <li class="nav-item">
                     <a href="<?= base_url('logout') ?>" class="nav-link">
                         <i class="nav-icon fas fa-power-off"></i>
                         <p>
                             Logout
                         </p>
                     </a>
                 </li>

                 <!--   <li class="nav-item">
                     <a href="<?= base_url('pengaduan') ?>" class="nav-link <?= $this->uri->segment(1) == 'pengaduan' ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-comments"></i>
                         <p>
                             Pengaduan
                         </p>
                     </a>
                 </li> -->

                 <!-- <li class="nav-header ">Utility</li>
                 <li class="nav-item">
                     <a href="<?= base_url('info-apps') ?>" class="nav-link <?= $this->uri->segment(1) == 'info-apps' ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-info-circle"></i>
                         <p>
                             Info Apps
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('logout') ?>" class="nav-link">
                         <i class="nav-icon fas fa-power-off"></i>
                         <p>
                             Logout
                         </p>
                     </a>
                 </li> -->

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
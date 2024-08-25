         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Dashboard</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">
                     <?php if ($this->session->userdata('hak_akses') == '1') { ?>
                         <div class="callout callout-custom">
                             <h5>Welcome!</h5>
                             <hr>
                             <p>Anda login sebagai ADMINISTRATOR SISTEM
                             </p>
                         </div>

                         <!-- <div class="row">
                             <div class="col-12">
                                 <div class="card card-default">
                                     <div class="card-header">
                                         <h3 class="card-title">Statistik Pengunjung Penggunaan Aplikasi Wisata</h3>
                                     </div>
                                     <div class="card-body">

                                     </div>
                                 </div>
                             </div>
                         </div> -->

                     <?php } ?>


                     <?php if ($this->session->userdata('hak_akses') == '2') { ?>
                         <div class="callout callout-custom">
                             <h5>Welcome!</h5>
                             <hr>
                             <p>Anda login sebagai
                             </p>
                         </div>

                         <div class="row">
                             <div class="col-7">
                                 <div class="card card-default">
                                     <div class="card-header">
                                         <h3 class="card-title">Statistik Guru Terdaftar</h3>
                                     </div>
                                     <div class="card-body">
                                         <canvas id="myChart" style="width:100%;max-width:600px" class="mb-3"></canvas>
                                     </div>
                                 </div>
                             </div>

                             <div class="col-5">
                                 <div class="card card-default">
                                     <div class="card-header">
                                         <h3 class="card-title">Pengguna Aktif <?php if ($onlinetot == null) { ?>

                                             <?php } else { ?>
                                                 <span class="badge custom-badge"><?php echo $onlinetot ?></span>
                                             <?php } ?>
                                         </h3>
                                     </div>
                                     <div class="card-body">
                                         <?php if ($online == null) { ?>
                                             <center>
                                                 <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                                 <p class="mt-3">Tidak ada pengguna aktif</p>
                                             </center>
                                         <?php } else { ?>


                                             <?php foreach ($online as $o) { ?>
                                                 <div class="media">
                                                     <div class="avatar-sm mr-3 bg-danger">
                                                         <span class="avatar-title">
                                                             <?php
                                                                // Mengambil nama lengkap
                                                                $nama_lengkap = $o->nama;
                                                                $nama_parts = explode(" ", $nama_lengkap);
                                                                $nama_depan = $nama_parts[0]; // Nama depan
                                                                $nama_belakang = isset($nama_parts[1]) ? $nama_parts[1] : ''; // Nama belakang, jika ada

                                                                // Mengambil karakter pertama dari nama depan dan nama belakang
                                                                $inisial_depan = substr($nama_depan, 0, 1); // Karakter pertama dari nama depan
                                                                $inisial_belakang = substr($nama_belakang, 0, 1); // Karakter pertama dari nama belakang
                                                                ?>
                                                             <?= $inisial_depan ?>
                                                             <?php if ($inisial_belakang != '') { ?>
                                                                 <?= $inisial_belakang ?>
                                                             <?php } ?>
                                                         </span>
                                                     </div>

                                                     <div class="media-body">
                                                         <span class="badge custom-success float-right">Active</span>
                                                         <h5 class="mt-0 mb-1"><?= $o->nama ?></h5>
                                                         <span class="font-13"><i class="uil-book-reader"></i> Guru</span>
                                                     </div>
                                                 </div>


                                                 <br>
                                             <?php } ?>

                                         <?php } ?>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     <?php } ?>


                     <?php if ($this->session->userdata('hak_akses') == '3') { ?>
                         <div class="callout callout-custom">
                             <h5>Welcome! <?= $this->session->userdata('nama') ?></h5>
                             <hr>
                             <p>Anda login sebagai <b><u>GURU MATA PELAJARAN</u></b>
                             </p>
                         </div>

                         <div class="row">
                             <div class="col-7">
                                 <div class="card card-default">
                                     <div class="card-header">
                                         <h3 class="card-title">Jadwal Hari ini dan Akan Datang</h3>
                                     </div>
                                     <div class="card-body">
                                         <div class="todoapp">
                                             <!-- tasks panel -->
                                             <div class="mt-2">
                                                 <a class="text-dark" data-toggle="collapse" href="#jadwalHariIni" aria-expanded="false" aria-controls="jadwalHariIni">
                                                     <h5 class="m-0 pb-2">
                                                         <i class='uil uil-angle-down font-18'></i>Hari Ini <span class="text-muted"></span>
                                                     </h5>
                                                 </a>
                                                 <div class="collapse show" id="jadwalHariIni">
                                                     <div class="card ">
                                                         <div class="card-body">
                                                             <!-- task -->

                                                             <?php if ($today == null) { ?>
                                                                 <div class="callout callout-info">
                                                                     <h4><i class="fa fa-info-circle"></i> Info!</h4>
                                                                     <p>Tidak ada jadwal mendatang.</p>
                                                                 </div>
                                                             <?php } else { ?>
                                                                 <div class="timeline">

                                                                     <div class="time-label">
                                                                         <span class="bg-red">Hari ini : </span>
                                                                     </div>



                                                                     <div>
                                                                         <i class="fas fa-calendar-alt bg-green"></i>
                                                                         <div class="timeline-item">
                                                                             <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                                                                             <h3 class="timeline-header no-border"><a>Sarah Young</a> accepted your friend request</h3>
                                                                         </div>
                                                                     </div>



                                                                 </div>
                                                             <?php } ?>
                                                             <!-- end task -->
                                                         </div> <!-- end card-body-->
                                                     </div> <!-- end card -->
                                                 </div> <!-- end .collapse-->
                                             </div>
                                             <!-- end .mt-2-->


                                             <hr>

                                             <!-- tasks panel -->
                                             <div class="mt-2">
                                                 <a class="text-dark" data-toggle="collapse" href="#jadwalAkanDatang" aria-expanded="false" aria-controls="jadwalAkanDatang">
                                                     <h5 class="m-0 pb-2">
                                                         <i class='uil uil-angle-down font-18'></i>Akan Datang <span class="text-muted"></span>
                                                     </h5>
                                                 </a>

                                                 <div class="collapse show" id="jadwalAkanDatang">
                                                     <div class="card">
                                                         <div class="card-body">
                                                             <!-- task -->
                                                             <div class="row justify-content-sm-between">
                                                                 <div class="col-sm-6 ">
                                                                     <span># <strong>Tas</strong></span>
                                                                 </div> <!-- end col -->
                                                                 <div class="col-sm-6">
                                                                     <div class="d-flex justify-content-between">

                                                                         <div>
                                                                             <ul class="list-inline font-13 text-right">
                                                                                 <li class="list-inline-item">
                                                                                     <i class='uil uil-schedule font-16 mr-1'></i> <span class="badge custom-alert-danger p-1">Hari Ini</span>
                                                                                 </li>
                                                                             </ul>
                                                                         </div>
                                                                     </div> <!-- end .d-flex-->
                                                                 </div> <!-- end col -->
                                                             </div>
                                                             <!-- end task -->
                                                         </div> <!-- end card-body-->
                                                     </div> <!-- end card -->
                                                 </div> <!-- end .collapse-->
                                             </div>
                                             <!-- end .mt-2-->

                                         </div> <!-- end .todoapp-->
                                     </div>
                                 </div>
                             </div>


                             <div class="col-5">
                                 <div class="card card-default">
                                     <div class="card-header">
                                         <h3 class="card-title">Pengguna Aktif <?php if ($onlinetot == null) { ?>

                                             <?php } else { ?>
                                                 <span class="badge custom-badge"><?php echo $onlinetot ?></span>
                                             <?php } ?>
                                         </h3>
                                     </div>
                                     <div class="card-body">
                                         <?php if ($online == null) { ?>
                                             <center>
                                                 <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                                 <p class="mt-3">Tidak ada pengguna aktif</p>
                                             </center>
                                         <?php } else { ?>


                                             <?php foreach ($online as $o) { ?>
                                                 <div class="media">
                                                     <div class="avatar-sm mr-3 bg-danger">
                                                         <span class="avatar-title">
                                                             <?php
                                                                // Mengambil nama lengkap
                                                                $nama_lengkap = $o->nama;
                                                                $nama_parts = explode(" ", $nama_lengkap);
                                                                $nama_depan = $nama_parts[0]; // Nama depan
                                                                $nama_belakang = isset($nama_parts[1]) ? $nama_parts[1] : ''; // Nama belakang, jika ada

                                                                // Mengambil karakter pertama dari nama depan dan nama belakang
                                                                $inisial_depan = substr($nama_depan, 0, 1); // Karakter pertama dari nama depan
                                                                $inisial_belakang = substr($nama_belakang, 0, 1); // Karakter pertama dari nama belakang
                                                                ?>
                                                             <?= $inisial_depan ?>
                                                             <?php if ($inisial_belakang != '') { ?>
                                                                 <?= $inisial_belakang ?>
                                                             <?php } ?>
                                                         </span>
                                                     </div>

                                                     <div class="media-body">
                                                         <span class="badge custom-success float-right">Active</span>
                                                         <h5 class="mt-0 mb-1"><?= $o->nama ?></h5>
                                                         <span class="font-13"><i class="uil-book-reader"></i> Guru</span>
                                                     </div>
                                                 </div>


                                                 <br>
                                             <?php } ?>

                                         <?php } ?>
                                     </div>
                                 </div>
                             </div>
                         </div>

                     <?php } ?>

             </section>
             <div>
                 <br>
             </div>
         </div>




         </div>
         <!-- content -->
  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <div class="page-title-right">

                  </div>
                  <h4 class="page-title">Dashboard</h4>
              </div>
          </div>
      </div>
      <!-- end page title -->

      <div class="row">

          <?php if ($this->session->userdata('hak_akses') == '1') { ?>

              <div class="col-xl-12 col-lg-12">
                  <div class="alert alert-success bg-success text-white text-center" role="alert">
                      <center>
                          <dotlottie-player src="https://lottie.host/c2841724-2d51-46b7-9f2a-dad670a710f3/TZl97fG7Pl.json" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay></dotlottie-player>
                      </center>

                      <h4 class="alert-heading">Selamat Datang! ADMINISTRATOR</h4>

                      <hr>
                      <p class="mb-0">Anda sekarang masuk sebagai ADMINISTRATOR sistem e-Schedule.</p>
                  </div>

              </div>


              <div class="col-xl-12 col-lg-12">
                  <div class="card widget-inline">
                      <div class="card-body p-0">
                          <div class="row no-gutters">
                              <div class="col-sm-6 col-xl-3">
                                  <div class="card shadow-none m-0">
                                      <div class="card-body text-center">
                                          <i class="dripicons-briefcase text-muted" style="font-size: 24px;"></i>
                                          <h3><span>29</span></h3>
                                          <p class="text-muted font-15 mb-0">Total Guru</p>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-6 col-xl-3">
                                  <div class="card shadow-none m-0 border-left">
                                      <div class="card-body text-center">
                                          <i class="dripicons-checklist text-muted" style="font-size: 24px;"></i>
                                          <h3><span>715</span></h3>
                                          <p class="text-muted font-15 mb-0">Total Siswa</p>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-6 col-xl-3">
                                  <div class="card shadow-none m-0 border-left">
                                      <div class="card-body text-center">
                                          <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                          <h3><span>31</span></h3>
                                          <p class="text-muted font-15 mb-0">Total Kelas</p>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-6 col-xl-3">
                                  <div class="card shadow-none m-0 border-left">
                                      <div class="card-body text-center">
                                          <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                          <h3><span>31</span></h3>
                                          <p class="text-muted font-15 mb-0">Total Ruangan</p>
                                      </div>
                                  </div>
                              </div>

                          </div> <!-- end row -->
                      </div>
                  </div> <!-- end card-box-->
              </div> <!-- end col-->




              <div class="col-lg-7">
                  <div class="card">
                      <div class="card-body">

                          <h4 class="header-title mb-4">Statistik Guru</h4>

                          <canvas id="myChart" style="width:100%;max-width:600px" class="mb-3"></canvas>

                          <!-- end row-->

                      </div> <!-- end card body-->
                  </div> <!-- end card -->
              </div><!-- end col-->

              <div class="col-lg-5">
                  <div class="card">
                      <div class="card-body">

                          <h4 class="header-title mb-4">Pengguna Aktif
                              <?php if ($onlinetot == null) { ?>

                              <?php } else { ?>
                                  <span class="badge badge-danger-lighten"><?php echo $onlinetot ?></span>
                              <?php } ?>

                          </h4>
                          <hr>
                          <?php if ($online == null) { ?>
                              <div class="box-body">
                                  <center>
                                      <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                      <p class="mt-3">Tidak ada pengguna aktifss</p>
                                  </center>
                              </div>
                          <?php } else { ?>


                              <?php foreach ($online as $o) { ?>
                                  <div class="media">
                                      <div class="avatar-sm mr-3" width="20">
                                          <span class="avatar-title bg-danger text-black font-20 rounded-circle">
                                              <!-- <?php
                                                    $nama = $this->session->userdata('nama');
                                                    $nama = explode(" ", $nama);
                                                    $nama_sisa = implode(" ", array_slice($nama, 1));
                                                    ?> -->


                                              <?php
                                                $nama_lengkap = $o->nama;
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

                                      <!-- <img class="mr-3 rounded-circle" src="<?= base_url() ?>assets/template/images/users/avatar-3.jpg" width="40" alt="Generic placeholder image"> -->
                                      <div class="media-body">
                                          <span class="badge badge-success-lighten float-right">Active Now</span>
                                          <h5 class="mt-0 mb-1"><?= $o->nama ?></h5>
                                          <span class="font-13"><i class="uil-book-reader"></i> Guru</span>
                                      </div>
                                  </div>
                                  <br>
                              <?php } ?>

                          <?php } ?>

                      </div>
                  </div> <!-- end card -->
              </div><!-- end col-->




          <?php } ?>

          <?php if ($this->session->userdata('hak_akses') == '2') { ?>
              <div class="col-xl-12 col-lg-12">
                  <div class="alert alert-danger bg-danger text-white text-center" role="alert">
                      <center>
                          <dotlottie-player src="https://lottie.host/c2841724-2d51-46b7-9f2a-dad670a710f3/TZl97fG7Pl.json" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay></dotlottie-player>
                      </center>
                      <h4 class="alert-heading">Selamat Datang! BAGIAN KURIKULUM</h4>

                      <hr>
                      <p class="mb-0">Anda sekarang masuk sebagai BAGIAN KURIKULUM sistem e-Schedule.</p>
                  </div>
              </div>


              <div class="col-lg-7">
                  <div class="card">
                      <div class="card-body">

                          <h4 class="header-title mb-4">Statistik Guru</h4>

                          <canvas id="myChart" style="width:100%;max-width:600px" class="mb-3"></canvas>

                          <!-- end row-->

                      </div> <!-- end card body-->
                  </div> <!-- end card -->
              </div><!-- end col-->

              <div class="col-lg-5">
                  <div class="card">
                      <div class="card-body">

                          <h4 class="header-title mb-4">Pengguna Aktif
                              <?php if ($onlinetot == null) { ?>

                              <?php } else { ?>
                                  <span class="badge badge-danger-lighten"><?php echo $onlinetot ?></span>
                              <?php } ?>

                          </h4>
                          <hr>
                          <?php if ($online == null) { ?>
                              <div class="box-body">
                                  <center>
                                      <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                      <p class="mt-3">Tidak ada pengguna aktifss</p>
                                  </center>
                              </div>
                          <?php } else { ?>


                              <?php foreach ($online as $o) { ?>
                                  <div class="media">
                                      <div class="avatar-sm mr-3" width="20">
                                          <span class="avatar-title bg-danger text-black font-20 rounded-circle">
                                              <!-- <?php
                                                    $nama = $this->session->userdata('nama');
                                                    $nama = explode(" ", $nama);
                                                    $nama_sisa = implode(" ", array_slice($nama, 1));
                                                    ?> -->


                                              <?php
                                                $nama_lengkap = $o->nama;
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

                                      <!-- <img class="mr-3 rounded-circle" src="<?= base_url() ?>assets/template/images/users/avatar-3.jpg" width="40" alt="Generic placeholder image"> -->
                                      <div class="media-body">
                                          <span class="badge badge-success-lighten float-right">Active Now</span>
                                          <h5 class="mt-0 mb-1"><?= $o->nama ?></h5>
                                          <span class="font-13"><i class="uil-book-reader"></i> Guru</span>
                                      </div>
                                  </div>
                                  <br>
                              <?php } ?>

                          <?php } ?>

                      </div>
                  </div> <!-- end card -->
              </div><!-- end col-->
          <?php } ?>


          <?php if ($this->session->userdata('hak_akses') == '3') { ?>
              <div class="col-xl-12 col-lg-12">
                  <div class="alert alert-primary bg-primary text-white text-center" role="alert">
                      <center>
                          <dotlottie-player src="https://lottie.host/c2841724-2d51-46b7-9f2a-dad670a710f3/TZl97fG7Pl.json" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay></dotlottie-player>
                      </center>
                      <h4 class="alert-heading">Selamat Datang! GURU MATA PELAJARAN</h4>

                      <hr>
                      <p class="mb-0">Anda sekarang masuk sebagai GURU MATA PELAJARAN sistem e-Schedule.</p>
                  </div>
              </div>


              <div class="col-xl-4 col-lg-6">
                  <div class="card">
                      <div class="card-body">

                          <h4 class="header-title mb-2">Jadwal Saya</h4>
                          <hr>
                          <div class="todoapp">
                              <!-- tasks panel -->
                              <div class="mt-2">
                                  <a class="text-dark" data-toggle="collapse" href="#jadwalHariIni" aria-expanded="false" aria-controls="jadwalHariIni">
                                      <h5 class="m-0 pb-2">
                                          <i class='uil uil-angle-down font-18'></i>Hari Ini <span class="text-muted">(10)</span>
                                      </h5>
                                  </a>
                                  <div class="collapse show" id="jadwalHariIni">
                                      <div class="card mb-0 alert alert-info">
                                          <div class="card-body">
                                              <!-- task -->

                                              <?php if ($today == null) { ?>
                                                  <div class="callout callout-info">
                                                      <h4><i class="fa fa-info-circle"></i> Info!</h4>
                                                      <p>Tidak ada jadwal mendatang.</p>
                                                  </div>
                                              <?php } else { ?>
                                                  <div class="row justify-content-sm-between">
                                                      <div class="col-sm-6 ">
                                                          <span># <strong>Tas</strong></span>
                                                      </div> <!-- end col -->
                                                      <div class="col-sm-6">
                                                          <div class="d-flex justify-content-between">
                                                              <div>
                                                                  <ul class="list-inline font-13 text-right">
                                                                      <li class="list-inline-item">
                                                                          <i class='uil uil-schedule font-16 mr-1'></i> <span class="badge badge-danger-lighten p-1">Hari Ini</span>
                                                                      </li>
                                                                  </ul>
                                                              </div>
                                                          </div> <!-- end .d-flex-->
                                                      </div> <!-- end col -->
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
                                          <i class='uil uil-angle-down font-18'></i>Akan Datang <span class="text-muted">(10)</span>
                                      </h5>
                                  </a>

                                  <div class="collapse show" id="jadwalAkanDatang">
                                      <div class="card mb-0 alert alert-warning">
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
                                                                      <i class='uil uil-schedule font-16 mr-1'></i> <span class="badge badge-danger-lighten p-1">Hari Ini</span>
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

                      </div> <!-- end card-body -->
                  </div> <!-- end card-->
                  <!-- end card-->
              </div>
              <!-- end col -->

              <div class="col-xl-4 col-lg-6">
                  <div class="card cta-box bg-info text-white">
                      <div class="card-body">
                          <div class="media align-items-center">
                              <div class="media-body">
                                  <h2 class="mt-0"><i class="mdi mdi-bullhorn-outline"></i>&nbsp;</h2>
                                  <h3 class="m-0 font-weight-normal cta-box-title">Tahun Akademik <br><b>2023/2024</b></h3>
                              </div>
                              <img class="ml-3" src="<?= base_url() ?>assets/template/email-campaign.svg" width="120" alt="Generic placeholder image">
                          </div>
                      </div>
                      <!-- end card-body -->
                  </div>
                  <!-- end card-->

                  <!-- Todo-->

                  <div class="card">
                      <div class="card-body">

                          <h4 class="header-title mb-4">Pengguna Aktif
                              <?php if ($onlinetot == null) { ?>

                              <?php } else { ?>
                                  <span class="badge badge-danger-lighten"><?php echo $onlinetot ?></span>
                              <?php } ?>

                          </h4>
                          <hr>
                          <?php if ($online == null) { ?>
                              <div class="box-body">
                                  <center>
                                      <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                      <p class="mt-3">Tidak ada pengguna aktifss</p>
                                  </center>
                              </div>
                          <?php } else { ?>


                              <?php foreach ($online as $o) { ?>
                                  <div class="media">
                                      <div class="avatar-sm mr-3" width="20">
                                          <span class="avatar-title bg-danger text-black font-20 rounded-circle">
                                              <!-- <?php
                                                    $nama = $this->session->userdata('nama');
                                                    $nama = explode(" ", $nama);
                                                    $nama_sisa = implode(" ", array_slice($nama, 1));
                                                    ?> -->


                                              <?php
                                                $nama_lengkap = $o->nama;
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

                                      <!-- <img class="mr-3 rounded-circle" src="<?= base_url() ?>assets/template/images/users/avatar-3.jpg" width="40" alt="Generic placeholder image"> -->
                                      <div class="media-body">
                                          <span class="badge badge-success-lighten float-right">Active Now</span>
                                          <h5 class="mt-0 mb-1"><?= $o->nama ?></h5>
                                          <span class="font-13"><i class="uil-book-reader"></i> Guru</span>
                                      </div>
                                  </div>
                                  <br>
                              <?php } ?>

                          <?php } ?>




                      </div>
                      <!-- end card-body -->
                  </div>



              </div>
              <!-- end col -->



          <?php } ?>





      </div>
      <!-- end row -->



  </div>
  <!-- container -->

  </div>
  <!-- content -->
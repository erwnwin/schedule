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
          <?php } ?>



          <div class="col-xl-3 col-lg-4">
              <div class="card tilebox-one">
                  <div class="card-body">
                      <i class='uil uil-users-alt float-right'></i>
                      <h6 class="text-uppercase mt-0">Active Users</h6>
                      <h2 class="my-2">121</h2>
                      <p class="mb-0 text-muted">
                          <span class="text-success mr-2"><span class="mdi mdi-arrow-up-bold"></span> 5.27%</span>
                          <span class="text-nowrap">Since last month</span>
                      </p>
                  </div> <!-- end card-body-->
              </div>
              <!--end card-->

              <div class="card tilebox-one">
                  <div class="card-body">
                      <i class='uil uil-window-restore float-right'></i>
                      <h6 class="text-uppercase mt-0">Views per minute</h6>
                      <h2 class="my-2">560</h2>
                      <p class="mb-0 text-muted">
                          <span class="text-danger mr-2"><span class="mdi mdi-arrow-down-bold"></span> 1.08%</span>
                          <span class="text-nowrap">Since previous week</span>
                      </p>
                  </div> <!-- end card-body-->
              </div>
              <!--end card-->

              <div class="card cta-box overflow-hidden">
                  <div class="card-body">
                      <div class="media align-items-center">
                          <div class="media-body">
                              <h3 class="m-0 font-weight-normal cta-box-title">Enhance your <b>Campaign</b> for better outreach <i class="mdi mdi-arrow-right"></i></h3>
                          </div>
                          <img class="ml-3" src="<?= base_url() ?>assets/template/assets/images/email-campaign.svg" width="92" alt="Generic placeholder image">
                      </div>
                  </div>
                  <!-- end card-body -->
              </div>
          </div> <!-- end col -->

          <div class="col-xl-9 col-lg-8">
              <div class="card">
                  <div class="card-body">
                      <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          Property HY1xx is not receiving hits. Either your site is not receiving any sessions or it is not tagged correctly.
                      </div>
                      <ul class="nav float-right d-none d-lg-flex">
                          <li class="nav-item">
                              <a class="nav-link text-muted" href="#">Today</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-muted" href="#">7d</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link active" href="#">15d</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-muted" href="#">1m</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-muted" href="#">1y</a>
                          </li>
                      </ul>
                      <h4 class="header-title mb-3">Sessions Overview</h4>

                      <div id="sessions-overview" class="apex-charts mt-3" data-colors="#0acf97"></div>
                  </div> <!-- end card-body-->
              </div> <!-- end card-->
          </div>
      </div>




  </div>
  <!-- container -->

  </div>
  <!-- content -->
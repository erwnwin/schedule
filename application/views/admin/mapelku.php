  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title">Mata Pelajaran yang diampuh : <?=
                                                                        $this->session->userdata('nama');
                                                                        ?></h4>
              </div>
          </div>
      </div>
      <!-- end page title -->

      <div class="row">

          <div id="flash-gagal" data-flash="<?= $this->session->flashdata('gagal'); ?>"></div>
          <div id="flash" data-flash="<?= $this->session->flashdata('sukses'); ?>"></div>
          <div id="flash-edit" data-flash="<?= $this->session->flashdata('edit'); ?>"></div>

          <div class="col-xl-12 col-lg-12">
              <div class="card">
                  <div class="card-body">


                    

                  </div>
              </div>
          </div>
      </div>
  </div>
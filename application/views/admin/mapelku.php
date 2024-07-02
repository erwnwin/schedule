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
                      <h4 class="header-title mt-1">Mata Pelajaran yang diampuh</h4>
                      <hr>

                      <div class="table-responsive">
                          <?php if ($mapelku == null) { ?>
                              <center>
                                  <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                  <p class="mt-3">Tidak ada data</p>
                              </center>
                          <?php } else { ?>

                              <table class="table table-sm table-bordered table-striped table-hover">
                                  <tr>
                                      <th style="width: 10px" class="bg-info text-center text-white">#</th>
                                      <th style="width: 150px" class="bg-info text-center text-white">Kode Mata Pelajaran</th>
                                      <th style="width: 200px" class="bg-info text-center text-white">Mata Pelajaran</th>
                                      <th style="width: 300px" class="bg-info text-center text-white">Kelas Yang Diajarkan</th>
                                  </tr>
                                  <?php $no = 1;

                                    foreach ($mapelku as $m) { ?>
                                      <tr>
                                          <td class="text-center"><?= $no++ ?></td>
                                          <td class="text-center"><?= $m->kode_mapel ?></td>
                                          <td class="text-center"><?= $m->nama_mapel ?></td>
                                          <td class="text-center">Kelas <?= $m->kelas ?>.<?= $m->urutan_kelas ?></td>
                                      </tr>
                                  <?php } ?>
                              </table>


                          <?php } ?>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
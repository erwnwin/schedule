  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title">Data Hari</h4>
              </div>
          </div>
      </div>
      <!-- end page title -->

      <div class="row">

          <!-- <?php echo $this->session->flashdata('pesan') ?> -->

          <div id="flash-gagal" data-flash="<?= $this->session->flashdata('gagal'); ?>"></div>
          <div id="flash-valid" data-flash="<?= $this->session->flashdata('valid'); ?>"></div>
          <div id="flash" data-flash="<?= $this->session->flashdata('sukses'); ?>"></div>
          <div id="flash-edit" data-flash="<?= $this->session->flashdata('edit'); ?>"></div>

          <div class="col-xl-12 col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="header-title mt-1">DATA HARI</h4>

                      <div class="table-responsive">
                          <table class="table table-sm table-hover table-bordered table-centered mb-0 font-14 ">
                              <thead class="thead-light">
                                  <tr>
                                      <th style="width: 10px" class="bg-primary text-white text-center">#</th>
                                      <th class="bg-primary text-white text-center">Hari</th>
                                      <th class="bg-primary text-white text-center">Jenis Kelas</th>
                                      <th style="width: 90px" class="bg-primary text-white text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php if ($hari == null) { ?>
                                      <td colspan="6">
                                          <center>
                                              <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                              <p class="mt-3">Tidak ada data</p>
                                          </center>
                                      </td>
                                  <?php } else { ?>
                                      <?php $no = 1;
                                        foreach ($hari as $r) { ?>
                                          <tr>
                                              <td class="text-center"><?= $no++ ?></td>
                                              <td class="text-center"><?= $r->nama_hari ?></td>
                                              <td class="text-center"><?= $r->kelas ?></td>
                                              <td class="text-center">
                                                  <!-- <a href="" class="action-icon" data-toggle="modal" data-target="#modal-edit<?= $r->id_kelas ?>"> <i class="mdi mdi-pencil"></i></a> -->
                                                  <a href="<?= base_url('hari/delete/' . $r->id_hari) ?>" class="action-icon" id="btn-hapus"> <i class="mdi mdi-delete"></i></a>
                                              </td>
                                          </tr>
                                      <?php } ?>
                                  <?php } ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>
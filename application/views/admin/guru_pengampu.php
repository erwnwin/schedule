  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title">Data Guru Pengampu</h4>
              </div>
          </div>
      </div>
      <!-- end page title -->

      <div class="row">

          <!-- <?php echo $this->session->flashdata('pesan') ?> -->

          <div id="flash-gagal" data-flash="<?= $this->session->flashdata('gagal'); ?>"></div>
          <div id="flash" data-flash="<?= $this->session->flashdata('sukses'); ?>"></div>
          <div id="flash-edit" data-flash="<?= $this->session->flashdata('edit'); ?>"></div>

          <div class="col-xl-12 col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <!-- <a href="<?= base_url('guru/create') ?>" class="p-0 float-right mb-3 "> <i class="mdi mdi-plus ml-1"></i> Create</a> -->
                      <!-- <button type="button" class="btn btn-sm btn-primary float-right mb-3" data-toggle="modal" data-target="#modal-tambah">Create Guru</button> -->

                      <h4 class="header-title mt-1">DATA GURU PENGAMPU</h4>

                      <div class="table-responsive mt-4">
                          <table class="table table-sm table-hover table-bordered table-centered mb-0 font-14 ">
                              <thead class="thead-light">
                                  <tr>
                                      <th style="width: 5%;" class="bg-primary text-white text-center">#</th>
                                      <th class="bg-primary text-white text-center" style="width: 70%;">Mata Pelajaran</th>
                                      <th style="width: 50%;" class="bg-primary text-white text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $no = 1;
                                    foreach ($mapel as $ValueListMapel) : ?>
                                      <tr>
                                          <td class="text-center"><?= $no ?></td>
                                          <td class="text-center"><?= $ValueListMapel->nama_mapel ?></td>
                                          <td class="text-center">
                                              <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TugasGuru" data-kodemapel="<?= $ValueListMapel->kode_mapel ?>" data-mapel="<?= $ValueListMapel->nama_mapel ?>">Tambah Guru Pengajar</button> -->
                                              <a href="<?= base_url('guru-pengampu/create-pengampu/' . $ValueListMapel->kode_mapel) ?>"><button class="btn btn-sm btn-flat <?= ($ValueListMapel->jumlah_kosong == 0) ? 'btn-success' : 'btn-danger'; ?>">Lihat Guru Pengajar</button></a>
                                          </td>
                                      </tr>
                                  <?php
                                        $no++;
                                    endforeach; ?>
                              </tbody>
                          </table>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title">Mata Pelajaran</h4>
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
                      <button type="button" class="btn btn-sm btn-primary float-right mb-3" data-toggle="modal" data-target="#modal-tambah">Add Ruangan</button>

                      <div id="modal-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title" id="standard-modalLabel">Add Data Ruangan</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  </div>
                                  <div class="modal-body">
                                      <form class="form-horizontal" method="post" action="<?= base_url('ruangan/act') ?>">
                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Nama Ruangan</label>
                                              <div class="col-9">
                                                  <input type="hidden" name="jenis" class="form-control" required="required" value="Teori" />
                                                  <input type="text" name="nama_ruangan" class="form-control" placeholder="Nama Ruangan" required>
                                              </div>
                                          </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                                  </div>
                                  </form>
                              </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->

                      <h4 class="header-title mt-1">DAFTAR RUANGAN</h4>
                      <div class="table-responsive">
                          <table class="table table-sm table-hover table-bordered table-centered mb-0 font-14 ">
                              <thead class="thead-light">
                                  <tr>
                                      <th style="width: 30px" class="bg-primary text-white text-center">#</th>
                                      <th class="bg-primary text-white text-center">Nama Ruangan</th>
                                      <th style="width: 90px" class="bg-primary text-white text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php if ($ruang == null) { ?>
                                      <td colspan="6">
                                          <center>
                                              <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                              <p class="mt-3">Tidak ada data</p>
                                          </center>
                                      </td>
                                  <?php } else { ?>
                                      <?php $no = 1;
                                        foreach ($ruang as $g) { ?>
                                          <tr>
                                              <td><?= $no++ ?></td>
                                              <td><?= $g->nama_ruangan ?></td>
                                              <td class="text-center">
                                                  <a href="" class="action-icon " data-toggle="modal" data-target="#modal-edit<?= $g->id ?>"> <i class="mdi mdi-pencil"></i></a>
                                                  <a href="<?= base_url('ruangan/delete/' . $g->id) ?>" class="action-icon " id="btn-hapus"> <i class="mdi mdi-delete"></i></a>
                                              </td>
                                          </tr>
                                      <?php } ?>
                                  <?php } ?>
                              </tbody>
                          </table>
                      </div> <!-- end table-responsive-->
                  </div>
              </div>
          </div>

      </div>



  </div>
  <!-- container -->

  </div>
  <!-- content -->
  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title">Data Guru</h4>
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
                      <!-- <a href="<?= base_url('guru/create') ?>" class="p-0 float-right mb-3 "> <i class="mdi mdi-plus ml-1"></i> Create</a> -->
                      <button type="button" class="btn btn-sm btn-primary float-right mb-3" data-toggle="modal" data-target="#modal-tambah">Create Kelas</button>

                      <div id="modal-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title" id="standard-modalLabel">Input Data Kelas</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  </div>
                                  <div class="modal-body">


                                      <form class="form-horizontal" method="post" action="<?= base_url('kelas/act-add') ?>">

                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Ruangan</label>
                                              <div class="col-9">
                                                  <select name="id_ruang" class="form-control select2" data-toggle="select2" style="width: 100%;" required>
                                                      <option value="">Pilih Ruangan</option>
                                                      <?php foreach ($ruang as $r) { ?>
                                                          <option value="<?= $r->id ?>"><?= $r->nama_ruangan ?></option>
                                                      <?php } ?>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Kelas</label>
                                              <div class="col-9">
                                                  <select name="kelas" class="form-control select2" data-toggle="select2" style="width: 100%;" required>
                                                      <option value="">Pilih Kelas</option>
                                                      <option value="X">X</option>
                                                      <option value="XI">XI</option>
                                                      <option value="XII">XII</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Urutan Kelas</label>
                                              <div class="col-9">
                                                  <select name="urutan_kelas" class="form-control select2" data-toggle="select2" style="width: 100%;" required>
                                                      <option value="">Pilih Urutan</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                      <option value="5">5</option>
                                                      <option value="6">6</option>
                                                      <option value="7">7</option>
                                                      <option value="8">8</option>
                                                      <option value="9">9</option>
                                                      <option value="10">10</option>
                                                  </select>
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
                      <h4 class="header-title mt-1">DATA KELAS</h4>


                      <div class="table-responsive">
                          <table class="table table-sm table-hover table-bordered table-centered mb-0 font-14 ">
                              <thead class="thead-light">
                                  <tr>
                                      <th style="width: 10px" class="bg-primary text-white text-center">#</th>
                                      <th class="bg-primary text-white text-center">Nama Kelas</th>
                                      <th class="bg-primary text-white text-center">Ruangan</th>
                                      <th style="width: 90px" class="bg-primary text-white text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php if ($kelas == null) { ?>
                                      <td colspan="6">
                                          <center>
                                              <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                              <p class="mt-3">Tidak ada data</p>
                                          </center>
                                      </td>
                                  <?php } else { ?>
                                      <?php $no = 1;
                                        foreach ($kelas as $r) { ?>
                                          <tr>
                                              <td class="text-center"><?= $no++ ?></td>
                                              <td class="text-center">Kelas <?= $r->kelas ?> <?= $r->urutan_kelas ?></td>
                                              <td class="text-center"><?= $r->nama_ruangan ?></td>
                                              <td class="text-center">
                                                  <a href="" class="action-icon" data-toggle="modal" data-target="#modal-edit<?= $r->id_kelas ?>"> <i class="mdi mdi-pencil"></i></a>
                                                  <a href="<?= base_url('kelas/delete/' . $r->id_kelas) ?>" class="action-icon" id="btn-hapus"> <i class="mdi mdi-delete"></i></a>
                                              </td>
                                          </tr>
                                      <?php } ?>
                                  <?php } ?>
                              </tbody>
                          </table>
                      </div> <!-- end table-responsive-->
                  </div> <!-- end card-body-->
              </div> <!-- end card-->
          </div>
      </div>


      <!-- modal edit -->

      <!-- /.modal -->


  </div>
  <!-- container -->

  </div>
  <!-- content -->
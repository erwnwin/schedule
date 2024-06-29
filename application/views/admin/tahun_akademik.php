  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title">Tahun Akademik</h4>
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


                      <button type="button" class="btn btn-sm btn-primary float-right mb-3" data-toggle="modal" data-target="#modal-tambah">Create Tahun Akademik</button>

                      <div id="modal-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title" id="standard-modalLabel">Input Data Tahun Akademik</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  </div>
                                  <div class="modal-body">


                                      <form class="form-horizontal" action="<?= base_url('tahun-akademik/act-add') ?>" method="post">

                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Tahun Akademik</label>
                                              <div class="col-9">
                                                  <input type="text" class="form-control" name="tahun_akademik" maxlength="9" placeholder="2020/2021" required>
                                              </div>
                                          </div>

                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Tanggal Mulai</label>
                                              <div class="col-9">
                                                  <input type="date" name="tgl_mulai" class="form-control" required>
                                              </div>
                                          </div>

                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Tanggal Berakhir</label>
                                              <div class="col-9">
                                                  <input type="date" name="tgl_akhir" class="form-control" required>
                                              </div>
                                          </div>


                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Semester</label>
                                              <div class="col-9">
                                                  <select name="tipe_semester" class="form-control select2" data-toggle="select2" style="width: 100%;" required>
                                                      <option value="">Pilih Semester</option>
                                                      <option value="Ganjil">Ganjil</option>
                                                      <option value="Genap">Genap</option>
                                                  </select>
                                              </div>
                                          </div>

                                          <div class="form-grup row mb-3">
                                              <label class="col-3 col-form-label">Status</label>
                                              <div class="col-9">
                                                  <div class="mt-2">
                                                      <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="customRadio3" name="status" value="Aktif" class="custom-control-input" disabled>
                                                          <label class="custom-control-label" for="customRadio3">Aktif</label>
                                                      </div>
                                                      <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="customRadio4" name="status" value="Non Aktif" class="custom-control-input" checked>
                                                          <label class="custom-control-label" for="customRadio4">Non Aktifkan</label>
                                                      </div>
                                                  </div>
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

                      <h4 class="header-title mt-1">DATA TAHUN AKADEMIK</h4>

                      <div class="table-responsive">
                          <table class="table table-sm table-hover table-bordered table-centered mb-0 font-14 ">
                              <thead class="thead-light">
                                  <tr>
                                      <th style="width: 10px" class="bg-primary text-white text-center">#</th>
                                      <th class="bg-primary text-white text-center">Tahun Akademik</th>
                                      <th class="bg-primary text-white text-center">Tanggal Mulai</th>
                                      <th class="bg-primary text-white text-center">Tanggal Berakhir</th>
                                      <th class="bg-primary text-white text-center">Status</th>
                                      <th style="width: 150px" class="bg-primary text-white text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $no = 1;
                                    foreach ($ta as $r) { ?>
                                      <tr>
                                          <td class="text-center"><?= $no++ ?></td>
                                          <td><?= $r->tahun_akademik ?></td>
                                          <td><?php echo tanggal_indonesia($r->tgl_mulai) ?></td>
                                          <td><?php echo tanggal_indonesia($r->tgl_akhir) ?></td>
                                          <td class="text-center"><?php if ($r->status == 'Non Aktif') { ?>
                                                  <span class="badge badge-danger-lighten badge-pill">Tidak Aktif</span>
                                              <?php } else { ?>
                                                  <span class="badge badge-success-lighten badge-pill">Aktif</span>
                                              <?php } ?>
                                          </td>

                                          <td class="text-center"><?php if ($r->status == 'Non Aktif') { ?>
                                                  <button type="button" data-toggle="modal" title="Aktifkan" data-target="#modal-Aktif<?= $r->id_ta ?>" class="btn btn-sm btn-flat btn-success"> <i class="mdi mdi-check-underline-circle"></i></button>
                                                  <button type="button" data-toggle="modal" data-target="#modal-edit<?= $r->id_ta ?>" class="btn btn-sm btn-flat btn-warning"> <i class="mdi mdi-calendar-edit"></i></button>
                                                  <a href="<?= base_url('tahun-akademik/delete/' . $r->id_ta) ?>" id="btn-hapus" class="btn btn-sm btn-flat btn-danger"> <i class="mdi mdi-trash-can-outline"></i></a>
                                              <?php } else { ?>
                                                  <button type="button" data-toggle="modal" title="Non Aktifkan" data-target="#modal-nonAktif<?= $r->id_ta ?>" class="btn btn-sm btn-flat btn-info"> <i class="mdi mdi-close-circle"></i></button>
                                                  <button type="button" data-toggle="modal" data-target="#modal-edit<?= $r->id_ta ?>" class="btn btn-sm btn-flat btn-warning"> <i class="mdi mdi-calendar-edit"></i></button>
                                                  <a href="<?= base_url('tahun-akademik/delete/' . $r->id_ta) ?>" id="btn-hapus" class="btn btn-sm btn-flat btn-danger"> <i class="mdi mdi-trash-can-outline"></i></a>
                                              <?php } ?>

                                          </td>
                                      </tr>
                                  <?php } ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>


  </div>
  <!-- container -->

  <?php foreach ($ta as $r) { ?>
      <div id="modal-Aktif<?= $r->id_ta ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" id="standard-modalLabel">Aktifkan Tahun Akademik</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">


                      <form class="form-horizontal" action="<?= base_url('tahun-akademik/act-aktif' . $r->id_ta) ?>" method="post">

                          <div class="alert alert-warning" role="alert">
                              <input type="text" class="form-control" value="<?= $r->id_ta ?>" name="id_ta" hidden>
                              Dengan menekan tombol aktifkan. Tahun akademik akan diaktifkan!N
                          </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-success btn-sm pull-left">Aktifkan</button>
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                  </div>
                  </form>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div>

  <?php } ?>

  </div>
  <!-- content -->
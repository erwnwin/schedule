  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title">Request Jadwal</h4>
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

                      <button type="button" class="btn btn-sm btn-primary float-right mb-3" data-toggle="modal" data-target="#modal-tambah">Request Jadwal</button>

                      <div id="modal-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title" id="standard-modalLabel">Input Request Jadwal</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  </div>
                                  <div class="modal-body">


                                      <form class="form-horizontal" action="<?= base_url('request-jadwal/act-add') ?>" method="post">

                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Guru</label>
                                              <div class="col-9">
                                                  <select name="id_guru" class="form-control select2" data-toggle="select2" style="width: 100%;" required>
                                                      <option value="" selected="selected">Pilih Guru</option>

                                                      <?php
                                                        foreach ($guru as $gur) {
                                                            if (!in_array($gur->id_guru, array_column($requestjadwal, 'id_guru'))) {
                                                        ?>
                                                              <option value="<?= $gur->id_guru ?>"><?= $gur->nama ?></option>
                                                      <?php
                                                            }
                                                        }
                                                        ?>

                                                  </select>
                                                  <!-- <input type="text" class="form-control" name="tahun_akademik" maxlength="9" placeholder="2020/2021" required> -->
                                              </div>
                                          </div>

                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Hari</label>
                                              <div class="col-9">

                                                  <?php
                                                    $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
                                                    foreach ($hari as $value) { ?>
                                                      <div class="custom-control custom-checkbox custom-control-inline">
                                                          <input type="checkbox" name="chkHari[]" class="custom-control-input" id="<?= $value ?>" value="<?= $value ?>">
                                                          <label class="custom-control-label" for="<?= $value ?>"><?= $value ?></label>
                                                      </div>
                                                      <!-- <div class="form-check form-check-inline">
                                                          <input class="form-check-input" name="chkHari[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>">
                                                          <label class="form-check-label" for="<?= $value ?>"><?= $value ?></label>
                                                      </div> -->
                                                  <?php } ?>

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

                      <h4 class="header-title mt-1">DATA REQUEST JADWAL</h4>

                      <?php if ($req == null) { ?>
                          <hr>
                          <center>
                              <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                              <p class="mt-3">Tidak ada data</p>
                          </center>

                      <?php } else { ?>
                          <hr>
                          <div class="table-responsive">
                              <table class="table table-sm table-hover table-bordered table-centered mb-0 font-14 ">
                                  <thead class="thead-light">
                                      <tr>
                                          <th style="width: 10px" class="bg-primary text-white text-center">#</th>
                                          <th class="bg-primary text-white text-center">Nama Guru</th>
                                          <th class="bg-primary text-white text-center">Hari</th>
                                          <th style="width: 90px" class="bg-primary text-white text-center">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $no = 1;
                                        foreach ($req as $r) { ?>
                                          <tr>
                                              <td class="text-center"><?= $no++ ?></td>
                                              <td class="text-center"><?= $r->nama ?></td>
                                              <td><?= $r->hari ?></td>
                                              <td class="text-center">
                                                  <!-- <button type="button" data-toggle="modal" data-target="#modal-edit<?= $r->id_mapel ?>" class="btn btn-sm btn-flat btn-warning"> <i class="fa fa-edit"></i></button> -->
                                                  <button type="button" data-toggle="modal" data-target="#modal-hapus<?= $r->id_request ?>" class="btn btn-sm btn-flat btn-danger"> <i class="mdi mdi-trash-can-outline"></i></button>
                                              </td>
                                          </tr>
                                      <?php } ?>
                                  </tbody>
                              </table>
                          </div>
                      <?php } ?>

                  </div>
              </div>
          </div>
      </div>



  </div>
  <!-- container -->

  </div>
  <!-- content -->
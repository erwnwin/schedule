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
                      <button type="button" class="btn btn-sm btn-primary float-right mb-3" data-toggle="modal" data-target="#modal-tambah">Add Mapel</button>

                      <div id="modal-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title" id="standard-modalLabel">Input Data Mata Pelajaran</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  </div>
                                  <div class="modal-body">
                                      <form class="form-horizontal" method="post" action="<?= base_url('mata-pelajaran/act-add2') ?>">
                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Kode Mata Pelajaran</label>
                                              <div class="col-9">
                                                  <input type="text" name="kode_mapel" class="form-control" required="required" value="" placeholder="Kode Mata Pelajaran" autocomplete="off" />
                                                  <input type="hidden" name="jenis" class="form-control" required="required" value="TEORI" placeholder="Nama/Kode Ruangan" />
                                              </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Nama Mata Pelajaran</label>
                                              <div class="col-9">
                                                  <input type="text" name="nama_mapel" class="form-control" required="required" value="" placeholder="Mata Pelajaran" autocomplete="off" />
                                              </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Kelas</label>
                                              <div class="col-9">
                                                  <?php
                                                    $kls = $this->db->query("SELECT * FROM kelasku")->result();
                                                    foreach ($kls as $k) { ?>

                                                      <div class="custom-control custom-checkbox">
                                                          <input class="custom-control-input" name="chkKelas[]" type="checkbox" id="<?= $k->id_kelas ?>" value="<?= $k->id_kelas ?>">
                                                          <label class="custom-control-label" for="<?= $k->id_kelas ?>"> Kelas <?= $k->kelas ?> <?= $k->urutan_kelas ?></label>
                                                      </div>
                                                  <?php } ?>
                                              </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Semester</label>
                                              <div class="col-9">
                                                  <select name="kelompok_mapel" class="form-control" required>
                                                      <option value="">Pilih Semester</option>
                                                      <option value="A">Ganjil</option>
                                                      <option value="B">Genap</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Beban Jam</label>
                                              <div class="col-9">
                                                  <input type="text" name="beban_jam" class="form-control" maxlength="2" required="required" value="" placeholder="Beban Jam" autocomplete="off" />
                                                  <span class="text-danger text-small" style="font-size: 10px;">Input angka 1-10 (sesuaikan berapa beban jam bukan menit)</span>
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

                      <h4 class="header-title mt-1">MATA PELAJARAN</h4>

                      <div class="table-responsive">
                          <table class="table table-sm table-hover table-bordered table-centered mb-0 font-14 ">
                              <thead class="thead-light">
                                  <tr>
                                      <th style="width: 10px" class="bg-primary text-white text-center">#</th>
                                      <th class="bg-primary text-white text-center">Kode Mata Pelajaran</th>
                                      <th class="bg-primary text-white text-center">Nama Mata Pelajaran</th>
                                      <th class="bg-primary text-white text-center">Kelas</th>
                                      <th class="bg-primary text-white text-center">JP</th>
                                      <th style="width: 90px" class="bg-primary text-white text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php if ($mapel == null) { ?>
                                      <td colspan="6">
                                          <center>
                                              <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                              <p class="mt-3">Tidak ada data</p>
                                          </center>
                                      </td>
                                  <?php } else { ?>
                                      <?php $no = 1;
                                        foreach ($mapel as $r) { ?>
                                          <tr>
                                              <td><?= $no++ ?></td>
                                              <td><?= $r->kode_mapel ?></td>
                                              <td><?= $r->nama_mapel ?></td>
                                              <td><?= $r->id_kelas ?></td>
                                              <td><?= $r->beban_jam ?></td>
                                              <td class="text-center">
                                                  <a href="" class="action-icon" data-toggle="modal" data-target="#modal-edit<?= $r->id_mapel ?>"> <i class="mdi mdi-pencil"></i></a>
                                                  <a href="<?= base_url('mata-pelajaran/delete/' . $r->id_mapel) ?>" class="action-icon" id="btn-hapus"> <i class="mdi mdi-delete"></i></a>
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

      <!-- Modal Edit -->
      <?php foreach ($mapel as $r) { ?>
          <div id="modal-edit<?= $r->id_mapel ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="edit-modalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="edit-modalLabel">Edit Data Mata Pelajaran</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      </div>
                      <div class="modal-body">
                          <form class="form-horizontal" method="post" action="<?= base_url('mata-pelajaran/act-edit') ?>">
                              <input type="hidden" name="id_mapel" value="<?= $r->id_mapel ?>">
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Kode Mata Pelajaran</label>
                                  <div class="col-9">
                                      <input type="text" name="kode_mapel" class="form-control" required="required" value="<?= $r->kode_mapel ?>" placeholder="Kode Mata Pelajaran" autocomplete="off" />
                                      <input type="hidden" name="jenis" class="form-control" required="required" value="TEORI" placeholder="Nama/Kode Ruangan" />
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Nama Mata Pelajaran</label>
                                  <div class="col-9">
                                      <input type="text" name="nama_mapel" class="form-control" required="required" value="<?= $r->nama_mapel ?>" placeholder="Mata Pelajaran" autocomplete="off" />
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Kelas</label>
                                  <div class="col-9">
                                      <?php
                                        $kls = $this->db->query("SELECT * FROM kelasku")->result();
                                        foreach ($kls as $k) {
                                            $checked = in_array($k->id_kelas, explode(',', $r->id_kelas)) ? 'checked' : '';
                                        ?>
                                          <div class="custom-control custom-checkbox">
                                              <input class="custom-control-input" name="chkKelas[]" type="checkbox" id="<?= $k->id_kelas ?>" value="<?= $k->id_kelas ?>" <?= $checked ?>>
                                              <label class="custom-control-label" for="<?= $k->id_kelas ?>"> Kelas <?= $k->kelas ?> <?= $k->urutan_kelas ?></label>
                                          </div>
                                      <?php } ?>
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Semester</label>
                                  <div class="col-9">
                                      <select name="kelompok_mapel" class="form-control" required>
                                          <option value="A" <?= $r->kelompok_mapel == 'A' ? 'selected' : '' ?>>Ganjil</option>
                                          <option value="B" <?= $r->kelompok_mapel == 'B' ? 'selected' : '' ?>>Genap</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Beban Jam</label>
                                  <div class="col-9">
                                      <input type="text" name="beban_jam" class="form-control" maxlength="2" required="required" value="<?= $r->beban_jam ?>" placeholder="Beban Jam" autocomplete="off" />
                                      <span class="text-danger text-small" style="font-size: 10px;">Input angka 1-10 (sesuaikan berapa beban jam bukan menit)</span>
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
      <?php } ?>




  </div>
  <!-- container -->

  </div>
  <!-- content -->
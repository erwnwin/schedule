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
          <div id="flash" data-flash="<?= $this->session->flashdata('sukses'); ?>"></div>
          <div id="flash-edit" data-flash="<?= $this->session->flashdata('edit'); ?>"></div>

          <div class="col-xl-12 col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <!-- <a href="<?= base_url('guru/create') ?>" class="p-0 float-right mb-3 "> <i class="mdi mdi-plus ml-1"></i> Create</a> -->
                      <button type="button" class="btn btn-sm btn-primary float-right mb-3" data-toggle="modal" data-target="#modal-tambah">Create Guru</button>

                      <div id="modal-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title" id="standard-modalLabel">Input Data Guru / Akun Guru</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  </div>
                                  <div class="modal-body">
                                      <!-- <div class="d-flex justify-content-center">
                                          <div class="spinner-border" role="status"></div>
                                      </div> -->
                                      <!-- <center>
                                          <div class="d-flex justify-content-center">
                                              <div class="spinner-border avatar-md text-primary" role="status"></div>
                                          </div>
                                      </center> -->

                                      <form class="form-horizontal" method="post" action="<?= base_url('guru/act') ?>">
                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">NIP/NIK</label>
                                              <div class="col-9">
                                                  <input type="number" name="nip_nik" class="form-control" placeholder="NIP/NIK/Nomor" required>
                                              </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Nama Lengkap Guru</label>
                                              <div class="col-9">
                                                  <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap Guru (Beserta Gelar)" required>
                                              </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Jenis Kelamin</label>
                                              <div class="col-9">
                                                  <select class="form-control" name="jenis_kelamin" required>
                                                      <option value="">Pilih Jenis Kelamin</option>
                                                      <option value="Laki-laki">Laki-laki</option>
                                                      <option value="Perempuan">Perempuan</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Alamat</label>
                                              <div class="col-9">
                                                  <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                                              </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                              <label for="inputPassword3" class="col-3 col-form-label">No WhatsApp <span class="text-danger">*aktif</span></label>
                                              <div class="col-9">
                                                  <div class="input-group">
                                                      <div class="input-group-prepend">
                                                          <span class="input-group-text">+62</span>
                                                      </div>
                                                      <input type="text" name="telp_wa" class="form-control" placeholder="82xxxxxxx" value="" maxlength="13" required>

                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Warna</label>
                                              <div class="col-9">
                                                  <input class="form-control" type="color" name="warna_guru" value="#727cf5">
                                              </div>
                                          </div>
                                          <center>
                                              <h5 class="modal-title text-white" style="background-color: teal;"><i class="uil-user"></i> Data Akun </h5>
                                          </center>
                                          <div class="form-group row mb-3 mt-3">
                                              <label class="col-3 col-form-label">Alamat Email</label>
                                              <div class="col-9">
                                                  <input type="email" name="alamat_email" class="form-control" placeholder="Alamat email" required>
                                              </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                              <label class="col-3 col-form-label">Password</label>
                                              <div class="col-9">
                                                  <input type="text" name="password" class="form-control" placeholder="*******" required>
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
                      <h4 class="header-title mt-1">DATA GURU</h4>


                      <div class="table-responsive">
                          <table class="table table-sm table-hover table-bordered table-centered mb-0 font-14 ">
                              <thead class="thead-light">
                                  <tr>
                                      <th style="width: 10px" class="bg-primary text-white text-center">#</th>
                                      <th class="bg-primary text-white text-center">NIP/NIK</th>
                                      <th class="bg-primary text-white text-center">Nama Lengkap Guru (Beserta Gelar)</th>
                                      <th class="bg-primary text-white text-center">Alamat</th>
                                      <th class="bg-primary text-white text-center">WA Aktif</th>
                                      <th style="width: 90px" class="bg-primary text-white text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php if ($guru == null) { ?>
                                      <td colspan="6">
                                          <center>
                                              <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                              <p class="mt-3">Tidak ada data</p>
                                          </center>
                                      </td>
                                  <?php } else { ?>
                                      <?php $no = 1;
                                        foreach ($guru as $g) { ?>
                                          <tr style="background-color: <?= $g->warna_guru ?>;" class="text-white">
                                              <td><?= $no++ ?></td>
                                              <td><?= $g->nip_nik ?></td>
                                              <td><?= $g->nama ?></td>
                                              <td><?= $g->alamat ?></td>
                                              <td>+<?= $g->telp_wa ?> <span class="badge badge-danger">aktif</span></td>
                                              <td class="text-center">
                                                  <a href="" class="action-icon text-white" data-toggle="modal" data-target="#modal-edit<?= $g->id_guru ?>"> <i class="mdi mdi-pencil"></i></a>
                                                  <a href="<?= base_url('guru/delete/' . $g->id_guru) ?>" class="action-icon text-white" id="btn-hapus"> <i class="mdi mdi-delete"></i></a>
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
      <?php foreach ($guru as $g) { ?>
          <div id="modal-edit<?= $g->id_guru ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="standard-modalLabel">Edit Data Guru / Akun Guru</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      </div>
                      <div class="modal-body">
                          <form class="form-horizontal" method="post" action="<?= base_url('guru/act-edit') ?>">
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">NIP/NIK</label>
                                  <div class="col-9">
                                      <input type="hidden" name="id_guru" class="form-control" value="<?= $g->id_guru ?>" required="required" placeholder="NIP/NIK/Nomor" />
                                      <input type="number" name="nip_nik" class="form-control" value="<?= $g->nip_nik ?>" placeholder="NIP/NIK/Nomor" required>
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Nama Lengkap Guru</label>
                                  <div class="col-9">
                                      <input type="text" name="nama" class="form-control" value="<?= $g->nama ?>" placeholder="Nama Lengkap Guru (Beserta Gelar)" required>
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Jenis Kelamin</label>
                                  <div class="col-9">
                                      <select class="form-control" name="jenis_kelamin" required>
                                          <option value="">Pilih Jenis Kelamin</option>
                                          <option value="Laki-laki" <?php if ($g->jenis_kelamin == 'Laki-laki') echo 'selected' ?>>Laki-laki</option>
                                          <option value="Perempuan" <?php if ($g->jenis_kelamin == 'Perempuan') echo 'selected' ?>>Perempuan</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Alamat</label>
                                  <div class="col-9">
                                      <input type="text" name="alamat" class="form-control" value="<?= $g->alamat ?>" placeholder="Alamat" required>
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label for="inputPassword3" class="col-3 col-form-label">No WhatsApp <span class="text-danger">*aktif</span></label>
                                  <div class="col-9">
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">+62</span>
                                          </div>
                                          <input type="text" name="telp_wa" class="form-control" value="<?= $g->telp_wa ?>" placeholder="82xxxxxxx" value="" maxlength="13" required>

                                      </div>
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Warna</label>
                                  <div class="col-9">
                                      <input class="form-control" type="color" name="warna_guru" value="<?= $g->warna_guru ?>">
                                  </div>
                              </div>
                              <center>
                                  <h5 class="modal-title text-white" style="background-color: teal;"><i class="uil-user"></i> Data Akun </h5>
                              </center>
                              <div class="form-group row mb-3 mt-3">
                                  <label class="col-3 col-form-label">Alamat Email</label>
                                  <div class="col-9">
                                      <input type="email" name="alamat_email" value="<?= $g->alamat_email ?>" class="form-control" placeholder="Alamat email" required>
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Password</label>
                                  <div class="col-9">
                                      <input type="text" name="password" value="<?= $g->password ?>" class="form-control" placeholder="*******" required>
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
          </div>
      <?php } ?>
      <!-- /.modal -->


  </div>
  <!-- container -->

  </div>
  <!-- content -->
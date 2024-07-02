  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title">Data Jam</h4>
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
                      <div class="card-widgets">
                          <!-- <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a> -->
                          <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-plus"></i> </a>
                          <!-- <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a> -->
                      </div>
                      <h5 class="card-title mb-0">Create Range Jam</h5>
                      <div id="cardCollpase1" class="collapse pt-3 ">
                          <form action="<?= base_url() ?>jam/act-add" method="post" class="form-horizontal">
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Hari</label>
                                  <div class="col-9">
                                      <?php
                                        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
                                        foreach ($hari as $value) {
                                            $checked = '';
                                            if (in_array($value, array_column($range_jam, 'hari'))) {
                                                $checked = 'disabled checked';
                                            }
                                        ?>
                                          <div class="custom-control custom-checkbox">
                                              <input class="custom-control-input flat-red" name="chkJadwalHari[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>" <?= $checked ?>>
                                              <label class="custom-control-label" for="<?= $value ?>"><?= $value ?></label>
                                          </div>
                                      <?php } ?>
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Sesi Per Hari</label>
                                  <div class="col-9">
                                      <input type="number" class="form-control" required="required" name="sesi" id="sesi" min="5" max="20" placeholder="Minimal input 5" autocomplete="off" />
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Waktu Per Sesi</label>
                                  <div class="col-9">
                                      <input type="number" name="durasi" id="durasi" min="10" max="60" class="form-control" required="required" value="" placeholder="Minimal input 10" autocomplete="off" />
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Sesi Dimulai</label>
                                  <div class="col-9">
                                      <input type="time" name="waktuMulai" id="waktuMulai" class="form-control" required="required" value="" placeholder="Minimal input 10" autocomplete="off" />
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                  <!-- <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button> -->
                              </div>
                          </form>
                      </div>
                  </div>
              </div> <!-- end card-->
          </div>

          <div class="col-xl-12 col-lg-12">

              <div class="card">
                  <div class="card-body">

                      <h4 class="header-title mt-1">DATA JAM</h4>

                      <div class="table-responsive">
                          <table class="table table-sm table-hover table-bordered table-centered mb-0 font-14 ">
                              <thead class="thead-light">
                                  <tr>
                                      <th style="width: 10px" class="bg-primary text-white text-center">#</th>
                                      <th class="bg-primary text-white text-center">Hari</th>
                                      <th class="bg-primary text-white text-center">Sesi Per Hari</th>
                                      <th class="bg-primary text-white text-center">Durasi Per Hari</th>
                                      <th class="bg-primary text-white text-center">Jam Dimulai</th>
                                      <th style="width: 90px" class="bg-primary text-white text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php if ($range_jam == null) { ?>
                                      <td colspan="6">
                                          <center>
                                              <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                              <p class="mt-3">Tidak ada data</p>
                                          </center>
                                      </td>
                                  <?php } else { ?>
                                      <?php $no = 1;
                                        foreach ($range_jam as $r) { ?>
                                          <tr>
                                              <td class="text-center"><?= $no++ ?></td>
                                              <td class="text-center"><?= $r->hari ?></td>
                                              <td class="text-center"><?= $r->jumlah_sesi ?> Sesi</td>
                                              <td class="text-center"><?= $r->lama_sesi ?> Menit</td>
                                              <td class="text-center"><?= $r->jam_mulai ?></td>
                                              <td class="text-center">
                                                  <a href="" class="action-icon" data-toggle="modal" data-target="#modal-edit<?= $r->id_jadwal ?>"> <i class="mdi mdi-pencil"></i></a>
                                                  <form action="<?= base_url('jam/delete/' . $r->id_jadwal) ?>" method="post">
                                                      <button type="submit" class="btn btn-xs btn-sm btn-danger" id="btn-hapus-ku"> <i class="mdi mdi-delete"></i></button>
                                                  </form>

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
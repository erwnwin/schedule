  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title">Jadwal : <?=
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
                      <h4 class="header-title mt-1">Jadwalku ~ <span class="badge bg-info text-white">Silahkan pilih hari</span></h4>
                      <hr>
                      <?php

                        $id_guru = $this->session->userdata('id_guru');

                        $jadwalku = $this->db->query("SELECT * FROM penjadwalan
                            JOIN mapelku ON penjadwalan.id_mapel=mapelku.id_mapel
                            JOIN guru ON penjadwalan.id_guru=guru.id_guru
                            JOIN kelasku ON penjadwalan.id_kelas=kelasku.id_kelas
                            WHERE penjadwalan.id_guru='$id_guru' ")->result();

                        if ($jadwalku == null) { ?>
                          <center>
                              <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                              <p class="mt-3">Tidak ada data</p>
                          </center>
                      <?php } else { ?>

                          <form id="formJadwalku" action="<?= base_url('jadwalku') ?>" method="post">
                              <div class="row">
                                  <div class="col-sm-12">
                                      <select name="btnPilihJadwal" id="btnPilihJadwal" class="form-control select2" data-toggle="select2" style="width: 100%;">
                                          <option value="">Pilih Hari</option>
                                          <?php foreach ($hari as $h) {  ?>
                                              <option value="<?= $h->nama_hari ?>" <?php if ($this->input->post('btnPilihJadwal') == $h->nama_hari) {
                                                                                        echo 'selected="selected"';
                                                                                    } ?>>
                                                  <?= $h->nama_hari ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                              </div>
                          </form>


                          <?php if (isset($_POST["btnPilihJadwal"])) {

                                $id_guru = $this->session->userdata('id_guru');

                                $jadwalkuu = $this->db->query("SELECT * FROM penjadwalan
                                    JOIN mapelku ON penjadwalan.id_mapel=mapelku.id_mapel
                                    JOIN guru ON penjadwalan.id_guru=guru.id_guru
                                    JOIN kelasku ON penjadwalan.id_kelas=kelasku.id_kelas
                                    WHERE penjadwalan.hari='$_POST[btnPilihJadwal]' AND penjadwalan.id_guru='$id_guru' ")->result(); ?>

                              <div class="box-footer table-responsive">

                                  <?php if ($jadwalkuu == null) { ?>
                                      <br>
                                      <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                          <strong>Maaf!</strong><br>
                                          Tidak ada data jadwal yang cocok untuk hari yang dipilih
                                      </div>
                                      <!-- <div class="callout callout-danger">
                                          <h4>Maaf!</h4>
                                          <p>T</p>
                                      </div> -->

                                  <?php } else { ?>
                                      <!-- <p>Hari : <?= $_POST["btnPilihJadwal"] ?></p> -->
                                      <br>
                                      <div class="table-responsive">
                                          <table class="table table-bordered table-striped table-hover">
                                              <tr>
                                                  <th style="width: 10px" class="bg-danger text-center text-white">#</th>
                                                  <th style="width: 150px" class="bg-danger text-center text-white">Kode Mata Pelajaran</th>
                                                  <th style="width: 270px" class="bg-danger text-center text-white">Mata Pelajaran</th>
                                                  <th style="width: 100px" class="bg-danger text-center text-white">Kelas</th>
                                                  <th style="width: 30px" class="bg-danger text-center text-white">Sesi</th>
                                                  <th style="width: 100px" class="bg-danger text-center text-white">Hari</th>
                                                  <th style="width: 250px" class="bg-danger text-center text-white">Jam Mulai s.d Jam Selesai</th>
                                              </tr>
                                              <?php $no = 1;
                                                $tgl = date('Y-m-d');
                                                $hari = nama_hariku($tgl);
                                                // $hari = "Senin";
                                                // echo "$hari";
                                                foreach ($jadwalkuu as $j) { ?>
                                                  <tr>
                                                      <td class="text-center"><?= $no++ ?></td>
                                                      <td class="text-center"><?= $j->kode_mapel ?></td>
                                                      <td class="text-center"><?= $j->nama_mapel ?></td>
                                                      <td class="text-center">Kelas <?= $j->kelas ?>.<?= $j->urutan_kelas ?></td>
                                                      <td class="text-center"><?= $j->sesi ?></td>
                                                      <td class="text-center"><?= $j->hari ?>
                                                          <?php if ($j->hari == $hari) { ?>
                                                              <span class="label label-danger">Hari Ini</span>
                                                          <?php } else { ?>

                                                          <?php } ?>
                                                      </td>
                                                      <td class="text-center"><?= $j->jam_mulai ?> s.d <?= $j->jam_selesai ?></td>
                                                  </tr>
                                              <?php } ?>
                                          </table>
                                      </div>
                                  <?php } ?>
                              </div>
                          <?php } ?>

                      <?php } ?>




                  </div>
                  <!-- <div id="divOverlayformJadwalku" class="overlay hide">
                      <i class="mdi mdi-spin mdi-loading mr-1"></i>
                  </div> -->
              </div>
          </div>
      </div>
  </div>
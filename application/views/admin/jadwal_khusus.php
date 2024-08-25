  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title">Data Jadwal Khusus</h4>
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
                      <div class="card-widgets">
                          <!-- <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a> -->
                          <a data-toggle="collapse" href="#addJadwalKhusus" role="button" aria-expanded="false" aria-controls="addJadwalKhusus"><i class="mdi mdi-plus"></i> </a>
                          <!-- <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a> -->
                      </div>
                      <h5 class="card-title mb-0">Create Jadwal Khusus</h5>
                      <div id="addJadwalKhusus" class="collapse pt-3 ">
                          <form action="<?= base_url() ?>jadwal-khusus/act-add" method="post" class="form-horizontal">
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Hari</label>
                                  <div class="col-9">



                                      <?php
                                        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
                                        foreach ($hari as $value) { ?>
                                          <div class="custom-control custom-checkbox">
                                              <input class="form-control-input" name="hari[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>">
                                              <label class="form-control-label" for="<?= $value ?>"><?= $value ?></label>
                                          </div>
                                      <?php } ?>


                                  </div>
                              </div>


                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Kelas</label>
                                  <div class="col-9">

                                      <?php
                                        $kelas = ['X', 'XI', 'XII'];
                                        foreach ($kelas as $value) { ?>
                                          <div class="custom-control custom-checkbox">
                                              <input class="form-control-input" name="kelas[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>">
                                              <label class="form-control-label" for="<?= $value ?>">Kelas <?= $value ?></label>
                                          </div>
                                      <?php } ?>


                                  </div>
                              </div>

                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Keterangan Jadwal Khusus</label>
                                  <div class="col-9">
                                      <input type="text" name="keterangan" id="keterangan" class="form-control" required="required" value="" placeholder="Keterangan jadwal khusus. Cth: Upacara Bendera, Istirahat" autocomplete="off" />

                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Sesi Ke-</label>
                                  <div class="col-9">
                                      <input type="number" name="sesi" id="sesi" min="0" max="20" class="form-control" required="required" value="" placeholder="Minimal input 0 / maksimal input 20" autocomplete="off" />
                                  </div>
                              </div>
                              <div class="form-group row mb-3">
                                  <label class="col-3 col-form-label">Durasi</label>
                                  <div class="col-9">
                                      <input type="number" name="durasi" id="durasi" class="form-control" required="required" value="" placeholder="Input number untuk durasi" autocomplete="off" />
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
                      <h5 class="card-title mb-2">Jadwal Khusus</h5>
                      <hr>
                      <table id="basic-datatable" class="table table-hover table-striped table-sm dt-responsive nowrap w-100">
                          <thead>
                              <tr class="text-white">
                                  <th style="width: 10px" class="bg-success text-center">#</th>
                                  <th class="bg-success text-center">Hari</th>
                                  <th class="bg-success text-center">Kelas</th>
                                  <th class="bg-success text-center">Keterangan</th>
                                  <th class="bg-success text-center">Sesi</th>
                                  <th class="bg-success text-center">Durasi</th>
                                  <th style="width: 90px" class="bg-success text-center">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php

                                $no = 1;
                                foreach ($jadwal_khusus as $row) {

                                ?>

                                  <tr>
                                      <td><?= $no; ?></td>
                                      <td class="text-center"><?= $row['hari'] ?></td>
                                      <td class="text-center"><?= $row['kelas'] ?></td>
                                      <td><?= $row['keterangan'] ?></td>
                                      <td class="text-center"><?= $row['sesi'] ?></td>
                                      <td class="text-center"><?= $row['durasi'] ?></td>
                                      <td class="text-center">
                                          <div class="btn-group">
                                              <!-- <a href="<?= base_url() ?>DataJadwalKhusus/hapus/<?= $row['id_jadwal_khusus']  ?>" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('yakin ?')"><i class="fa fa-trash"></i></a> -->
                                              <a href="<?= base_url() ?>DataJadwalKhusus/ubah/<?= $row['id_jadwal_khusus']  ?>" class="btn btn-warning btn-sm btn-rounded">Update</a>
                                          </div>
                                      </td>
                                  </tr>

                              <?php
                                    $no++;
                                }
                                ?>
                          </tbody>
                      </table>

                  </div>
              </div>
          </div>




          <?php
            if (empty($dataKelas)) {
                echo '<div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">';
                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                echo '<span aria-hidden="true">&times;</span>';
                echo '<h4><i class="icon fa fa-times-circle"></i> Maaf!</h4>';
                echo 'Data Kelas Belum Terisi';
                echo '</div>';
            }
            if (empty($jadwal)) {
                // echo '<div class="alert alert-danger alert-dismissible">';
                // echo '<button type="button" class="close" data-dismiss="alert" ;aria-hidden="true">×</button>';
                // echo '<h4><i class="icon fa fa-times-circle"></i> Maaf!</h4>';
                // echo 'Data Jadwal Belum Terisi';
                // echo '</div>';
                echo '<div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">';
                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                echo '<span aria-hidden="true">&times;</span>';
                echo '<h4><i class="icon fa fa-times-circle"></i> Maaf!</h4>';
                echo 'Data Jadwal Belum Terisi';
                echo '</div>';
            }
            ?>

          <?php if (!empty($jadwal) && !empty($dataKelas)) : ?>
              <?php
                $arrHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
                $hari = array_column($jadwal, 'hari');
                function keteranganSesi($jadwal_khusus, $hari, $kelas, $sesi)
                {
                    foreach ($jadwal_khusus as $value) {
                        if ($value['hari'] == $hari && $value['kelas'] == $kelas && $value['sesi'] == $sesi) {
                            return $value['keterangan'];
                        }
                    }
                    // return ;
                }
                foreach ($arrHari as $valueHari) {
                    if (in_array($valueHari, $hari)) {
                        # code...
                        // foreach ($hari as $valueHari) :
                        $keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
                        $jumlahSesi = $jadwal[$keyJadwal]->jumlah_sesi;
                ?>
                      <div class="col-xl-12 col-lg-12">
                          <div class="card">
                              <div class="card-body">
                                  <div class="card-widgets">
                                      <!-- <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a> -->
                                      <a data-toggle="collapse" href="#hari<?= $valueHari ?>" role="button" aria-expanded="false" aria-controls="hari<?= $valueHari ?>"><i class="mdi mdi-plus"></i> </a>
                                      <!-- <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a> -->
                                  </div>
                                  <h5 class="card-title mb-0"><strong><?= $valueHari ?></strong></h5>
                                  <div id="hari<?= $valueHari ?>" class="collapse pt-3 ">
                                      <div class="table-responsive">
                                          <table class="table table-sm table-hover table-bordered table-centered mb-0 font-14 ">
                                              <thead class="bg-primary text-white">

                                                  <tr>
                                                      <th class="danger text-center" style="width: 100px;">Sesi Ke-</th>
                                                      <?php foreach ($dataKelas as $valueKelas) : ?>
                                                          <!-- <h5 class="card-title mb-0">Kelas <?= $valueKelas->kelas ?>.<?= $valueKelas->urutan_kelas ?></h5> -->
                                                          <th class="danger text-center">Kelas <?= $valueKelas->kelas ?>.<?= $valueKelas->urutan_kelas ?> </th>
                                                      <?php endforeach; ?>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <?php
                                                    // print_r($penjadwalan);
                                                    for ($i = 0; $i < $jumlahSesi; $i++) { ?>
                                                      <tr>
                                                          <td class="text-center"><?= $i ?></td>
                                                          <?php foreach ($dataKelas as $valueKelas) : ?>
                                                              <td class="text-center">
                                                                  <?php
                                                                    $result =  keteranganSesi($jadwal_khusus, $valueHari, $valueKelas->kelas, $i);
                                                                    echo $result;
                                                                    ?>
                                                              </td>
                                                          <?php endforeach; ?>
                                                      </tr>
                                                  <?php } ?>
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
              <?php
                        // endforeach;
                    }
                }
                ?>
      </div>

  <?php endif; ?>


  </div>
  </div>
  </div>
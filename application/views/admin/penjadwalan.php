  <!-- Start Content-->

  <?php
    ini_set('display_errors', 'Off');
    ini_set('error_reporting', E_ALL);
    ?>

  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title">Penjadwalan</h4>
              </div>
          </div>
      </div>
      <!-- end page title -->



      <div class="row">

          <div id="flash-gagal" data-flash="<?= $this->session->flashdata('gagal'); ?>"></div>
          <div id="flash" data-flash="<?= $this->session->flashdata('sukses'); ?>"></div>
          <div id="flash-edit" data-flash="<?= $this->session->flashdata('edit'); ?>"></div>

          <div class="col-xl-12 col-lg-12">

              <?php
                if (empty($rangeJam)) {
                    echo '<div class="alert alert-danger alert-dismissible">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo '<h4><i class="icon fa fa-ban"></i> Gagal</h4>';
                    echo 'Data Range Jam Belum Terisi';
                    echo '</div>';
                }
                if (empty($penjadwalan)) {
                    echo '<div class="alert alert-danger alert-dismissible">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo '<h4><i class="icon fa fa-ban"></i> Gagal</h4>';
                    echo 'Data Penjadwalan Belum Terisi';
                    echo '</div>';
                } else {

                    echo '<div class="alert alert-success alert-dismissible">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo '<h4><i class="icon fa fa-check"></i> Sukses</h4>';
                    echo 'Data Penjadwalan Siap';
                    echo '</div>';
                }
                if (empty($rumusan)) {

                    echo '<div class="alert alert-danger alert-dismissible">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo '<h4><i class="icon fa fa-ban"></i> Gagal</h4>';
                    echo 'Data Rumusan Belum Terisi';
                    echo '</div>';
                } else {
                    echo '<div class="alert alert-success alert-dismissible">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo '<h4><i class="icon fa fa-check"></i> Sukses</h4>';
                    echo 'Data Rumusan Siap';
                    echo '</div>';
                }
                ?>

              <div class="alert alert-success bg-success text-white text-center" role="alert">
                  <h4>Jadwal Belum Terplot</h4>
                  <div class="table-responsive">
                      <table class="table table-bordered">
                          <tr>
                              <th class="text-center text-white">Kelas</th>
                              <!-- <th class="text-center text-white">Id Guru</th> -->
                              <th class="text-center text-white">Nama Guru</th>
                              <th class="text-center text-white">Mata Pelajaran</th>
                              <th class="text-center text-white">Beban Jam</th>
                              <th class="text-center text-white">Jumlah Yang belum Terplot</th>
                              <th class="text-center text-white">Request Jadwal</th>
                              <?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
                                  <th class="text-center text-white">Action</th>
                              <?php endif; ?>
                          </tr>

                          <?php if ($belumterplot == null) { ?>
                              <tr>
                                  <td colspan="7" class="text-center text-white">Belum ada data</td>
                              </tr>
                          <?php } else { ?>
                              <?php foreach ($belumterplot as $valueBelumterplot) : ?>
                                  <tr>
                                      <td class="text-white"><?= $valueBelumterplot->id_kelas ?></td>
                                      <!-- <td><?= $valueBelumterplot->id_guru ?></td> -->
                                      <td class="text-white"><?= $valueBelumterplot->nama ?></td>
                                      <td class="text-white"><?= $valueBelumterplot->nama_mapel ?></td>
                                      <td class="text-white"><?= $valueBelumterplot->beban_jam ?></td>
                                      <td class="text-white"><?= $valueBelumterplot->sisa_jam ?></td>
                                      <td class="text-white"><?= $valueBelumterplot->hari ?></td>
                                      <?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
                                          <td class="text-white"><button data-tugasguru="<?= $valueBelumterplot->id_tugas ?>" data-guru="<?= $valueBelumterplot->nama ?>" data-mapel="<?= $valueBelumterplot->nama_mapel ?>" data-kelas="<?= $valueBelumterplot->id_kelas ?>" data-request="<?= $valueBelumterplot->hari ?>" class="btn btn-primary plotting">Plotting</button></td>
                                      <?php endif; ?>
                                  </tr>
                              <?php endforeach; ?>
                          <?php } ?>

                      </table>
                  </div>
              </div>

              <div class="card">
                  <div class="card-body">
                      <h4 class="header-title mt-1">DATA PENJADWALAN</h4>
                      <?php if (empty($rumusan)) { ?>
                          <?php if (!empty($penjadwalan)) { ?>
                              <div class="button-list">
                                  <a class="btn btn-primary btn-flat pull-right" href="<?= base_url('penjadwalan/rumusan') ?>"><i class="fa fa-edit"></i> Masukkan Rumusan</a>
                              </div>
                          <?php } ?>
                      <?php } else { ?>
                          <div class="button-list">
                              <a class="btn btn-danger btn-flat pull-left" href="<?= base_url('penjadwalan/reset-rumusan') ?>"><i class="fa fa-undo"></i> Reset Rumusan</a>

                          <?php } ?>
                          <?php
                            if (empty($penjadwalan)) {
                                if (!empty($rangeJam)) {
                            ?>
                                  <div class="button-list">
                                      <a type="button" data-toggle="modal" data-target="#modal-buatJadwal" class="btn btn-success btn-flat pull-right text-white">Buat Jadwal</a>
                                  </div>
                                  <div id="modal-buatJadwal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h4 class="modal-title" id="standard-modalLabel">Buat Jadwal</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                              </div>
                                              <div class="modal-body">


                                                  <form class="form-horizontal" action="<?= base_url('penjadwalan/create-jadwal') ?>" method="post">

                                                      <div class="alert alert-danger" role="alert">
                                                          Dengan menekan tombol buat maka jadwal akan dibuat. Selanjutnya untuk menekan tombol buat rumusan
                                                      </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="submit" class="btn btn-success btn-sm pull-left">Buat Jadwal</button>
                                                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                                              </div>
                                              </form>
                                          </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                  </div>
                              <?php
                                }
                            } else {
                                ?>

                              <a class="btn btn-warning btn-flat pull-left" href="<?= base_url('penjadwalan/reset-jadwal') ?>"><i class="fa fa-undo"></i> Reset Jadwal</a>
                          </div>
                      <?php } ?>

                      <?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
                          <br>
                          <hr>
                          <div class="button-list">
                              <a class="btn btn-warning btn-flat pull-right" href="<?= base_url('penjadwalan/export') ?>"><i class="fa fa-file-excel-o"></i> Export Penjadwalan</a>
                              <a class="btn btn-danger btn-flat pull-right" href="<?= base_url('penjadwalan/reset-penjadwalan') ?>"><i class="fa fa-undo"></i> Reset Penjadwalan</a>
                              <a class="btn btn-success btn-flat pull-right" href="<?= base_url('penjadwalan/ploting-jadwal') ?>"><i class="fa fa-check-square-o"></i> Ploting Jadwal</a>
                              <!-- <a class="btn btn-primary" href="<?= base_url('penjadwalan/tampil-jadwal-sementara') ?>">tampil jadwal Sementara</a> -->
                              <!-- <a class="btn btn-primary" href="<?= base_url('penjadwalan/tampil-jadwal') ?>">tampil jadwal</a> -->
                          </div>
                      <?php endif; ?>
                  </div>
              </div>


              <!-- Table Penjadwalan -->
              <?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
                  <div class="row">
                      <?php
                        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
                        function filter_jadwal($penjadwalan, $hari, $kelas, $sesi)
                        {
                            $data = [];
                            foreach ($penjadwalan as $value) {
                                if ($value->hari == $hari && $value->sesi == $sesi && $value->id_kelas == $kelas) {
                                    $data[] = $value;
                                }
                            }
                            return $data;
                        }
                        function getkodeMapel($mapel, $idMapel)
                        {
                            $key = array_search($idMapel, array_column($mapel, 'id_mapel'));
                            return $mapel[$key]->kode_mapel;
                        }
                        foreach ($hari as $valueHari) :
                            $keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
                            $jumlahSesi = $jadwal[$keyJadwal]->jumlah_sesi;
                        ?>
                          <div class="col-sm-12">
                              <div class="accordion custom-accordion mb-2" id="custom-accordion-one">
                                  <div class="card mb-0">
                                      <div class="card-header bg-info" id="headingSeven">
                                          <h5 class="m-0">
                                              <a class="custom-accordion-title collapsed d-block py-1 text-white" data-toggle="collapse" href="#hariJadwal" aria-expanded="false" aria-controls="hariJadwal">
                                                  <?= $valueHari ?> <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                              </a>
                                          </h5>
                                      </div>

                                      <div id="hariJadwal" class="collapse" aria-labelledby="headingSeven" data-parent="#custom-accordion-one">
                                          <div class="card-body">
                                              <div class="table-responsive">
                                                  <table class="table table-bordered ">
                                                      <tr>
                                                          <th class="warning text-center" style="width: 5%;">#</th>
                                                          <?php foreach ($kelas as $valueKelas) : ?>
                                                              <th class="warning text-center"><?= $valueKelas->id_kelas ?></th>
                                                          <?php endforeach; ?>
                                                      </tr>
                                                      <?php
                                                        // print_r($penjadwalan);
                                                        for ($i = 0; $i < $jumlahSesi; $i++) { ?>
                                                          <tr>
                                                              <td class="text-center"><?= $i ?></td>
                                                              <?php
                                                                foreach ($kelas as $valueKelas) :
                                                                    $dataJadwalKelas = filter_jadwal($penjadwalan, $valueHari, $valueKelas->id_kelas, $i);
                                                                    if ($dataJadwalKelas[0]->id_guru !== null) { ?>
                                                                      <td id="<?= $dataJadwalKelas[0]->id_penjadwalan ?>" class='penjadwalan first' data-kelas='<?= $valueKelas->id_kelas ?>' data-hari='<?= $valueHari ?>' data-jadwal='<?= json_encode($dataJadwalKelas[0]) ?>' data-request='<?= $dataJadwalKelas[0]->request ?>' style="padding: 10px; background-color: <?= $dataJadwalKelas[0]->warna_guru ?> ;">
                                                                          <div>
                                                                              <?= '' . $dataJadwalKelas[0]->nama . ' ~ ' .  getkodeMapel($mapel, $dataJadwalKelas[0]->id_mapel) ?>
                                                                          </div>
                                                                      </td>
                                                              <?php
                                                                    } else {
                                                                        $color = 'blue';
                                                                        if ($dataJadwalKelas[0]->keterangan == 'kosong') {
                                                                            $color = 'red';
                                                                        }
                                                                        echo "<td style='color: $color ;' data-request='-' data-guru='" . $dataJadwalKelas[0]->id_guru . "' data-kelas='$valueKelas->id_kelas' data-hari='$valueHari' class='penjadwalan first' data-jadwal='" . json_encode($dataJadwalKelas[0]) . "'>" . $dataJadwalKelas[0]->keterangan . "</td>";
                                                                    }
                                                                endforeach; ?>
                                                          </tr>
                                                      <?php } ?>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>
                          <!-- /.col -->
                      <?php
                        endforeach; ?>
                  </div>
              <?php endif; ?>


          </div>
      </div>



  </div>
  <!-- container -->

  </div>
  <!-- content -->
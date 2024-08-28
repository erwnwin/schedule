         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Jadwal Mengajar : <?= $this->session->userdata('nama'); ?></h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">

                     <div class="card card-default">
                         <div id="divOverlayformJadwalku" class="overlay hidden">
                             <i class="fas fa-2x fa-sync fa-spin"></i>
                         </div>
                         <div class="card-header">
                             <h3 class="card-title">Daftar Jadwal Mengajar</h3>

                         </div>
                         <div class="card-body">
                             <div class="table-responsive">

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

                                         <select name="btnPilihJadwal" id="btnPilihJadwal" class="form-control select2" data-toggle="select2" style="width: 100%;">
                                             <option value="">Pilih Hari</option>
                                             <?php foreach ($hari as $h) {  ?>
                                                 <option value="<?= $h->nama_hari ?>" <?php if ($this->input->post('btnPilihJadwal') == $h->nama_hari) {
                                                                                            echo 'selected="selected"';
                                                                                        } ?>>
                                                     <?= $h->nama_hari ?></option>
                                             <?php } ?>
                                         </select>
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
                                                 <div class="alert custom-alert-danger alert-dismissible" role="alert">
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
                                                     <table class="table table-sm table-striped table-hover">
                                                         <tr>
                                                             <th style="width: 10px" class="text-center">#</th>
                                                             <th style="width: 150px" class="text-center">Kode Mata Pelajaran</th>
                                                             <th style="width: 270px" class="text-center">Mata Pelajaran</th>
                                                             <th style="width: 100px" class="text-center">Kelas</th>
                                                             <th style="width: 30px" class="text-center">Sesi</th>
                                                             <th style="width: 100px" class="text-center">Hari</th>
                                                             <th style="width: 250px" class="text-center">Jam Mulai s.d Jam Selesai</th>
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
                                                                         <span class="badge custom-badge">Hari Ini</span>
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
                         </div>
                     </div>

                 </div>
             </section>


             <div>
                 <br>
             </div>
         </div>
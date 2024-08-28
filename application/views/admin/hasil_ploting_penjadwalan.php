         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Ploting Jadwal</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">


                     <div class="alert custom-alert-success alert-dismissible">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <h5><i class="icon far fa-question-circle"></i>Mohon Diperhatikan!</h5>
                         Berikut adalah hasil dari <b>PLOTING</b>an jadwal yang telah dilakukan.
                         <br>
                         Saudara(i) dapat melakukan <u>RESCHEDULE</u> menggunakan teknik <b>DRAG & DROP</b>.
                         <br>
                         Data FINAL Jadwal tetap menjadi keputusan akhri <b>Bagian Kurikulum</b>
                         <br>
                         <br>
                         <b><u>CATATAN PENTING:</u></b>
                         <br>
                         <ul>
                             <li>Jika data penjadwalan berikut telah dinyatakan "<b>TELAH SESUAI</b>" maka BAGIAN KURIKULUM wajib melakukan Share Penjadwalan.</li>
                             <li>Silahkan klik Button <button type="button" class="btn btn-sm btn-xs btn-primaryku"> SHARE FIX JADWAL</button> ketika semua data telah final</li>
                             <li>Silahkan klik Button <a href="<?= base_url('penjadwalan') ?>" class="btn btn-sm btn-xs btn-dangerku"> Back to Penjadwalan</a> untuk kembali ke halaman PENJADWALAN</li>
                         </ul>
                     </div>


                     <div class="row">
                         <div class="col-lg-12">




                             <!-- <?php if (!empty($penjadwalan)) : ?>
                                 <a class="btn btn-primaryku btn-block" href="<?= base_url('penjadwalan/results') ?>"><i class="fa fa-file-excel-o"></i> Hasil Ploting Penjadwalan</a>
                             <?php endif; ?> -->

                             <div class="row">
                                 <!-- data jadwal -->
                                 <?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>

                                     <div class="col-sm-12 mb-3">
                                         <button class="btn btn-primaryku btn-block" type="button" data-toggle="modal" data-target="#modal-share">Share Fix Jadwal</button>
                                     </div>

                                     <?php
                                        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
                                        $jamMulaiArray = array_unique(array_column($penjadwalan, 'jam_mulai'));

                                        function format_jam($jam)
                                        {
                                            return date('H:i', strtotime($jam));
                                        }

                                        function sanitizeId($value)
                                        {
                                            return preg_replace('/[^a-zA-Z0-9_\-]/', '_', $value);
                                        }

                                        foreach ($hari as $valueHari) :
                                            $keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
                                            $jumlahJam = count($jamMulaiArray);

                                            $collapseId = sanitizeId($valueHari);
                                        ?>


                                         <div class="col-sm-12">


                                             <div id="accordion">
                                                 <div class="card card-info">
                                                     <div class="card-header">
                                                         <h4 class="card-title w-100">
                                                             <a class="d-block w-100" data-toggle="collapse" href="#collapse<?= htmlspecialchars($collapseId, ENT_QUOTES, 'UTF-8') ?>">
                                                                 <?= $valueHari ?>
                                                             </a>
                                                         </h4>
                                                     </div>
                                                     <div id="collapse<?= htmlspecialchars($collapseId, ENT_QUOTES, 'UTF-8') ?>" class="collapse show" data-parent="#accordion">
                                                         <div class="card-body">
                                                             <div class="table-responsive">
                                                                 <table class="table table-bordered">
                                                                     <thead>
                                                                         <tr>
                                                                             <th class="warning text-center">Jam</th>
                                                                             <?php foreach ($kelas as $valueKelas) : ?>
                                                                                 <th class="warning text-center"><?= $valueKelas->id_kelas ?></th>
                                                                             <?php endforeach; ?>
                                                                         </tr>
                                                                     </thead>
                                                                     <tbody>
                                                                         <?php foreach ($jamMulaiArray as $jamMulai) {
                                                                                $jamSelesai = '';
                                                                                $formattedJamMulai = format_jam($jamMulai);

                                                                                $dataJadwal = array_filter($penjadwalan, function ($item) use ($jamMulai, $valueHari) {
                                                                                    return $item->jam_mulai == $jamMulai && $item->hari == $valueHari;
                                                                                });
                                                                                if (!empty($dataJadwal)) {
                                                                                    $jamSelesai = format_jam(reset($dataJadwal)->jam_selesai);
                                                                                }
                                                                            ?>
                                                                             <tr>
                                                                                 <td class="text-center">
                                                                                     <?= $formattedJamMulai ?> s.d <?= $jamSelesai ?> WITA
                                                                                 </td>
                                                                                 <?php foreach ($kelas as $valueKelas) :
                                                                                        $dataJadwalKelas = filter_jadwal($penjadwalan, $valueHari, $valueKelas->id_kelas, $jamMulai);
                                                                                        if (!empty($dataJadwalKelas)) {
                                                                                            $jadwalKelas = $dataJadwalKelas[0];
                                                                                            $keterangan = $jadwalKelas->keterangan;
                                                                                            if ($jadwalKelas->id_guru !== null) {
                                                                                                $displayText = $jadwalKelas->nama . ' ~ ' . getkodeMapel($mapel, $jadwalKelas->id_mapel);
                                                                                                $backgroundColor = $jadwalKelas->warna_guru;
                                                                                            } else {
                                                                                                $displayText = $keterangan;
                                                                                                $backgroundColor = 'transparent'; // Ganti warna ini jika diperlukan
                                                                                            }
                                                                                    ?>
                                                                                         <td id="<?= $jadwalKelas->id_penjadwalan ?>" class="penjadwalan"
                                                                                             data-id="<?= $jadwalKelas->id_penjadwalan ?>"
                                                                                             data-kelas="<?= $valueKelas->id_kelas ?>"
                                                                                             data-hari="<?= $valueHari ?>"
                                                                                             data-jadwal='<?= json_encode($jadwalKelas) ?>'
                                                                                             draggable="true"
                                                                                             style="padding: 10px; background-color: <?= $backgroundColor ?>;">
                                                                                             <div>
                                                                                                 <?= $displayText ?>
                                                                                             </div>
                                                                                         </td>
                                                                                     <?php } else { ?>
                                                                                         <td class="penjadwalan"
                                                                                             data-kelas="<?= $valueKelas->id_kelas ?>"
                                                                                             data-hari="<?= $valueHari ?>"
                                                                                             data-jadwal='{}'
                                                                                             style="color: white; background-color: red;"
                                                                                             draggable="true">
                                                                                             Kosong
                                                                                         </td>
                                                                                 <?php }
                                                                                    endforeach; ?>
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
                                     <?php endforeach; ?>
                                 <?php endif; ?>


                             </div>




                         </div>
                     </div>



                 </div>
             </section>


             <div class="modal fade" id="modal-addBuat" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-label" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <div id="overlayBuatJadwalku" class="overlay hidden">
                                 <i class="fas fa-2x fa-sync fa-spin"></i>
                             </div>
                             <h5 class="modal-title" id="modal-addBuat-label">Ploting Jadwal Mata Pelajaran</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">

                             <form id="formBuatJadwalku" action="<?= base_url('penjadwalan/create-jadwal') ?>" method="post" class="form-horizontal">
                                 <div class="box-body">

                                 </div>
                                 <div class="box-footer">
                                     <button type="submit" class="btn btn-sm btn-primaryku float-left" value="SimpanPerguruanTinggiAsalMahasiswa"> Buat Jadwal</button>
                                     <button type="button" class="btn btn-sm btn-outline-danger float-right" data-dismiss="modal"> Batal</button>
                                 </div>
                             </form>
                         </div>
                         <!-- /.modal-content -->
                     </div>
                 </div>
                 <!-- /.modal-dialog -->
             </div>



             <!-- modal ploting -->

             <div class="modal fade" id="modalPlotingJadwal" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-label" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <div id="overlayPlotingJadwal" class="overlay hidden">
                                 <i class="fas fa-2x fa-sync fa-spin"></i>
                             </div>
                             <h5 class="modal-title" id="modalPlotingJadwal-label">Buat Jadwal Mata Pelajaran</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <form id="formPlotingJadwal" action=" <?= base_url('penjadwalan/ploting-jadwal') ?>" method="post" class="form-horizontal">
                                 <div class="box-body">

                                 </div>
                                 <div class="box-footer">
                                     <button type="submit" class="btn btn-sm btn-successku float-left" value="SimpanPerguruanTinggiAsalMahasiswa"> Ploting Jadwal</button>
                                     <button type="button" class="btn btn-sm btn-dangerku float-right" data-dismiss="modal"> Batal</button>
                                 </div>
                             </form>
                         </div>
                         <!-- /.modal-content -->
                     </div>
                 </div>
                 <!-- /.modal-dialog -->
             </div>



             <div class="modal fade" id="modal-share" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-label" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <div id="overlayFinalShare" class="overlay hidden">
                                 <i class="fas fa-2x fa-sync fa-spin"></i>
                             </div>
                             <h5 class="modal-title" id="modal-share-label">Finalisasi Jadwal Mata Pelajaran</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <form id="formFinalShare" action=" <?= base_url('penjadwalan/finalisasi-data') ?>" method="post" class="form-horizontal">
                                 <div class="box-body">
                                     <div class="form-group row mb-3">
                                         <label class="col-sm-5 col-form-label">Tahun Akademik Aktif</label>
                                         <div class="col-sm-7">
                                             <?php foreach ($ta as $t) { ?>
                                                 <input type="hidden" class="form-control" value="<?= $t->id_ta ?>" required="required" name="id_ta" readonly />
                                                 <input type="text" class="form-control" value="<?= $t->tahun_akademik ?>" required="required" name="tahun_akademik" readonly />
                                             <?php } ?>
                                         </div>
                                     </div>
                                 </div>
                         </div>
                         <div class="modal-footer justify-content-between">
                             <button type="submit" class="btn btn-sm btn-successku float-left" value="SimpanPerguruanTinggiAsalMahasiswa"> Finalisasi Data Jadwal</button>
                             <button type="button" class="btn btn-sm btn-dangerku float-right" data-dismiss="modal"> Batal</button>
                         </div>
                         </form>

                         <!-- /.modal-content -->
                     </div>
                 </div>
                 <!-- /.modal-dialog -->
             </div>




             <div>
                 <br>
             </div>
         </div>
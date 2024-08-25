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


                     <div class="alert custom-alert-danger alert-dismissible">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <h5><i class="icon far fa-question-circle"></i>Mohon Diperhatikan!</h5>
                         Jadwal yang telah <b>PLOTING</b> bukanlah jadwal FINAL. Bagian Kurikulum masih dapat merubah atau ploting jadwal lagi sebelum melakukan FINALISASI jadwal.
                         <br>
                         Pada <b>FITUR PENJADWALAN</b> ini digunakan untuk mempermudah proses penjadwalan agar tidak ada jadwal yang bentrok.
                         <br>
                         Data FINAL Jadwal tetap menjadi keputusan akhri <b>Bagian Kurikulum</b>
                     </div>


                     <div class="row">
                         <div class="col-lg-12">
                             <?php
                                if (empty($rangeJam)) {
                                    echo '<div class="alert custom-alert-danger alert-dismissible">';
                                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                    echo '<h4><i class="icon fa fa-ban"></i> Gagal</h4>';
                                    echo 'Data Range Jam Belum Terisi';
                                    echo '</div>';
                                }
                                if (empty($penjadwalan)) {
                                    echo '<div class="alert custom-alert-danger alert-dismissible">';
                                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                    echo '<h5><i class="icon fas fa-ban"></i> Gagal</h5>';
                                    echo 'Data Penjadwalan Belum Terisi';
                                    echo '</div>';
                                } else {

                                    echo '<div class="alert custom-alert-success alert-dismissible">';
                                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                    echo '<h5><i class="icon fas fa-check-circle"></i> Sukses</h5>';
                                    echo 'Data Penjadwalan Siap';
                                    echo '</div>';
                                }
                                if (empty($rumusan)) {

                                    echo '<div class="alert custom-alert-danger alert-dismissible">';
                                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                    echo '<h5><i class="icon fas fa-ban"></i> Gagal</h5>';
                                    echo 'Data Rumusan Belum Terisi';
                                    echo '</div>';
                                } else {
                                    echo '<div class="alert custom-alert-success alert-dismissible">';
                                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                    echo '<h5><i class="icon fas fa-check-circle"></i> Sukses</h5>';
                                    echo 'Data Rumusan Siap';
                                    echo '</div>';
                                }
                                ?>



                             <div class="card card-default">
                                 <div class="card-header">
                                     <h3 class="card-title">Jadwal Belum Terplot</h3>
                                     <!-- <div class="card-tools">
                                         <a type="button" class="btn btn-sm btn-primaryku" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus-circle"></i> Create</a>
                                     </div> -->
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body">
                                     <div class="table-responsive">
                                         <table class="table table-sm table-hover">
                                             <tr>
                                                 <th class="text-center ">Kelas</th>
                                                 <!-- <th class="text-center ">Id Guru</th> -->
                                                 <th class="text-center ">Nama Guru</th>
                                                 <th class="text-center ">Mata Pelajaran</th>
                                                 <th class="text-center ">Beban Jam</th>
                                                 <th class="text-center ">Jumlah Yang belum Terplot</th>
                                                 <!-- <th class="text-center ">Request Jadwal</th> -->
                                                 <?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
                                                     <th class="text-center ">Action</th>
                                                 <?php endif; ?>
                                             </tr>

                                             <?php if ($belumterplot == null) { ?>
                                                 <tr>
                                                     <td colspan="7" class="text-center ">Belum ada data</td>
                                                 </tr>
                                             <?php } else { ?>
                                                 <?php foreach ($belumterplot as $valueBelumterplot) : ?>
                                                     <tr>
                                                         <td class="text-center"><?= $valueBelumterplot->id_kelas ?></td>
                                                         <!-- <td><?= $valueBelumterplot->id_guru ?></td> -->
                                                         <td class=""><?= $valueBelumterplot->nama ?></td>
                                                         <td class="text-center"><?= $valueBelumterplot->nama_mapel ?></td>
                                                         <td class="text-center"><?= $valueBelumterplot->beban_jam ?> Jam</td>
                                                         <td class="text-center"><?= $valueBelumterplot->sisa_jam ?> Jam</td>
                                                         <!-- <td class=""><?= $valueBelumterplot->hari ?></td> -->
                                                         <?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
                                                             <td class=""><button data-tugasguru="<?= $valueBelumterplot->id_tugas ?>" data-guru="<?= $valueBelumterplot->nama ?>" data-mapel="<?= $valueBelumterplot->nama_mapel ?>" data-kelas="<?= $valueBelumterplot->id_kelas ?>" data-request="<?= $valueBelumterplot->hari ?>" class="btn btn-primaryku btn-sm plotting disabled">Plotting</button></td>
                                                         <?php endif; ?>
                                                     </tr>
                                                 <?php endforeach; ?>
                                             <?php } ?>

                                         </table>
                                     </div>
                                 </div>
                             </div>


                             <div class="card card-default">
                                 <div class="card-body">
                                     <div class="d-flex justify-content-between mb-3">
                                         <?php if (empty($rumusan)) { ?>
                                             <?php if (!empty($penjadwalan)) { ?>
                                                 <a class="btn btn-primaryku btn-block" href="<?= base_url('penjadwalan/rumusan') ?>"><i class="fa fa-edit"></i> Masukkan Rumusan</a>
                                             <?php } ?>
                                         <?php } else { ?>
                                             <a class="btn btn-dangerku btn-block" href="<?= base_url('penjadwalan/reset-rumusan') ?>"><i class="fa fa-undo"></i> Reset Rumusan</a>
                                         <?php } ?>
                                     </div>

                                     <div class="d-flex justify-content-between mb-3">
                                         <?php
                                            if (empty($penjadwalan)) {
                                                if (!empty($rangeJam)) {
                                            ?>
                                                 <a type="button" data-toggle="modal" data-target="#modal-addBuat" class="btn btn-primaryku btn-block">Buat Jadwal</a>
                                             <?php
                                                }
                                            } else {
                                                ?>
                                             <a class="btn btn-warningku btn-block" href="<?= base_url('penjadwalan/reset-jadwal') ?>"><i class="fa fa-undo"></i> Reset Jadwal</a>
                                         <?php
                                            }
                                            ?>
                                     </div>

                                     <?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
                                         <hr>
                                         <div class="d-flex justify-content-between">
                                             <a class="btn btn-primaryku" type="button" data-toggle="modal" data-target="#modalExportJadwal"><i class="fa fa-file-excel-o"></i> Export Penjadwalan</a>
                                             <a class="btn btn-dangerku" type="button" data-toggle="modal" data-target="#modalResetPenjadwalan"><i class="fa fa-undo"></i> Reset Penjadwalan</a>
                                             <a type="button" class="btn btn-successku" data-toggle="modal" data-target="#modalPlotingJadwal"><i class="fa fa-check-square-o"></i> Ploting Jadwal</a>
                                         </div>
                                     <?php endif; ?>
                                 </div>
                             </div>


                             <?php if (!empty($penjadwalan)) : ?>
                                 <a class="btn btn-primaryku btn-block" href="<?= base_url('penjadwalan/results') ?>"><i class="fa fa-file-excel-o"></i> Hasil Ploting Penjadwalan</a>
                             <?php endif; ?>

                             <!-- <div class="row">
                                 <?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>

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
                                                     <div id="collapse<?= htmlspecialchars($collapseId, ENT_QUOTES, 'UTF-8') ?>" class="collapse" data-parent="#accordion">
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
                             </div> -->




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


             <div class="modal fade" id="modalExportJadwal" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-label" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <div id="overlayExportJadwal" class="overlay hidden">
                                 <i class="fas fa-2x fa-sync fa-spin"></i>
                             </div>
                             <h5 class="modal-title" id="modalExportJadwal-label">Export Penjadwalan</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <form id="formExportJadwal" action="<?= base_url('penjadwalan/export') ?>" method="post" class="form-horizontal">
                                 <div class="box-body">

                                 </div>
                                 <div class="box-footer">
                                     <button type="submit" class="btn btn-sm btn-successku float-left" value="SimpanPerguruanTinggiAsalMahasiswa"> Export Jadwal</button>
                                     <button type="button" class="btn btn-sm btn-dangerku float-right" data-dismiss="modal"> Batal</button>
                                 </div>
                             </form>
                         </div>
                         <!-- /.modal-content -->
                     </div>
                 </div>
                 <!-- /.modal-dialog -->
             </div>


             <div class="modal fade" id="modalResetPenjadwalan" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-label" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <div id="overlayResetJadwal" class="overlay hidden">
                                 <i class="fas fa-2x fa-sync fa-spin"></i>
                             </div>
                             <h5 class="modal-title" id="modalResetPenjadwalan-label">Export Penjadwalan</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <form id="formResetJadwal" action="<?= base_url('penjadwalan/reset-penjadwalan') ?>" method="post" class="form-horizontal">
                                 <div class="box-body">

                                 </div>
                                 <div class="box-footer">
                                     <button type="submit" class="btn btn-sm btn-successku float-left" value="SimpanPerguruanTinggiAsalMahasiswa"> Reset Penjadwalan</button>
                                     <button type="button" class="btn btn-sm btn-dangerku float-right" data-dismiss="modal"> Batal</button>
                                 </div>
                             </form>
                         </div>
                         <!-- /.modal-content -->
                     </div>
                 </div>
                 <!-- /.modal-dialog -->
             </div>






             <div>
                 <br>
             </div>
         </div>
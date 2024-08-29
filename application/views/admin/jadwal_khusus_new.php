         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Data Jadwal Khusus Penjadwalan</h1>
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
                         Jadwal khusus disesuaikan dengan Jadwal seperti <b><u>UPACARA, IBADAH dan ISTIRAHAT</u></b>
                         <hr>
                         <b><u>For Info :</u></b>
                         Sistem mendeteksi angka awal dimulai dari angka NOL, maka seperti jadwal Upacara dapat diinputkan angka NOL (sebagai sesi pertama)
                     </div>

                     <div class="card card-default">
                         <div class="card-header">
                             <h3 class="card-title">Daftar Jadwal Khusus Penjadwalan</h3>
                             <div class="card-tools">
                                 <a type="button" class="btn btn-sm btn-primaryku" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus-circle"></i> Create</a>
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-hover table-striped table-sm">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px" class="text-center">#</th>
                                             <th class="text-center">Hari</th>
                                             <th class="text-center">Kelas</th>
                                             <th class="text-center">Keterangan</th>
                                             <th class="text-center">Sesi</th>
                                             <th class="text-center">Durasi</th>
                                             <th style="width: 90px" class="text-center">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if ($jadwal_khusus == null) { ?>
                                             <tr>
                                                 <td colspan="7">
                                                     <center>Tidak ada data</center>
                                                     <!-- <center>
                                                         <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                                         <p class="mt-3">Tidak ada data</p>
                                                     </center> -->
                                                 </td>
                                             </tr>
                                         <?php } else { ?>
                                             <?php
                                                $no = 1;
                                                foreach ($jadwal_khusus as $row) {

                                                ?>

                                                 <tr>
                                                     <td><?= $no; ?></td>
                                                     <td class="text-center"><?= $row['hari'] ?></td>
                                                     <td class="text-center">Kelas <?= $row['kelas'] ?></td>
                                                     <td><?= $row['keterangan'] ?></td>
                                                     <td class="text-center"><?= $row['sesi'] ?></td>
                                                     <td class="text-center"><?= $row['durasi'] ?></td>
                                                     <td class="text-center">
                                                         <div class="btn-group">
                                                             <a type="button" data-toggle="modal"
                                                                 data-target="#modal-edit"
                                                                 data-hari="<?= $row['hari'] ?>"
                                                                 data-keterangan="<?= $row['keterangan'] ?>"
                                                                 class="btn btn-warningku btn-sm btn-rounded">Edit</a>
                                                             <a type="button" class="btn btn-dangerku btn-sm btn-rounded">Delete</a>
                                                         </div>
                                                     </td>
                                                 </tr>

                                             <?php
                                                    $no++;
                                                }
                                                ?>
                                         <?php } ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                         <div class="card-footer clearfix">
                             <div id="pagination">
                                 <?php echo $pagination; ?>
                             </div>
                         </div>
                     </div>



                     <?php
                        if (empty($dataKelas)) {
                            echo '<div class="alert custom-alert-danger alert-dismissible fade show mb-3" role="alert">';
                            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                            echo '<span aria-hidden="true">&times;</span>';
                            echo '<h5><i class="icon fa fa-times-circle"></i> Maaf!</h5>';
                            echo 'Data Kelas Belum Terisi';
                            echo '</div>';
                        }
                        if (empty($jadwal)) {
                            // echo '<div class="alert custom-alert-danger alert-dismissible">';
                            // echo '<button type="button" class="close" data-dismiss="alert" ;aria-hidden="true">×</button>';
                            // echo '<h5><i class="icon fa fa-times-circle"></i> Maaf!</h5>';
                            // echo 'Data Jadwal Belum Terisi';
                            // echo '</div>';
                            echo '<div class="alert custom-alert-danger alert-dismissible fade show mb-3" role="alert">';
                            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                            echo '<span aria-hidden="true">&times;</span>';
                            echo '<h5><i class="icon fa fa-times-circle"></i> Maaf!</h5>';
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

                            function sanitizeId($value)
                            {
                                // Ganti karakter backtick dengan underscore
                                return preg_replace('/[^a-zA-Z0-9_\-]/', '_', $value);
                            }

                            foreach ($arrHari as $valueHari) {
                                if (in_array($valueHari, $hari)) {
                                    # code...
                                    // foreach ($hari as $valueHari) :
                                    $keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
                                    $jumlahSesi = $jadwal[$keyJadwal]->jumlah_sesi;

                                    $collapseId = sanitizeId($valueHari);
                            ?>
                                 <div class="row">
                                     <div class="col-lg-12" id="accordion">


                                         <div class="card card-primary">
                                             <a class="d-block w-100" data-toggle="collapse" href="#collapse<?= htmlspecialchars($collapseId, ENT_QUOTES, 'UTF-8') ?>">
                                                 <div class="card-header">
                                                     <h4 class="card-title w-100">
                                                         <?= $valueHari ?>
                                                     </h4>
                                                 </div>
                                             </a>
                                             <div id="collapse<?= htmlspecialchars($collapseId, ENT_QUOTES, 'UTF-8') ?>" class="collapse" data-parent="#accordion">
                                                 <div class="card-body">
                                                     <div class="table-responsive">
                                                         <table class="table table-sm table-hover table-bordered table-centered">
                                                             <thead>

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
                                                                                    $result =  keteranganSesi($jadwal_khususku, $valueHari, $valueKelas->kelas, $i);
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
                                 </div>
                         <?php
                                    // endforeach;
                                }
                            }
                            ?>

                     <?php endif; ?>
                 </div>

             </section>


             <!-- Modal Edit -->
             <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edit-label" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="modal-edit-label">Edit Jadwal</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <form action="<?= base_url('your_controller/update') ?>" method="post">
                             <div class="modal-body">
                                 <input type="text" class="form-control" name="hari" id="modal-edit-hari">
                                 <input type="text" class="form-control" name="keterangan" id="modal-edit-keterangan">

                                 <div class="form-group">
                                     <label for="kelas">Kelas</label>
                                     <?php
                                        $kelas_list = ['X', 'XI', 'XII']; // Daftar kelas
                                        ?>
                                     <?php foreach ($kelas_list as $value): ?>
                                         <div class="custom-control custom-checkbox">
                                             <input class="custom-control-input" name="kelas[]" type="checkbox" id="kelas_<?= $value ?>" value="<?= $value ?>">
                                             <label class="custom-control-label" for="kelas_<?= $value ?>">Kelas <?= $value ?></label>
                                         </div>
                                     <?php endforeach; ?>
                                 </div>
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Save changes</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>





             <!-- modal add guru -->
             <div class="modal fade" id="modal-tambah">
                 <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                         <div id="overlayJadwalKhusus" class="overlay hidden">
                             <i class="fas fa-2x fa-sync fa-spin"></i>
                         </div>
                         <div class="modal-header">
                             <h4 class="modal-title">Form Tambah Jadwal Khusus</h4>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <form id="formAddJadwalKhusus" action="<?= base_url() ?>jadwal-khusus/act-add" method="post" class="form-horizontal">
                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Hari</label>
                                     <div class="col-9">
                                         <?php
                                            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
                                            foreach ($hari as $value) { ?>
                                             <div class="custom-control custom-checkbox">
                                                 <input class="custom-control-input" name="hari[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>">
                                                 <label class="custom-control-label" for="<?= $value ?>"><?= $value ?></label>
                                             </div>
                                             <!-- <div class="custom-control custom-checkbox">
                                                 <input class="form-control-input" name="hari[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>">
                                                 <label class="form-control-label" for="<?= $value ?>"><?= $value ?></label>
                                             </div> -->
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
                                                 <input class="custom-control-input" name="kelas[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>">
                                                 <label class="custom-control-label" for="<?= $value ?>">Kelas <?= $value ?></label>
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

                                         <input type="number" name="durasi" id="durasi" class="form-control" required="required" value="<?= $range_jam->lama_sesi ?>" placeholder="Input number untuk durasi" autocomplete="off" readonly />
                                     </div>
                                 </div>

                         </div>
                         <div class="modal-footer justify-content-between">
                             <button type="button" class="btn btn-dangerku btn-sm" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primaryku btn-sm">Simpan</button>
                         </div>
                         </form>
                     </div>
                 </div>
             </div>

             <div>
                 <br>
             </div>
         </div>
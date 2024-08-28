         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Data Jam / Sesi Setiap Hari</h1>
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
                         Silahkan mengatur waktu pada kolom / tabel berikut. <b>Data di bawah ini hanya dapat diupdate, disesuaikan dengan Jumlah Sesi dan Durasi Setiap Sesinya</b>
                         <br>
                         <hr>
                         <b><u>Catatan Penting:</u></b>
                         <ol>
                             <li>Durasi per sesi terdapat 35 Menit artinya <b>setiap Kegiatan baik itu Istirahat, Pembalajaran/Mapel</b> memiliki durasi 35 untuk setiap sesinya</li>
                             <li>Jika terdapat <b>Mata Pelajaran</b> memiliki beban jam mapel sama dengan 4 jam maka dalam seminggu pembelajaran hanya mendapatkan 4 sesi dan <b><u>OTOMATIS</u></b> diatur pada sistem penjadwalan</li>
                             <li>Data penjadwalan akan diploting jika semua MAPEL telah memiliki guru pengampu</li>
                             <li>Data penjadwalan yang telah <b>FIX</b> maka akan digenerate ke FITUR => <b>Jadwal Fix Share</b>. Jadwal tersebut yang nantinya akan dikirimkan otomatis notifikasi pemberitahuan ke masing-masing WhatsApp guru</li>
                         </ol>
                     </div>

                     <div class="card card-default">
                         <div class="card-header">
                             <h3 class="card-title">Daftar Jam / Sesi Setiap Hari</h3>
                             <!-- <div class="card-tools">
                                 <a href="<?= base_url('wisata/create') ?>" class="btn btn-sm btn-primaryku"><i class="fa fa-plus-circle"></i> Create</a>
                             </div> -->
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-hover">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px" class="text-center">#</th>
                                             <th class="text-center">Hari</th>
                                             <th class="text-center">Sesi Per Hari</th>
                                             <th class="text-center">Durasi Per Hari</th>
                                             <th class="text-center">Jam Dimulai</th>
                                             <th style="width: 90px" class="text-center">Action</th>
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
                                                         <a type="button" class="btn btn-sm btn-warningku" data-toggle="modal" data-target="#modal-edit<?= $r->id_jadwal ?>"> Edit</a>
                                                         <!-- <form action="<?= base_url('jam/delete/' . $r->id_jadwal) ?>" method="post">
                                                      <button type="submit" class="btn btn-xs btn-sm btn-danger" id="btn-hapus-ku"> <i class="mdi mdi-delete"></i></button>
                                                  </form> -->

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
             </section>

             <?php foreach ($range_jam as $r) { ?>
                 <div class="modal fade" id="modal-edit<?= $r->id_jadwal ?>">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div id="overlayAturanSesi" class="overlay hidden">
                                 <i class="fas fa-2x fa-sync fa-spin"></i>
                             </div>
                             <div class="modal-header">
                                 <h4 class="modal-title">Form Update Aturan Sesi dan Durasi per Sesi</h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">

                                 <form id="formUpdateAturan" action="<?= base_url() ?>jam/act-update" method="post" class="form-horizontal">
                                     <input type="hidden" name="id_jadwal" class="form-control" value="<?= $r->id_jadwal ?>">
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
                                                     <input class="custom-control-input" name="chkJadwalHari[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>" <?= $checked ?>>
                                                     <label class="custom-control-label" for="<?= $value ?>"><?= $value ?></label>
                                                 </div>
                                             <?php } ?>
                                         </div>
                                     </div>


                                     <div class="form-group row mb-3">
                                         <label class="col-sm-3 col-form-label">Sesi Per Hari</label>
                                         <div class="col-sm-9">
                                             <input type="number" class="form-control" value="<?= $r->jumlah_sesi ?>" required="required" name="jumlah_sesi" id="sesi" min="5" max="20" placeholder="Minimal input 5" autocomplete="off" />
                                         </div>
                                     </div>
                                     <div class="form-group row mb-3">
                                         <label class="col-sm-3 col-form-label">Waktu Per Sesi</label>
                                         <div class="col-sm-9">
                                             <input type="number" name="lama_sesi" id="durasi" min="10" max="60" class="form-control" required="required" value="<?= $r->lama_sesi ?>" placeholder="Minimal input 10" autocomplete="off" />
                                             <small class="text-danger">*Dalam menit, contoh : 30 (masukkan angka saja)</small>
                                         </div>
                                     </div>

                                     <div class="form-group row mb-2">
                                         <label class="col-sm-3 col-form-label">Sesi Dimulai</label>
                                         <div class="col-sm-9">
                                             <input type="time" name="jam_mulai" id="waktuMulai" class="form-control" required="required" value="<?= $r->jam_mulai ?>" placeholder="Minimal input 10" autocomplete="off" />
                                         </div>
                                     </div>

                             </div>
                             <div class="modal-footer justify-content-between">
                                 <button type="button" class="btn btn-dangerku btn-sm" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primaryku btn-sm">Update</button>
                             </div>
                             </form>
                         </div>
                     </div>
                 </div>
             <?php } ?>

             <div>
                 <br>
             </div>
         </div>
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
                                                         <a href="" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#modal-edit<?= $r->id_jadwal ?>"> Edit</a>
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

             <div>
                 <br>
             </div>
         </div>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Data Guru Pengampu</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">


                     <div class="row">
                         <div class="col-12">

                             <div class="alert custom-alert-danger alert-dismissible">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 <h5><i class="icon far fa-question-circle"></i>Mohon Diperhatikan!</h5>
                                 Jika TOMBOL "<b>LIHAT GURU PENGAJAR</b>" masih MERAH berarti masih ada data yang kosong!
                             </div>

                             <div class="card card-default">
                                 <div class="card-header">
                                     <h3 class="card-title">Data Guru Pengampu Berdasarkan Mata Pelajaran</h3>
                                 </div>
                                 <div class="card-body">

                                     <div class="table-responsive">
                                         <table class="table table-hover">
                                             <thead>
                                                 <tr>
                                                     <th style="width: 5%;" class="text-center">#</th>
                                                     <th class="text-center" style="width: 70%;">Mata Pelajaran</th>
                                                     <th style="width: 50%;" class="text-center">Action</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php if ($mapel == null) { ?>
                                                     <tr>
                                                         <td colspan="3">
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
                                                        foreach ($mapel as $ValueListMapel) : ?>
                                                         <tr>
                                                             <td class="text-center"><?= $no ?></td>
                                                             <td class="text-center"><?= $ValueListMapel->nama_mapel ?></td>
                                                             <td class="text-center">
                                                                 <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TugasGuru" data-kodemapel="<?= $ValueListMapel->kode_mapel ?>" data-mapel="<?= $ValueListMapel->nama_mapel ?>">Tambah Guru Pengajar</button> -->
                                                                 <a href="<?= base_url('guru-pengampu/create-pengampu/' . $ValueListMapel->kode_mapel) ?>"><button class="btn btn-sm <?= ($ValueListMapel->jumlah_kosong == 0) ? 'btn-primaryku' : 'btn-dangerku'; ?>">Lihat Guru Pengajar</button></a>
                                                             </td>
                                                         </tr>
                                                     <?php
                                                            $no++;
                                                        endforeach; ?>

                                                 <?php } ?>
                                             </tbody>
                                         </table>
                                     </div>


                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>
             </section>

             <div>
                 <br>
             </div>
         </div>
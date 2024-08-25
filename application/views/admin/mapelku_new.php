         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Mata Pelajaran Diajarkan : <?=
                                                            $this->session->userdata('nama');
                                                            ?></h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">

                     <div class="card card-default">
                         <div class="card-header">
                             <h3 class="card-title">Daftar Mata Pelajaran yang Diajarkan</h3>

                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <div class="table-responsive">
                                     <?php if ($mapelku == null) { ?>
                                         <center>
                                             <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                             <p class="mt-3">Tidak ada data</p>
                                         </center>
                                     <?php } else { ?>

                                         <table class="table table-hover table-sm table-striped">
                                             <tr>
                                                 <th style="width: 10px" class="text-center">#</th>
                                                 <th style="width: 150px" class="text-center">Kode Mata Pelajaran</th>
                                                 <th style="width: 200px" class="text-center">Mata Pelajaran</th>
                                                 <th style="width: 300px" class="text-center">Kelas Yang Diajarkan</th>
                                             </tr>
                                             <?php $no = 1;

                                                foreach ($mapelku as $m) { ?>
                                                 <tr>
                                                     <td class="text-center"><?= $no++ ?></td>
                                                     <td class="text-center"><?= $m->kode_mapel ?></td>
                                                     <td class="text-center"><?= $m->nama_mapel ?></td>
                                                     <td class="text-center">Kelas <?= $m->kelas ?>.<?= $m->urutan_kelas ?></td>
                                                 </tr>
                                             <?php } ?>
                                         </table>


                                     <?php } ?>
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
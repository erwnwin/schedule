         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Jadwal Final for Share</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">

                     <div class="card card-default">
                         <div class="card-header">
                             <h3 class="card-title">Data Guru Pengampu Berdasarkan Mata Pelajaran</h3>
                         </div>
                         <div class="card-body">

                             <div class="table-responsive">
                                 <table class="table">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px" class="text-center">#</th>
                                             <th class="text-center">Tahun Akademik</th>
                                             <th class="text-center">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody id="mapel-tbody">
                                         <?php if ($ta == null) { ?>
                                             <tr>
                                                 <td colspan="6">
                                                     <center>Tidak ada data</center>
                                                 </td>
                                             </tr>
                                         <?php } else { ?>
                                             <?php $no = 1;
                                                foreach ($ta as $r) { ?>
                                                 <tr>
                                                     <td class="text-center"><?= $no++ ?></td>
                                                     <td class="text-center"><?= $r->tahun_akademik ?>
                                                         <?php if ($r->status == 'Aktif') { ?>
                                                             <span class="right badge custom-success">Aktif</span>
                                                         <?php } ?>
                                                     </td>
                                                     <td class="text-center">
                                                         <a href="<?= base_url('jadwal-fix/tahun-akademik/' . $r->id_ta) ?>" class="btn btn-primaryku btn-sm">Lihat Jadwal Final</a>
                                                         <!-- <button type="button" class="btn btn-dangerku btn-sm" data-toggle="modal" data-target="#modal-hapus<?= $r->id_ta ?>" data-id="<?= $r->id_ta ?>">Delete</button> -->
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
         </div>
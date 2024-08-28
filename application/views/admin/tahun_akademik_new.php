         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Tahun Akademik / Tahun Ajaran</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">

                     <div class="card card-default">
                         <div class="card-header">
                             <h3 class="card-title">Data Tahun Akademik / Ajaran</h3>
                             <div class="card-tools">
                                 <a type="button" class="btn btn-sm btn-primaryku" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus-circle"></i> Create</a>
                             </div>
                         </div>
                         <div class="card-body">

                             <div class="table-responsive">

                                 <table class="table table-hover">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px" class="text-center">#</th>
                                             <th class="text-center">Tahun Akademik</th>
                                             <th class="text-center">Tanggal Mulai</th>
                                             <th class="text-center">Tanggal Berakhir</th>
                                             <th class="text-center">Status</th>
                                             <th style="width: 150px" class="text-center">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $no = 1;
                                            foreach ($ta as $r) { ?>
                                             <tr>
                                                 <td class="text-center"><?= $no++ ?></td>
                                                 <td><?= $r->tahun_akademik ?></td>
                                                 <td><?php echo tanggal_indonesia($r->tgl_mulai) ?></td>
                                                 <td><?php echo tanggal_indonesia($r->tgl_akhir) ?></td>
                                                 <td class="text-center"><?php if ($r->status == 'Non Aktif') { ?>
                                                         <span class="badge badge-danger">Tidak Aktif</span>
                                                     <?php } else { ?>
                                                         <span class="badge custom-success">Aktif</span>
                                                     <?php } ?>
                                                 </td>

                                                 <td class="text-center"><?php if ($r->status == 'Non Aktif') { ?>
                                                         <button type="button" data-toggle="modal" title="Aktifkan" data-target="#modal-Aktif<?= $r->id_ta ?>" class="btn btn-sm btn-successku"> <i class="fas fa-check-circle"></i></button>
                                                         <button type="button" data-toggle="modal" data-target="#modal-edit<?= $r->id_ta ?>" class="btn btn-sm btn-warningku"> <i class="fas fa-edit"></i></button>
                                                         <a href="<?= base_url('tahun-akademik/delete/' . $r->id_ta) ?>" id="btn-hapus" class="btn btn-sm btn-dangerku"> <i class="fas fa-trash-alt"></i></a>
                                                     <?php } else { ?>
                                                         <button type="button" data-toggle="modal" title="Non Aktifkan" data-target="#modal-nonAktif<?= $r->id_ta ?>" class="btn btn-sm btn-primaryku"> <i class="fas fa-times-circle"></i></button>
                                                         <button type="button" data-toggle="modal" data-target="#modal-edit<?= $r->id_ta ?>" class="btn btn-sm btn-warningku"> <i class="fas fa-edit"></i></button>
                                                         <a href="<?= base_url('tahun-akademik/delete/' . $r->id_ta) ?>" id="btn-hapus" class="btn btn-sm btn-dangerku"> <i class="fas fa-trash-alt"></i></a>
                                                     <?php } ?>

                                                 </td>
                                             </tr>
                                         <?php } ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>

                 </div>
             </section>


             <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-label" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <div id="overlayTahunAkademik" class="overlay hidden">
                                 <i class="fas fa-2x fa-sync fa-spin"></i>
                             </div>
                             <h5 class="modal-title" id="modal-addBuat-label">Setting Waktu Notifikasi</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">

                             <form id="formAddTahunAkademik" class="form-horizontal" action="<?= base_url('tahun-akademik/act-add') ?>" method="post">

                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Tahun Akademik</label>
                                     <div class="col-9">
                                         <input type="text" class="form-control" name="tahun_akademik" maxlength="9" placeholder="2020/2021" required>
                                         <small class="text-danger">Format penulisan : <b>2024/2025</b></small>
                                     </div>
                                 </div>

                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Tanggal Mulai</label>
                                     <div class="col-9">
                                         <input type="date" name="tgl_mulai" class="form-control" required>
                                     </div>
                                 </div>

                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Tanggal Berakhir</label>
                                     <div class="col-9">
                                         <input type="date" name="tgl_akhir" class="form-control" required>
                                     </div>
                                 </div>


                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Semester</label>
                                     <div class="col-9">
                                         <select name="tipe_semester" class="form-control select2" data-toggle="select2" style="width: 100%;" required>
                                             <option value="">Pilih Semester</option>
                                             <option value="Ganjil">Ganjil</option>
                                             <option value="Genap">Genap</option>
                                         </select>
                                     </div>
                                 </div>

                                 <div class="form-grup row mb-3">
                                     <label class="col-3 col-form-label">Status</label>
                                     <div class="col-9">
                                         <div class="mt-2">
                                             <div class="custom-control custom-radio custom-control-inline">
                                                 <input type="radio" id="customRadio3" name="status" value="Aktif" class="custom-control-input" disabled>
                                                 <label class="custom-control-label" for="customRadio3">Aktif</label>
                                             </div>
                                             <div class="custom-control custom-radio custom-control-inline">
                                                 <input type="radio" id="customRadio4" name="status" value="Non Aktif" class="custom-control-input" checked>
                                                 <label class="custom-control-label" for="customRadio4">Non Aktifkan</label>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                         </div>
                         <div class="modal-footer justify-content-between">
                             <button type="submit" class="btn btn-sm btn-primaryku float-left"> Set Notifikasi</button>
                             <button type="button" class="btn btn-sm btn-outline-danger float-right" data-dismiss="modal"> Batal</button>
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
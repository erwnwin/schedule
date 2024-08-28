         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Set Waktu Notifikasi</h1>
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
                         Set notifikasi dapat dilakukan dengan memilih waktu kapan nofifikasi dikirimkan.
                         <br>
                         Jika waktu notifikasi yang aktif telah lewat waktu pengirimannya otomatis akan dihapus oleh sistem.
                     </div>

                     <div class="card card-default">
                         <div class="card-header">
                             <h3 class="card-title">Daftar Jam / Sesi Setiap Hari</h3>
                             <div class="card-tools">
                                 <a type="button" class="btn btn-sm btn-primaryku" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus-circle"></i> Create</a>
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="table-responsive">
                                 <?php if ($notif == null) { ?>
                                     <center>
                                         <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                         <p class="mt-3">Tidak ada data</p>
                                     </center>
                                 <?php } else { ?>

                                     <table class="table table-hover table-sm table-striped">
                                         <tr>
                                             <th style="width: 10px" class="text-center">#</th>
                                             <th style="width: 150px" class="text-center">Waktu Kirim Notifikasi per Hari</th>
                                             <th style="width: 200px" class="text-center">Status</th>
                                             <th style="width: 300px" class="text-center">Jenis Notifikasi</th>
                                         </tr>
                                         <?php $no = 1;

                                            foreach ($notif as $m) { ?>
                                             <tr>
                                                 <td class="text-center"><?= $no++ ?></td>
                                                 <td class="text-center"><?= $m->waktu ?></td>
                                                 <td class="text-center">
                                                     <?php if ($m->aktif == 1) { ?>
                                                         <span class="badge bg-danger">Aktif</span>
                                                     <?php } ?>
                                                 </td>
                                                 <td class="text-center"><?= $m->jenis_notifikasi ?></td>
                                             </tr>
                                         <?php } ?>
                                     </table>


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




         <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-label" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <div id="overlayPengaturanNotif" class="overlay hidden">
                             <i class="fas fa-2x fa-sync fa-spin"></i>
                         </div>
                         <h5 class="modal-title" id="modal-addBuat-label">Setting Waktu Notifikasi</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">

                         <form id="pengaturanForm" method="post" class="form-horizontal" action="<?= base_url('notifikasi/set-pengaturan') ?>">
                             <div class="box-body">
                                 <div class="form-group row mb-3">
                                     <label class="col-5 col-form-label">Wakut Pengiriman Notifikasi</label>
                                     <div class="col-7">
                                         <input type="time" name="waktu" class="form-control" required="required" />
                                     </div>
                                 </div>
                                 <div class="form-group row mb-3">
                                     <label class="col-5 col-form-label">Status Notifikasi</label>
                                     <div class="col-7">
                                         <div class="custom-control custom-checkbox">
                                             <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="aktif" value="1" required>
                                             <label for="customCheckbox1" class="custom-control-label">Aktif</label>
                                         </div>

                                     </div>
                                 </div>
                                 <div class="form-group row mb-3">
                                     <label class="col-5 col-form-label">Jenis Notifikasi</label>
                                     <div class="col-7">
                                         <input type="text" name="jenis_notifikasi" id="jenis_notifikasi" class="form-control" value="WhatsApp" readonly />
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
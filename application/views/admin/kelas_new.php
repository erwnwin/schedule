         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Data Kelas</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">


                     <div class="card card-default">
                         <div class="card-header">
                             <h3 class="card-title">Daftar Kelas pada SMA</h3>
                             <div class="card-tools">
                                 <a type="button" class="btn btn-sm btn-primaryku" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus-circle"></i> Create</a>
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table  table-hover">
                                     <thead>
                                         <tr>
                                             <th style="width: 5px" class="text-center">#</th>
                                             <th class="text-center">Nama Kelas</th>
                                             <!-- <th class="text-center">Urutan Kelas</th> -->
                                             <th style="width: 130px" class="text-center">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if ($kelas == null) { ?>
                                             <td colspan="6">
                                                 <center>
                                                     <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                                     <p class="mt-3">Tidak ada data</p>
                                                 </center>
                                             </td>
                                         <?php } else { ?>
                                             <?php $no = 1;
                                                foreach ($kelas as $r) { ?>
                                                 <tr>
                                                     <td class="text-center"><?= $no++ ?></td>
                                                     <td class="text-center">Kelas <?= $r->kelas ?> <?= $r->urutan_kelas ?></td>
                                                     <!-- <td class="text-center"><?= $r->nama_ruangan ?></td> -->
                                                     <td class="text-center">
                                                         <a type="button" class="btn btn-warningku btn-sm" data-toggle="modal" data-target="#modal-update<?= $r->id_kelas ?>"> Edit</a>
                                                         <a type="button" class="btn btn-dangerku btn-sm" data-toggle="modal" data-target="#modal-delete<?= $r->id_kelas ?>"> Delete</a>
                                                         <!-- <a href="<?= base_url('kelas/delete/' . $r->id_kelas) ?>" class="btn btn-dangerku btn-sm btn-xs" id="btn-hapus"> <i class="fas fa-trash-alt"></i></a> -->
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


             <!-- Modal Delete -->
             <?php foreach ($kelas as $r) { ?>
                 <div class="modal fade" id="modal-delete<?= $r->id_kelas ?>" tabindex="-1" role="dialog" aria-labelledby="modal-edit-label<?= $r->id_kelas ?>" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="modal-edit-label<?= $r->id_kelas ?>">Konfirmasi Delete</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 <div class="modal-body">
                                     <p>Apakah Anda yakin ingin menghapus mapel <strong>kelas <?= $r->kelas ?> <?= $r->urutan_kelas ?></strong> (Kode/ID: <?= $r->id_kelas ?>)?</p>
                                 </div>
                             </div>
                             <form method="post" action="<?= base_url('kelas/delete/' . $r->id_kelas) ?>">
                                 <div class="modal-footer justify-content-between">
                                     <button type="button" class="btn btn-warningku btn-sm" data-dismiss="modal">Close</button>
                                     <button type="submit" class="btn btn-dangerku btn-sm">Hapus</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             <?php } ?>

             <!-- Modal Form Update-->
             <?php foreach ($kelas as $r) { ?>
                 <div class="modal fade" id="modal-update<?= $r->id_kelas ?>">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div id="overlayKelasEdit" class="overlay hidden">
                                 <i class="fas fa-2x fa-sync fa-spin"></i>
                             </div>
                             <div class="modal-header">
                                 <h4 class="modal-title">Form Update Data Kelas</h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 <form id="formUpdateKelas" method="post" action="<?= base_url('kelas/act-update') ?>">
                                     <input type="hidden" name="id_kelas" class="form-control" value="<?= $r->id_kelas ?>">
                                     <div class="form-group row mb-3">
                                         <label class="col-3 col-form-label">Kelas</label>
                                         <div class="col-9">
                                             <select name="kelas" class="form-control select2" data-toggle="select2" style="width: 100%;" required>
                                                 <option value="">Pilih Kelas</option>
                                                 <?php foreach ($all_kelas as $kelas_option): ?>
                                                     <option value="<?= $kelas_option ?>" <?= ($kelas_option == $r->kelas) ? 'selected' : '' ?>><?= $kelas_option ?></option>
                                                 <?php endforeach; ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group row mb-3">
                                         <label class="col-3 col-form-label">Urutan Kelas</label>
                                         <div class="col-9">
                                             <select name="urutan_kelas" class="form-control select2" data-toggle="select2" style="width: 100%;" required>
                                                 <option value="">Pilih Urutan</option>
                                                 <?php foreach ($all_urutan as $urutan_option): ?>
                                                     <option value="<?= $urutan_option ?>" <?= ($urutan_option == $r->urutan_kelas) ? 'selected' : '' ?>><?= $urutan_option ?></option>
                                                 <?php endforeach; ?>
                                             </select>
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



             <!-- modal add kelas -->
             <div class="modal fade" id="modal-tambah">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div id="overlayKelas" class="overlay hidden">
                             <i class="fas fa-2x fa-sync fa-spin"></i>
                         </div>
                         <div class="modal-header">
                             <h4 class="modal-title">Form Tambah Data Kelas</h4>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">

                             <form id="formAddKelas" class="form-horizontal" method="post" action="<?= base_url('kelas/act-add') ?>">
                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Kelas</label>
                                     <div class="col-9">
                                         <select name="kelas" class="form-control select2" data-toggle="select2" style="width: 100%;" required>
                                             <option value="">Pilih Kelas</option>
                                             <option value="X">X</option>
                                             <option value="XI">XI</option>
                                             <option value="XII">XII</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Urutan Kelas</label>
                                     <div class="col-9">
                                         <select name="urutan_kelas" class="form-control select2" data-toggle="select2" style="width: 100%;" required>
                                             <option value="">Pilih Urutan</option>
                                             <option value="1">1</option>
                                             <option value="2">2</option>
                                             <option value="3">3</option>
                                             <option value="4">4</option>
                                             <option value="5">5</option>
                                             <option value="6">6</option>
                                             <option value="7">7</option>
                                             <option value="8">8</option>
                                             <option value="9">9</option>
                                             <option value="10">10</option>
                                         </select>
                                     </div>
                                 </div>
                         </div>
                         <div class="modal-footer justify-content-between">
                             <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
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
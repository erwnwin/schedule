         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Data Guru</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">


                     <div class="row">
                         <div class="col-12">
                             <div class="card card-default">
                                 <div class="card-header">
                                     <h3 class="card-title">Data Guru Terdaftar</h3>

                                     <div class="card-tools">
                                         <button type="button" class="btn btn-sm btn-primaryku" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus-circle"></i> Create</button>
                                     </div>
                                 </div>
                                 <div class="card-body">

                                     <div class="table-responsive">
                                         <table class="table table-hover">
                                             <thead>
                                                 <tr>
                                                     <th style="width: 10px" class="text-center">#</th>
                                                     <th class="text-center">NIP/NIK</th>
                                                     <th class="text-center">Nama Lengkap Guru (Beserta Gelar)</th>
                                                     <th class="text-center">Alamat</th>
                                                     <th class="text-center">WA Aktif</th>
                                                     <th style="width: 100px" class="text-center">Action</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php if ($guru == null) { ?>
                                                     <td colspan="6">
                                                         <center>
                                                             <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                                             <p class="mt-3">Tidak ada data</p>
                                                         </center>
                                                     </td>
                                                 <?php } else { ?>
                                                     <?php $no = 1;
                                                        foreach ($guru as $g) { ?>
                                                         <!-- <tr style="background-color: <?= $g->warna_guru ?>;"> -->
                                                         <tr>
                                                             <td><?= $no++ ?></td>
                                                             <td><?= $g->nip_nik ?></td>
                                                             <td><?= $g->nama ?></td>
                                                             <td><?= $g->alamat ?></td>
                                                             <td>+<?= $g->telp_wa ?> <span class="badge badge-danger">aktif</span></td>
                                                             <td class="text-center">
                                                                 <a type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#modal-edit<?= $g->id_guru ?>"> Edit</a>
                                                                 <a type="button" class="btn btn-sm btn-dangerku" data-toggle="modal" data-target="#modal-hapus<?= $g->id_guru ?>"> <i class="fas fa-trash"></i></a>
                                                             </td>
                                                         </tr>
                                                     <?php } ?>
                                                 <?php } ?>
                                             </tbody>
                                         </table>
                                     </div> <!-- end table-responsive-->
                                 </div>
                                 <div class="card-footer clearfix">
                                     <div id="pagination">
                                         <?php echo $pagination; ?>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>



                 </div>
             </section>



             <!-- modal add guru -->
             <div class="modal fade" id="modal-tambah">
                 <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                         <div id="overlayGuru" class="overlay hidden">
                             <i class="fas fa-2x fa-sync fa-spin"></i>
                         </div>
                         <div class="modal-header">
                             <h4 class="modal-title">Form Tambah Data Guru</h4>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <form id="formAddGuru" class="form-horizontal" method="post" action="<?= base_url('guru/act') ?>">
                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">NIP/NIK</label>
                                     <div class="col-9">
                                         <input type="number" name="nip_nik" class="form-control" placeholder="NIP/NIK/Nomor" required>
                                     </div>
                                 </div>
                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Nama Lengkap Guru</label>
                                     <div class="col-9">
                                         <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap Guru (Beserta Gelar)" required>
                                     </div>
                                 </div>
                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Jenis Kelamin</label>
                                     <div class="col-9">
                                         <select class="form-control" name="jenis_kelamin" required>
                                             <option value="">Pilih Jenis Kelamin</option>
                                             <option value="Laki-laki">Laki-laki</option>
                                             <option value="Perempuan">Perempuan</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Alamat</label>
                                     <div class="col-9">
                                         <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                                     </div>
                                 </div>
                                 <div class="form-group row mb-3">
                                     <label for="inputPassword3" class="col-3 col-form-label">No WhatsApp <span class="text-danger">*aktif</span></label>
                                     <div class="col-9">
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text">+62</span>
                                             </div>
                                             <input type="text" name="telp_wa" class="form-control" placeholder="82xxxxxxx" value="" maxlength="13" required>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Warna</label>
                                     <div class="col-9">
                                         <input class="form-control" type="color" name="warna_guru" value="#727cf5">
                                     </div>
                                 </div>
                                 <center>
                                     <h5 class="modal-title text-white" style="background-color: teal;"><i class="uil-user"></i> Data Akun </h5>
                                 </center>
                                 <div class="form-group row mb-3 mt-3">
                                     <label class="col-3 col-form-label">Alamat Email</label>
                                     <div class="col-9">
                                         <input type="email" name="alamat_email" class="form-control" placeholder="Alamat email" required>
                                     </div>
                                 </div>
                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Password</label>
                                     <div class="col-9">
                                         <input type="text" name="password" class="form-control" placeholder="*******" autocomplete="off" required>
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

             <!-- modal hapus -->
             <?php foreach ($guru as $g) { ?>
                 <div class="modal fade" id="modal-hapus<?= $g->id_guru ?>">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div id="overlayGuru" class="overlay hidden">
                                 <i class="fas fa-2x fa-sync fa-spin"></i>
                             </div>
                             <div class="modal-header">
                                 <h4 class="modal-title">Yakin Hapus Data</h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 <form action="<?= base_url('guru/delete/' . $g->id_guru) ?>" method="post">
                                     <center>
                                         <p>
                                             Data Guru dengan nama : <b><u><?= $g->nama ?></u> </b> Akan di Hapus.
                                         </p>
                                     </center>


                             </div>
                             <div class="modal-footer justify-content-between">
                                 <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-dangerku btn-sm">Hapus</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             <?php } ?>

             <!-- modal edit -->
             <?php foreach ($guru as $g) { ?>
                 <div class="modal fade" id="modal-edit<?= $g->id_guru ?>">
                     <div class="modal-dialog modal-lg">
                         <div class="modal-content">
                             <div id="overlayGuru" class="overlay hidden">
                                 <i class="fas fa-2x fa-sync fa-spin"></i>
                             </div>
                             <div class="modal-header">
                                 <h4 class="modal-title">Edit Data Guru</h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 <form id="formUpdateGuru" class="form-horizontal" method="post" action="<?= base_url('guru/act-edit') ?>">
                                     <div class="form-group row mb-3">
                                         <label class="col-3 col-form-label">NIP/NIK</label>
                                         <div class="col-9">
                                             <input type="hidden" name="id_guru" class="form-control" value="<?= $g->id_guru ?>" required="required" placeholder="NIP/NIK/Nomor" />
                                             <input type="number" name="nip_nik" class="form-control" value="<?= $g->nip_nik ?>" placeholder="NIP/NIK/Nomor" required>
                                         </div>
                                     </div>
                                     <div class="form-group row mb-3">
                                         <label class="col-3 col-form-label">Nama Lengkap Guru</label>
                                         <div class="col-9">
                                             <input type="text" name="nama" class="form-control" value="<?= $g->nama ?>" placeholder="Nama Lengkap Guru (Beserta Gelar)" required>
                                         </div>
                                     </div>
                                     <div class="form-group row mb-3">
                                         <label class="col-3 col-form-label">Jenis Kelamin</label>
                                         <div class="col-9">
                                             <select class="form-control" name="jenis_kelamin" required>
                                                 <option value="">Pilih Jenis Kelamin</option>
                                                 <option value="Laki-laki" <?php if ($g->jenis_kelamin == 'Laki-laki') echo 'selected' ?>>Laki-laki</option>
                                                 <option value="Perempuan" <?php if ($g->jenis_kelamin == 'Perempuan') echo 'selected' ?>>Perempuan</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group row mb-3">
                                         <label class="col-3 col-form-label">Alamat</label>
                                         <div class="col-9">
                                             <input type="text" name="alamat" class="form-control" value="<?= $g->alamat ?>" placeholder="Alamat" required>
                                         </div>
                                     </div>
                                     <div class="form-group row mb-3">
                                         <label for="inputPassword3" class="col-3 col-form-label">No WhatsApp <span class="text-danger">*aktif</span></label>
                                         <div class="col-9">
                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text">+62</span>
                                                 </div>
                                                 <input type="text" name="telp_wa" class="form-control" value="<?= $g->telp_wa ?>" placeholder="82xxxxxxx" value="" maxlength="13" required>

                                             </div>
                                         </div>
                                     </div>
                                     <div class="form-group row mb-3">
                                         <label class="col-3 col-form-label">Warna</label>
                                         <div class="col-9">
                                             <input class="form-control" type="color" name="warna_guru" value="<?= $g->warna_guru ?>">
                                         </div>
                                     </div>
                                     <center>
                                         <h5 class="modal-title text-white" style="background-color: teal;"><i class="uil-user"></i> Data Akun </h5>
                                     </center>
                                     <div class="form-group row mb-3 mt-3">
                                         <label class="col-3 col-form-label">Alamat Email</label>
                                         <div class="col-9">
                                             <input type="email" name="alamat_email" value="<?= $g->alamat_email ?>" class="form-control" placeholder="Alamat email" required>
                                         </div>
                                     </div>
                                     <div class="form-group row mb-3">
                                         <label class="col-3 col-form-label">Password</label>
                                         <div class="col-9">
                                             <input type="text" name="password" value="<?= $g->password ?>" class="form-control" placeholder="*******" required>
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
             <?php } ?>


             <div>
                 <br>
             </div>
         </div>
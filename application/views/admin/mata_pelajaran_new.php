         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Data Mata Pelajaran</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">


                     <div class="card card-default">
                         <div id="overlayGuru" class="overlay hidden">
                             <i class="fas fa-2x fa-sync fa-spin"></i>
                         </div>
                         <div class="card-header">
                             <h3 class="card-title">Daftar Mata Pelajaran pada SMA</h3>
                             <div class="card-tools">
                                 <a type="button" class="btn btn-sm btn-primaryku" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus-circle"></i> Create</a>
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">

                             <!-- <div class="form-row mb-3">
                                 <div class="form-group col-md-6">
                                     <select id="filter-mapel" class="form-control select2">
                                         <option value="">Pilih Mata Pelajaran</option>
                                     </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                     <select id="filter-kelas" class="form-control select2">
                                         <option value="">Pilih Kelas</option>
                                     </select>
                                 </div>
                             </div> -->



                             <div class="table-responsive">
                                 <table class="table table-hover table-sm table-striped">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px" class="text-center">#</th>
                                             <th class="text-center">Kode Mata Pelajaran</th>
                                             <th class="text-center">Nama Mata Pelajaran</th>
                                             <th class="text-center">Kelas</th>
                                             <th class="text-center">Beban Jam / MAPEL</th>
                                             <th class="text-center">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody id="mapel-tbody">
                                         <?php if ($mapel == null) { ?>
                                             <tr>
                                                 <td colspan="6">
                                                     <center>Tidak ada data</center>
                                                     <!-- <center>
                                                         <img src="<?= base_url() ?>assets/img/no-data.svg" alt="" width="30%">
                                                         <p class="mt-3">Tidak ada data</p>
                                                     </center> -->
                                                 </td>
                                             </tr>
                                         <?php } else { ?>
                                             <?php $no = 1;
                                                foreach ($mapel as $r) { ?>
                                                 <tr>
                                                     <td class="text-center"><?= $no++ ?></td>
                                                     <td class="text-center"><?= $r->kode_mapel ?></td>
                                                     <td><?= $r->nama_mapel ?></td>
                                                     <td class="text-center"><?= $r->kelas ?></td>
                                                     <td class="text-center"><?= $r->beban_jam ?> Jam</td>
                                                     <td class="text-center">
                                                         <button type="button" class="btn btn-warningku btn-sm" data-toggle="modal" data-target="#modal-edit<?= $r->kode_mapel ?>" data-id="<?= $r->kode_mapel ?>">Edit</button>
                                                         <button type="button" class="btn btn-dangerku btn-sm" data-toggle="modal" data-target="#modal-hapus<?= $r->kode_mapel ?>" data-id="<?= $r->kode_mapel ?>">Delete</button>
                                                     </td>
                                                 </tr>
                                             <?php } ?>
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
                 </div>
             </section>


             <!-- modal Hapus -->
             <?php foreach ($mapel as $r) { ?>
                 <div class="modal fade" id="modal-hapus<?= $r->kode_mapel ?>" tabindex="-1" role="dialog" aria-labelledby="modal-edit-label<?= $r->kode_mapel ?>" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="modal-edit-label<?= $r->kode_mapel ?>">Konfirmasi Delete</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 <div class="modal-body">
                                     <p>Apakah Anda yakin ingin menghapus mapel <strong><?= $r->nama_mapel ?></strong> (Kode: <?= $r->kode_mapel ?>)?</p>
                                 </div>
                             </div>
                             <form method="post" action="<?= base_url('mata-pelajaran/delete/' . $r->kode_mapel) ?>">
                                 <div class="modal-footer justify-content-between">
                                     <button type="button" class="btn btn-warningku btn-sm" data-dismiss="modal">Close</button>
                                     <button type="submit" class="btn btn-dangerku btn-sm">Hapus</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             <?php } ?>

             <!-- Modal untuk Edit Data -->
             <?php foreach ($mapel as $r) { ?>
                 <div class="modal fade" id="modal-edit<?= $r->kode_mapel ?>" tabindex="-1" role="dialog" aria-labelledby="modal-edit-label<?= $r->kode_mapel ?>" aria-hidden="true">
                     <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="modal-edit-label<?= $r->kode_mapel ?>">Update Data</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 <form id="formEditMapel" class="form-horizontal" method="post" action="<?= base_url('mata-pelajaran/act-edit') ?>">
                                     <input type="hidden" name="kode_mapel" value="<?= $r->kode_mapel ?>">
                                     <div class="form-group row mb-3">
                                         <label class="col-3 col-form-label">Kode Mata Pelajaran</label>
                                         <div class="col-9">
                                             <input type="text" name="kode_mapel" class="form-control" required="required" value="<?= $r->kode_mapel ?>" placeholder="Kode Mata Pelajaran" autocomplete="off" readonly />
                                         </div>
                                     </div>
                                     <div class="form-group row mb-3">
                                         <label class="col-3 col-form-label">Nama Mata Pelajaran</label>
                                         <div class="col-9">
                                             <input type="text" name="nama_mapel" class="form-control" required="required" value="<?= $r->nama_mapel ?>" placeholder="Mata Pelajaran" autocomplete="off" />
                                         </div>
                                     </div>
                                     <div class="form-group row mb-3">
                                         <label class="col-3 col-form-label">Kelas</label>
                                         <div class="col-9">
                                             <?php
                                                $classes_by_mapel = $this->m_mapel->get_classes_by_mapel($r->kode_mapel);
                                                $selectedKelas = array_column($classes_by_mapel, 'id_kelas');
                                                foreach ($all_classes as $k) {
                                                    // Periksa apakah kelas ini terpilih
                                                    $checked = in_array($k->id_kelas, $selectedKelas) ? 'checked' : '';
                                                ?>
                                                 <div class="custom-control custom-checkbox">
                                                     <input class="custom-control-input" name="chkKelas[]" type="checkbox" id="kelas-<?= $k->id_kelas ?>-<?= $r->kode_mapel ?>" value="<?= $k->id_kelas ?>" <?= $checked ?>>
                                                     <label class="custom-control-label" for="kelas-<?= $k->id_kelas ?>-<?= $r->kode_mapel ?>"> Kelas <?= $k->kelas ?> <?= $k->urutan_kelas ?></label>
                                                 </div>
                                             <?php } ?>
                                         </div>
                                     </div>
                                     <div class="form-group row mb-3">
                                         <label class="col-3 col-form-label">Beban Jam</label>
                                         <div class="col-9">
                                             <input type="text" inputmode="numeric" name="beban_jam" class="form-control" maxlength="2" required="required" value="<?= $r->beban_jam ?>" placeholder="Beban Jam" autocomplete="off" />
                                             <span class="text-danger text-small" style="font-size: 10px;">Input angka 1-10 (sesuaikan beban jam bukan menit)</span>
                                         </div>
                                     </div>
                             </div>
                             <div class="modal-footer justify-content-between">
                                 <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primaryku btn-sm">Update</button>
                             </div>
                             </form>
                         </div>
                     </div>
                 </div>
             <?php } ?>






             <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-label" aria-hidden="true">
                 <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <div id="overlayAddMapel" class="overlay hidden">
                                 <i class="fas fa-2x fa-sync fa-spin"></i>
                             </div>
                             <h5 class="modal-title" id="modal-tambah-label">Tambah Data Mata Pelajaran</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <form id="formAddMapel" class="form-horizontal" method="post" action="<?= base_url('mata-pelajaran/act-add2') ?>">
                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Kode Mata Pelajaran</label>
                                     <div class="col-9">
                                         <input type="text" name="kode_mapel" class="form-control" required="required" value="" placeholder="Kode Mata Pelajaran" autocomplete="off" />
                                         <input type="hidden" name="jenis" class="form-control" required="required" value="TEORI" placeholder="Nama/Kode Ruangan" />
                                     </div>
                                 </div>
                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Nama Mata Pelajaran</label>
                                     <div class="col-9">
                                         <input type="text" name="nama_mapel" class="form-control" required="required" value="" placeholder="Mata Pelajaran" autocomplete="off" />
                                     </div>
                                 </div>
                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Kelas</label>
                                     <div class="col-9">
                                         <?php
                                            $kls = $this->db->query("SELECT * FROM kelasku")->result();
                                            foreach ($kls as $k) { ?>

                                             <div class="custom-control custom-checkbox">
                                                 <input class="custom-control-input" name="chkKelas[]" type="checkbox" id="<?= $k->id_kelas ?>" value="<?= $k->id_kelas ?>">
                                                 <label class="custom-control-label" for="<?= $k->id_kelas ?>"> Kelas <?= $k->kelas ?> <?= $k->urutan_kelas ?></label>
                                             </div>
                                         <?php } ?>
                                     </div>
                                 </div>
                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Semester</label>
                                     <div class="col-9">
                                         <select name="kelompok_mapel" class="form-control" required>
                                             <option value="">Pilih Semester</option>
                                             <option value="A">Ganjil</option>
                                             <option value="B">Genap</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="form-group row mb-3">
                                     <label class="col-3 col-form-label">Beban Jam</label>
                                     <div class="col-9">
                                         <input type="text" name="beban_jam" class="form-control" maxlength="2" required="required" value="" placeholder="Beban Jam" autocomplete="off" />
                                         <span class="text-danger text-small" style="font-size: 10px;">Input angka 1-10 (sesuaikan berapa beban jam bukan menit)</span>
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
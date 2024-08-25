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



                             <div class="card card-default">
                                 <div class="card-header">
                                     <h3 class="card-title">Tambah / Update Guru Pengampu : Mata Pelajaran <span class="badge badge-info"><?= $nama_mapel ?></span></h3>
                                 </div>
                                 <div class="card-body">
                                     <form action="<?= base_url('guru-pengampu/act-add') ?>" method="POST">
                                         <input type="hidden" value="<?= count($dataMapel) ?>" name="jml_data">
                                         <input type="hidden" value="<?= $kodeMapel ?>" name="kode_mapel">
                                         <?php
                                            $data = 0;
                                            foreach ($dataMapel as $value) { ?>
                                             <div class="form-group" data-group='<?= $data ?>'>
                                                 <label for="exampleFormControlInput1">KELAS ~ <?= $value->kelas ?> <?= $value->urutan_kelas ?></label>
                                                 <?php if ($value->id_guru == null) { ?>
                                                     <input type="hidden" value="<?= $value->id_kelas ?>" name="id_kelas[]">
                                                     <input type="hidden" value="<?= $value->id_mapel ?>" name="id_mapel[]">
                                                     <input type="hidden" value="<?= $value->beban_jam ?>" name="beban_jam[]">
                                                 <?php } else { ?>
                                                     <input type="hidden" class="form-kelas" value="<?= $value->id_kelas ?>" name="id_kelas[]" disabled>
                                                     <input type="hidden" class="form-mapel" value="<?= $value->id_mapel ?>" name="id_mapel[]" disabled>
                                                     <input type="hidden" class="form-beban-jam" value="<?= $value->beban_jam ?>" name="beban_jam[]" disabled>
                                                 <?php } ?>
                                                 <?php if ($value->id_guru == null) { ?>
                                                     <div class="row">
                                                         <div class="col-sm-9">
                                                             <select name="guru[]" class="form-control select2" data-toggle="select2" style="width: 100%;">
                                                                 <option selected="selected">Pilih Guru</option>
                                                                 <?php foreach ($guru as $datalistGuru) : ?>
                                                                     <option value="<?= $datalistGuru->id_guru ?>"><?= $datalistGuru->nama ?> </option>;
                                                                 <?php endforeach; ?>
                                                             </select>
                                                         </div>
                                                     </div>
                                                 <?php } else { ?>
                                                     <div class="row">
                                                         <div class="col-sm-9">
                                                             <select name="guru[]" class="form-control select2 select-guru" data-toggle="select2" style="width: 100%;" disabled>
                                                                 <?php foreach ($guru as $datalistGuru) :
                                                                        $selected = ($value->id_guru == $datalistGuru->id_guru) ? 'selected' : ''; ?>
                                                                     <option value="<?= $datalistGuru->id_guru ?>" <?= $selected ?>><?= $datalistGuru->nama ?> </option>;
                                                                 <?php endforeach; ?>
                                                             </select>
                                                         </div>
                                                         <div class="col-sm-3">
                                                             <div class="btn btn-dangerku btn-block hapus-data text-white" data-idtugas="<?= $value->id_tugas ?>" data-group="<?= $data ?>"><i class="fa fa-trash"></i> Hapus</div>
                                                             <!-- <div class="btn btn-warning hapus-data" data-idtugas="<?= $value->id_tugas ?>" data-group="<?= $data ?>"> Hapus</div> -->
                                                         </div>
                                                     </div>
                                                 <?php } ?>
                                             </div>
                                         <?php
                                                $data++;
                                            } ?>
                                         <div class="box-footer">
                                             <button type="submit" class="btn btn-primaryku btn-sm" id="submitBtn">
                                                 <span class="btn-loader" style="display: none;"> <i class="fa fa-spinner fa-spin"></i> </span>
                                                 <span class="btn-text">Simpan</span>
                                             </button>
                                             <!-- <input type="submit" class="btn btn-success btn-block btn-flat mb-2" value="Simpan"> -->
                                             <a href="<?= base_url('guru-pengampu') ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                                         </div>

                                     </form>
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
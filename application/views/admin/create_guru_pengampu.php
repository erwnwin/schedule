<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Create Guru Pengampu</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">

        <!-- <?php echo $this->session->flashdata('pesan') ?> -->

        <div id="flash-gagal" data-flash="<?= $this->session->flashdata('gagal'); ?>"></div>
        <div id="flash" data-flash="<?= $this->session->flashdata('sukses'); ?>"></div>
        <div id="flash-edit" data-flash="<?= $this->session->flashdata('edit'); ?>"></div>

        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-1">Tambah Guru Pengampu : <b> <span class="badge badge-info"><?= $nama_mapel ?></span></b></h4>
                    <hr>
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
                                            <div class="btn btn-warning btn-block btn-flat hapus-data" data-idtugas="<?= $value->id_tugas ?>" data-group="<?= $data ?>"><i class="fa fa-trash"></i> Hapus</div>
                                            <!-- <div class="btn btn-warning hapus-data" data-idtugas="<?= $value->id_tugas ?>" data-group="<?= $data ?>"> Hapus</div> -->
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php
                            $data++;
                        } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
                            <!-- <input type="submit" class="btn btn-success btn-block btn-flat mb-2" value="Simpan"> -->
                            <a href="<?= base_url('guru-pengampu') ?>" class="btn btn-flat btn-danger"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
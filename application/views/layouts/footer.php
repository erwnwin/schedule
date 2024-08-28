<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        Anything you want
    </div>
    <strong>Copyright &copy; 2022-<?php echo date('Y'); ?> <a href="">Titik Balik Teknologi</a>.</strong>
</footer>

<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>

<script src="<?= base_url() ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url() ?>public/assets/dist/js/adminlte.min.js"></script>
<script src="<?= base_url() ?>public/assets/js/add-notif.js"></script>
<script src="<?= base_url() ?>public/assets/js/notifikasi.js"></script>
<script src="<?= base_url() ?>public/assets/js/upload.js"></script>
<script src="<?= base_url() ?>public/assets/js/jadwalku.js"></script>
<script src="<?= base_url() ?>public/assets/js/edit-guru.js"></script>
<script src="<?= base_url() ?>public/assets/js/add-guru.js"></script>
<script src="<?= base_url() ?>public/assets/js/filter-mapel.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- <script src="<?= base_url() ?>public/assets/js/edit-kelas.js"></script> -->
<!-- <script src="<?= base_url() ?>public/assets/js/drag.js"></script> -->
<!-- <script src="<?= base_url() ?>public/assets/js/update-kategori.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
    const xValues = ["Laki-laki", "Perempuan"];
    const yValues = [10, 2];
    const barColors = [
        "#b91d47",
        "#00aba9"
    ];

    new Chart("myChart", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,

            }
        }
    });
</script>

<?php if ($this->uri->segment(1) == "guru-pengampu") : ?>
    <script>
        var numberForm = 2;
        $("#mapelSelectForm").on('change', function() {
            var selectedVal = $(this).val();
            var dataSelect = $(this).data("mapelselect");
            $.ajax({
                type: "POST",
                url: "<?= base_url('DataPenugasanGuru/getDataKelasByKodeMapel') ?>",
                data: {
                    'kode_mapel': selectedVal
                },
                success: function(data) {
                    dataKelas = JSON.parse(data);
                    console.log(dataKelas);
                }
            })
            console.log('inidata' + dataSelect);
        });
        // Modal 
        $('#TugasGuru').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var mapel = button.data('mapel');
            var kode_mapel = button.data('kodemapel');
            var modal = $(this);
            $.ajax({
                type: 'POST',
                url: "<?= base_url('DataPenugasanGuru/getDataKelas') ?>",
                data: {
                    'kode_mapel': kode_mapel
                },
                success: function(data) {
                    modal.find('.modal-title').text('Mata Pelajaran ' + mapel);
                    modal.find('.modal-body input').val(mapel);
                    modal.find('#form').html(data);
                    // html = JSON.parse(data);
                    // console.log(html);
                }
            })
        })

        $('div.hapus-data').on('click', function() {
            const form = $(this);
            let id_tugas = form.data('idtugas');
            let form_group = form.parent().parent().parent();
            $.ajax({
                url: "<?= base_url('Guru_pengampu/hapus') ?>",
                type: "POST",
                data: {
                    'id_tugas': id_tugas
                },
                success: function(data) {
                    form_group.find(".form-mapel").removeAttr("disabled");
                    form_group.find(".form-kelas").removeAttr("disabled");
                    form_group.find(".form-beban-jam").removeAttr("disabled");
                    form_group.find(".select-guru").removeAttr("disabled");
                    form.remove();
                }
            })
        });
    </script>
<?php endif; ?>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>

<script>
    // Fungsi untuk menampilkan notifikasi Toast dengan pesan kustom
    function showToast(message, icon = 'success') {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
        });

        Toast.fire({
            icon: icon,
            title: message
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Cek jika ada flashdata untuk 'sukses'
        <?php if ($this->session->flashdata('sukses')): ?>
            var successMessage = <?php echo json_encode($this->session->flashdata('sukses')); ?>;
            showToast(successMessage);
        <?php endif; ?>


        <?php if ($this->session->flashdata('edit')): ?>
            var successMessage = <?php echo json_encode($this->session->flashdata('edit')); ?>;
            showToast(successMessage);
        <?php endif; ?>


        <?php if ($this->session->flashdata('gagal')): ?>
            var successMessage = <?php echo json_encode($this->session->flashdata('gagal')); ?>;
            showToast(successMessage);
        <?php endif; ?>


        // Cek jika ada flashdata untuk 'error'
        <?php if ($this->session->flashdata('error')): ?>
            var errorMessage = <?php echo json_encode($this->session->flashdata('error')); ?>;
            showToast(errorMessage, 'error');
        <?php endif; ?>


    });
</script>

<script>
    function showToastKu(message, icon = 'error') {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
        });

        Toast.fire({
            icon: icon,
            title: message
        });
    }

    document.addEventListener('DOMContentLoaded', function() {

        <?php if ($this->session->flashdata('valid')): ?>
            var successMessage = <?php echo json_encode($this->session->flashdata('valid')); ?>;
            showToastKu(successMessage);
        <?php endif; ?>

    });



    function showToastInfo(message, icon = 'info') {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
        });

        Toast.fire({
            icon: icon,
            title: message
        });
    }

    document.addEventListener('DOMContentLoaded', function() {

        <?php if ($this->session->flashdata('info')): ?>
            var successMessage = <?php echo json_encode($this->session->flashdata('info')); ?>;
            showToastInfo(successMessage);
        <?php endif; ?>

    });
</script>


<?php if ($this->uri->segment(1) == "penjadwalan") : ?>
    <script>
        let draggedElement = null;

        document.addEventListener('dragstart', function(event) {
            draggedElement = event.target;
            event.dataTransfer.setData('text/plain', draggedElement.id);
        });

        document.addEventListener('dragover', function(event) {
            event.preventDefault();
        });

        document.addEventListener('drop', function(event) {
            event.preventDefault();
            if (event.target.classList.contains('penjadwalan') && draggedElement !== event.target) {
                const draggedId = event.dataTransfer.getData('text/plain');
                const targetElement = event.target;

                const draggedElementData = JSON.parse(document.getElementById(draggedId).getAttribute('data-jadwal'));
                const targetElementData = JSON.parse(targetElement.getAttribute('data-jadwal'));

                if (draggedElementData && targetElementData) {
                    const formData = {
                        dataFirst: draggedElementData,
                        dataSecond: targetElementData
                    };

                    $.ajax({
                        url: "<?= base_url('penjadwalan/pindahJadwal') ?>",
                        method: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                var Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 4000,
                                });

                                Toast.fire({
                                    icon: 'success',
                                    title: 'Good Job!!<br>Jadwal Berhasil Ditukar'

                                }).then(function() {
                                    location.reload();
                                });
                            } else {

                                var Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 4000,
                                });

                                Toast.fire({
                                    icon: 'error',
                                    title: response.keterangan
                                    // }).then(function() {
                                    //     location.reload();
                                });
                            }
                        }
                    });
                }
            }
        });
    </script>
<?php endif; ?>

<script>
    $(document).ready(function() {
        $('#modal-edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var hari = button.data('hari');
            var keterangan = button.data('keterangan');

            // Mengisi field hidden
            var modal = $(this);
            modal.find('#modal-edit-hari').val(hari);
            modal.find('#modal-edit-keterangan').val(keterangan);

            // Reset semua checkbox
            modal.find('input[name="kelas[]"]').prop('checked', false);

            // Ambil data dari server
            $.ajax({
                url: '<?= base_url('jadwal-khusus/get-kelas-by-hari-and-keterangan') ?>',
                method: 'GET',
                data: {
                    hari: hari,
                    keterangan: keterangan
                },
                success: function(response) {
                    try {
                        var data = JSON.parse(response);
                        var selectedClasses = data.selected_classes || [];
                        $.each(selectedClasses, function(index, value) {
                            modal.find('input[name="kelas[]"][value="' + value + '"]').prop('checked', true);
                        });
                    } catch (e) {
                        console.error("Failed to parse response:", e);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error:", status, error);
                }
            });
        });
    });
</script>






</body>

</html>
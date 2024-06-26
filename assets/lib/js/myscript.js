const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        title: 'Data Penduduk ' ,
        text: 'Berhasil ' + flashData,
        type: 'success'
    })
}
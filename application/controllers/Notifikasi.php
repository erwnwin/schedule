<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('notifikasi_model');
        date_default_timezone_set('Asia/Makassar');
    }

    public function index()
    {
        // Panggil fungsi untuk menghapus pengaturan yang sudah lewat
        $this->notifikasi_model->hapus_pengaturan_yang_lewat();

        $waktu_sekarang = date('H:i');
        $tgl = date('Y-m-d');
        $hari = $this->nama_hariku($tgl);

        // Ambil pengaturan notifikasi yang aktif sesuai waktu sekarang
        $pengaturan = $this->notifikasi_model->get_pengaturan_notifikasi($waktu_sekarang);

        if (!empty($pengaturan)) {
            $notifikasi = $this->notifikasi_model->get_guru_untuk_hari($hari);

            $token = "jFT1fNY+#xWhZiN443zm"; // Ganti dengan token API yang sebenarnya
            foreach ($notifikasi as $row) {
                $target = $row['telp_wa'];

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.fonnte.com/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array(
                        'target' => $target,
                        'message' => '*Notifikasi Jadwal yang akan datang*
*Hai, ' . $row['nama'] . '*

*Jadwal Hari : ' . $row['hari'] . '*
*Kelas : Kelas ' . $row['kelas'] . '.' . $row['urutan_kelas'] . '*
*Mata Pelajaran : ' . $row['kode_mapel'] . ' ~ ' . $row['nama_mapel'] . '*
*Sesi Ke : ' . $row['sesi'] . '*
*Jam Mulai / Selesai : ' . $row['jam_mulai'] . ' s/d ' . $row['jam_selesai'] . '*

Pesan ini dikirim secara otomatis oleh sistem',
                    ),
                    CURLOPT_HTTPHEADER => array(
                        "Authorization: $token"
                    ),
                ));

                $response = curl_exec($curl);
                curl_close($curl);
                echo $response;
            }
        } else {
            echo 'Tidak ada pengaturan notifikasi aktif untuk waktu ini.';
        }
    }

    // Menyimpan pengaturan notifikasi
    public function set_pengaturan()
    {
        $waktu = $this->input->post('waktu');
        $aktif = $this->input->post('aktif');
        $jenis_notifikasi = $this->input->post('jenis_notifikasi');

        $this->notifikasi_model->set_pengaturan($waktu, $aktif, $jenis_notifikasi);
        $this->session->set_flashdata('sukses', 'Nicee!!<br>Data setting waktu berhasil disimpan!');
        redirect(base_url('set-notifikasi'));
    }

    // Menentukan nama hari dari tanggal
    function nama_hariku($tgl = '')
    {
        $hari = date('D', strtotime($tgl));

        $nama_hari = array(
            'Sun' => "Minggu",
            'Mon' => "Senin",
            'Tue' => "Selasa",
            'Wed' => "Rabu",
            'Thu' => "Kamis",
            'Fri' => "Jumat",
            'Sat' => "Sabtu",
        );

        return $nama_hari[$hari] ?? 'Nama hari tidak valid';
    }
}

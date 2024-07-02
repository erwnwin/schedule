<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends CI_Controller
{

    public function index()
    {
        date_default_timezone_set('Asia/Makassar');

        $tgl = date('Y-m-d');
        $hari = nama_hariku($tgl);

        echo "$hari";
        // echo date('Y-m-d H:i:s');

        $servername = "localhost";
        $database = "id21971949_jadwal";
        $username = "id21971949_root";
        $password = "Erwin2024#";

        $conn = new mysqli($servername, $username, $password, $database);

        $sql1 = "SELECT * FROM penjadwalan JOIN mapelku ON penjadwalan.id_mapel=mapelku.id_mapel JOIN guru ON penjadwalan.id_guru=guru.id_guru JOIN kelasku ON penjadwalan.id_kelas=kelasku.id_kelas WHERE hari='$hari' ";
        $result1 = $conn->query($sql1);
        //display data on web page 
        $token = "uZJGJXEvvqf@7_SrQkMW";
        while ($row = mysqli_fetch_array($result1)) {
            $target = "62" . $row['telp_wa'];

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
                    // 'schedule' =>'',

                ),
                CURLOPT_HTTPHEADER => array(
                    "Authorization: $token" //change TOKEN to your actual token
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;
        }
    }

    function nama_hariku($tgl = '')
    {
        $hari = date('D', strtotime($tgl));

        $nama_hari = array(
            'Sun' => "Minggu",
            'Mon' => "Senin",
            'Tue' => "Selasa",
            'Wed' => "Rabu",
            'Thu' => "Kamis",
            'Fri' => "Jum`at",
            'Sat' => "Sabtu",
        );

        if (empty($nama_hari[$hari])) {
            return 'Nama hari tidak valid';
        }
        return $nama_hari[$hari];
    }
}

/* End of file Notifikasi.php */

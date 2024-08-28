<?php

header('Content-Type: application/json; charset=utf-8');

$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Extract data from request
$device = $data['device'];
$sender = $data['sender'];
$message = $data['message'];
$member = $data['member']; //group member who send the message
$name = $data['name'];
$location = $data['location'];
//data below will only received by device with all feature package
//start
$url =  $data['url'];
$filename =  $data['filename'];
$extension =  $data['extension'];

// Database connection details
$servername = "localhost";
$database = "hvsteofj_jadwalku";
$username = "hvsteofj_root";
$password = "@Erwin2024#";

// Create connection
$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch guru details based on sender's phone number
$sql1 = "SELECT * FROM guru WHERE telp_wa='$sender'";
$result1 = mysqli_query($koneksi, $sql1);

if (mysqli_num_rows($result1) > 0) {
    $row1 = mysqli_fetch_assoc($result1);
    $telp_wa1 = $row1['telp_wa'];
    $nama1 = $row1['nama'];
    $alamat_email1 = $row1['alamat_email'];
    $password1 = md5($row1['password']);
} else {
    $reply = [
        "message" => "Maaf, data guru tidak ditemukan.\nPesan ini dikirim secara otomatis oleh sistem",
    ];
    sendFonnte($sender, $reply);
    exit;
}

// Handle message based on the received command
if ($message == "/jadwalsaya") {
    // Fetch jadwal for the given guru
    $sql2 = "SELECT * FROM penjadwalan_fix_share 
             INNER JOIN guru ON guru.id_guru = penjadwalan_fix_share.id_guru 
             INNER JOIN kelasku ON kelasku.id_kelas = penjadwalan_fix_share.id_kelas 
             INNER JOIN mapelku ON mapelku.id_mapel = penjadwalan_fix_share.id_mapel 
             WHERE guru.telp_wa='$telp_wa1'";
    $result2 = mysqli_query($koneksi, $sql2);

    // if (mysqli_num_rows($result2) > 0) {
    //     $jadwal_list = "";
    //     while ($row2 = mysqli_fetch_assoc($result2)) {
    //         $jadwal_list .= "Mata Pelajaran: " . $row2['nama_mapel'] . "\n";
    //         $jadwal_list .= "Hari: " . $row2['hari'] . "\n";
    //         $jadwal_list .= "Kelas: " . $row2['id_kelas'] . "\n";
    //         $jadwal_list .= "Jam: " . $row2['jam_mulai'] . "s/d" . $row2['jam_selesai'] . "\n\n";
    //     }

    //     $reply = [
    //         "message" => "Jadwal Anda adalah:\n\n" . $jadwal_list .
    //             "Pesan ini dikirim secara otomatis oleh sistem",
    //     ];
    // } else {
    //     $reply = [
    //         "message" => "Tidak ada jadwal yang ditemukan untuk Anda.\n\nPesan ini dikirim secara otomatis oleh sistem",
    //     ];
    // }

    if (mysqli_num_rows($result2) > 0) {
        $jadwal_list = "";
        $current_day = ""; // Untuk melacak hari saat ini

        while ($row2 = mysqli_fetch_assoc($result2)) {
            // Jika hari berbeda, tambahkan garis pemisah
            if ($current_day != $row2['hari']) {
                if ($current_day != "") {
                    $jadwal_list .= "============#########===========\n\n"; // Pemisah antar hari
                }
                $current_day = $row2['hari'];
            }

            // Format jam dari 'HH:MM:SS' menjadi 'HH:MM'
            $jam_mulai = date('H:i', strtotime($row2['jam_mulai']));
            $jam_selesai = date('H:i', strtotime($row2['jam_selesai']));

            // Tambahkan informasi jadwal dengan format bold
            $jadwal_list .= "*Mata Pelajaran*: " . $row2['nama_mapel'] . "\n";
            $jadwal_list .= "*Hari*: " . $row2['hari'] . "\n";
            $jadwal_list .= "*Kelas*: " . $row2['id_kelas'] . "\n";
            $jadwal_list .= "**Jam**: " . $jam_mulai . " s/d " . $jam_selesai . " WITA" . "\n\n";
        }

        $reply = [
            "message" => "Jadwal Anda adalah:\n\n" . $jadwal_list .
                "Pesan ini dikirim secara otomatis oleh sistem",
        ];
    } else {
        $reply = [
            "message" => "Tidak ada jadwal yang ditemukan untuk Anda.\n\nPesan ini dikirim secara otomatis oleh sistem",
        ];
    }
} elseif ($message == "/akunsaya") {
    if ($telp_wa1 == $sender) {
        $reply = [
            "message" => "*Hai " . $nama1 . "*\n\n" .
                "Akun Login untuk Sistem Informasi Penjadwalan Mata Pelajaran (SiJadwalTa) adalah\n\n" .
                "*Username/alamat email* = " . $alamat_email1 . "\n" .
                "*Password* = r#h#si#\n\n" .
                "Bapak/Ibu dapat mengubah detail akun login di menu Profil. Jika Bapak/Ibu Guru *Lupa Password* silahkan menghubungi admin SiJadwalTa. Terima Kasih\n\n" .
                "Pesan ini dikirim secara otomatis oleh sistem",
        ];
    } else {
        $reply = [
            "message" => "Maaf tidak ditemukan data terkait.\n\nPesan ini dikirim secara otomatis oleh sistem",
        ];
    }
} elseif ($message == "/nomorhpguru") {
    $reply = [
        "message" => "Nomor HP Guru dapat dilihat pada halaman utama SiJadwalTa pada menu Lainnya >> No. HP/WA Guru\n\n" .
            "Pesan ini dikirim secara otomatis oleh sistem",
    ];
} else {
    $reply = [
        "message" => "Mohon Maaf, " . $nama1 . "\n\n" .
            "BOT ini hanya membalas pesan anda dengan kata kunci:\n\n" .
            "*/jadwalsaya* = untuk mengetahui jadwal mengajar guru\n" .
            "*/akunsaya* = untuk mengetahui akun login guru\n" .
            "*/nomorhpguru* = untuk mengetahui nomor hp/wa guru\n\n" .
            "Pesan ini dikirim secara otomatis oleh sistem",
    ];
}

// Send the reply message
sendFonnte($sender, $reply);

/**
 * Function to send message using Fonnte API
 */
function sendFonnte($target, $data)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.fonnte.com/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array(
            'target' => $target,
            'message' => $data['message'],
            'url' => $data['url'],
            'filename' => $data['filename'],
        ),
        CURLOPT_HTTPHEADER => array(
            "Authorization: jFT1fNY+#xWhZiN443zm"
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}

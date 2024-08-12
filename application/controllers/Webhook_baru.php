<?php

header('Content-Type: application/json; charset=utf-8');

$json = file_get_contents('php://input');
$data = json_decode($json, true);

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
//end

$servername = "localhost";
$database = "id21923448_jadwalku";
$username = "id21923448_root";
$password = "Erwinngg2018#";

// $conn = new mysqli($servername, $username, $password, $database);
$koneksi = mysqli_connect($servername, $username, $password, $database);

// pesan = 'akunsaya'
$sql1 = "SELECT * FROM guru WHERE telp_wa='$sender'";
$row1 = mysqli_fetch_assoc($koneksi->query($sql1));
$telp_wa1 = $row1['telp_wa'];
$nama1 = $row1['nama'];
$alamat_email1 = $row1['alamat_email'];
$password1 = md5($row1['password']);


// select telp/wa
$telp_waku1 = '6282194460105';

$hasil  = mysqli_query($koneksi, "SELECT * FROM penjadwalan INNER JOIN guru ON guru.id_guru = penjadwalan.id_guru WHERE guru.telp_wa='$telp_waku1'") or die(mysqli_error($koneksi));

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
            "Authorization: uZJGJXEvvqf@7_SrQkMW"
        ),
    ));
    $response = curl_exec($curl);

    curl_close($curl);

    return $response;
}

if ($message == "#jadwalsaya") {
    $reply = [
        "message" => "Jadwal anda di hari Jadwal anda adalah .....

Pesan ini dikirim secara otomatis oleh sistem",
    ];
} elseif ($message == "#akunsaya") {
    if ($telp_wa1 == $sender) {
        $reply = [
            "message" => "*Hai " . $nama1 . "*

Akun Login untuk Sistem Informasi Penjadwalan Mata Pelajaran (SiJadwalTa) adalah

*Username/alamat email* = " . $alamat_email1 . "
*Password* = r#h#si#

Bapak/Ibu dapat mengubah detail akun login di menu Profil. Jika Bapak/Ibu Guru *Lupa Password* silahkan menghubungi admin SiJadwalTa. Terima Kasih

Pesan ini dikirim secara otomatis oleh sistem",
        ];
    } else {
        $reply = [
            "message" => "Maaf tidak ditemukan data terkait

Pesan ini dikirim secara otomatis oleh sistem",
        ];
    }
} elseif ($message == "#nomorhpguru") {
    $reply = [
        "message" => "Nomor HP Guru dapat dilihat pada halaman utama SiJadwalTa pada menu Lainnya >> No. HP/WA Guru

Pesan ini dikirim secara otomatis oleh sistem",
    ];
} else {
    $reply = [
        "message" => "Mohon Maaf, " . $nama1 . "

BOT ini hanya membalas pesan anda dengan kata kunci:

*#jadwalsaya* = untuk mengetahui jadwal mengajar guru
*#akunsaya* = untuk mengetahui akun login guru
*#nomorhpguru* = untuk mengetahui nomor hp/wa guru

Pesan ini dikirim secara otomatis oleh sistem",
    ];
}

sendFonnte($sender, $reply);

/* End of file Webhook.php */
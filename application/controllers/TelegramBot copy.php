<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TelegramBot extends CI_Controller
{

    private $apiToken;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        // Simpan API Token di variabel
        $this->apiToken = "7311224935:AAHZu_0OwHCtcl-kLkAJV3bpHL3noDZFK78";
    }

    public function webhook()
    {
        // Ambil data dari webhook Telegram
        $update = json_decode(file_get_contents('php://input'), TRUE);
        $sender = $update['message']['from']['id'];
        $message = $update['message']['text'];

        // Amankan input
        $sender_safe = $this->db->escape_str($sender);

        // Fetch guru details based on sender's phone number
        $this->db->where('telp_wa', $sender_safe);
        $query = $this->db->get('guru');

        if ($query->num_rows() > 0) {
            $row1 = $query->row();
            $telp_wa1 = $row1->telp_wa;
            $nama1 = $row1->nama;
            $alamat_email1 = $row1->alamat_email;
            // $password1 = md5($row1->password);
        } else {
            $reply = [
                "message" => "Maaf, data guru tidak ditemukan.\nPesan ini dikirim secara otomatis oleh sistem",
            ];
            $this->sendMessage($sender, $reply);
            exit;
        }

        // Handle message based on the received command
        if ($message == "/jadwalsaya") {
            $this->db->select('penjadwalan.*, guru.nama, kelasku.nama_kelas, mapelku.nama_mapel');
            $this->db->from('penjadwalan');
            $this->db->join('guru', 'guru.id_guru = penjadwalan.id_guru');
            $this->db->join('kelasku', 'kelasku.id_kelas = penjadwalan.id_kelas');
            $this->db->join('mapelku', 'mapelku.id_mapel = penjadwalan.id_mapel');
            $this->db->where('guru.telp_wa', $telp_wa1);
            $query2 = $this->db->get();

            if ($query2->num_rows() > 0) {
                $jadwal_list = "";
                $current_day = "";

                foreach ($query2->result() as $row2) {
                    if ($current_day != $row2->hari) {
                        if ($current_day != "") {
                            $jadwal_list .= "============#########===========\n\n";
                        }
                        $current_day = $row2->hari;
                    }

                    $jam_mulai = date('H:i', strtotime($row2->jam_mulai));
                    $jam_selesai = date('H:i', strtotime($row2->jam_selesai));

                    $jadwal_list .= "*Mata Pelajaran*: " . $row2->nama_mapel . "\n";
                    $jadwal_list .= "*Hari*: " . $row2->hari . "\n";
                    $jadwal_list .= "*Kelas*: " . $row2->nama_kelas . "\n";
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
            if ($telp_wa1 == $sender_safe) {
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
                    "*#jadwalsaya* = untuk mengetahui jadwal mengajar guru\n" .
                    "*#akunsaya* = untuk mengetahui akun login guru\n\n" .
                    "Pesan ini dikirim secara otomatis oleh sistem",
            ];
        }

        // Kirim balasan
        $this->sendMessage($sender, $reply);
    }

    private function sendMessage($chat_id, $message)
    {
        $url = "https://api.telegram.org/bot" . $this->apiToken . "/sendMessage";
        $data = [
            'chat_id' => $chat_id,
            'text' => $message['message'],
            'parse_mode' => 'Markdown'
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ],
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return $result;
    }
}

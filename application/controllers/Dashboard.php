<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            // $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        if (
            $this->session->userdata('hak_akses') == '3'
        ) {

            $tgl = date('Y-m-d');
            $tgl_bsk = date("Y-m-d", strtotime("+1 day"));
            $hari = nama_hariku($tgl);
            $bsk = nama_hariku($tgl_bsk);

            $id_guru = $this->session->userdata('id_guru');

            $id_aktif = $this->session->userdata('id_guru');

            $ip    = $this->input->ip_address(); // Mendapatkan IP user
            $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
            $waktu = time(); //
            $timeinsert = date("Y-m-d H:i:s");

            // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
            $s = $this->db->query("SELECT * FROM pengguna_aktif WHERE ip_pengguna='" . $ip . "' AND date='" . $date . "' AND id_aktif='" . $id_aktif . "'")->num_rows();
            $ss = isset($s) ? ($s) : 0;


            // Kalau belum ada, simpan data user tersebut ke database
            if ($ss == 0) {
                $this->db->query("INSERT INTO pengguna_aktif(ip_pengguna, date, hits, online, time, id_aktif) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "', '" . $id_aktif . "')");
            }

            // Jika sudah ada, update
            else {
                $this->db->query("UPDATE pengguna_aktif SET hits=hits+1, online='" . $waktu . "' WHERE ip_pengguna='" . $ip . "' AND date='" . $date . "'");
            }

            $pengunjunghariini  = $this->db->query("SELECT * FROM pengguna_aktif WHERE date='" . $date . "' GROUP BY ip_pengguna")->num_rows(); // Hitung jumlah pengunjung

            $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM pengguna_aktif")->row();

            $totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0; // hitung total pengunjung

            $bataswaktu = time() - 300;

            $pengunjungonline  = $this->db->query("SELECT * FROM pengguna_aktif JOIN guru ON pengguna_aktif.id_aktif=guru.id_guru WHERE online > '" . $bataswaktu . "'")->result(); // hitung pengunjung online
            $pengunjungonlinetot  = $this->db->query("SELECT * FROM pengguna_aktif JOIN guru ON pengguna_aktif.id_aktif=guru.id_guru WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online


            $data['online'] = $pengunjungonline;
            $data['onlinetot'] = $pengunjungonlinetot;

            $data['title'] = "Dashboard : e-Schedule";

            $data['mapelbsk'] = $this->db->query("SELECT * FROM penjadwalan 
            JOIN guru ON penjadwalan.id_guru=guru.id_guru
            JOIN mapelku on penjadwalan.id_mapel=mapelku.id_mapel
            JOIN kelasku on penjadwalan.id_kelas=kelasku.id_kelas
            WHERE penjadwalan.id_guru='$id_guru' AND penjadwalan.hari='$bsk' ")->result();

            $data['today'] = $this->db->query("SELECT * FROM penjadwalan 
            JOIN guru ON penjadwalan.id_guru=guru.id_guru
            JOIN mapelku on penjadwalan.id_mapel=mapelku.id_mapel
            JOIN kelasku on penjadwalan.id_kelas=kelasku.id_kelas
            WHERE penjadwalan.id_guru='$id_guru' AND penjadwalan.hari='$hari' ")->result();

            $this->load->view('layouts/head', $data);
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('admin/dashboard_new', $data);
            $this->load->view('layouts/footer', $data);
        }

        if (
            $this->session->userdata('hak_akses') == '1' ||  $this->session->userdata('hak_akses') == '2'
        ) {

            $bataswaktu = time() - 300;

            $pengunjungonline  = $this->db->query("SELECT * FROM pengguna_aktif JOIN guru ON pengguna_aktif.id_aktif=guru.id_guru WHERE online > '" . $bataswaktu . "'")->result(); // hitung pengunjung online
            $pengunjungonlinetot  = $this->db->query("SELECT * FROM pengguna_aktif JOIN guru ON pengguna_aktif.id_aktif=guru.id_guru WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online

            $data['online'] = $pengunjungonline;
            $data['onlinetot'] = $pengunjungonlinetot;


            $data['title'] = "Dashboard : e-Schedule";

            $this->load->view('layouts/head', $data);
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('admin/dashboard_new', $data);
            $this->load->view('layouts/footer', $data);
        }
    }
}

/* End of file Dashbboard.php */

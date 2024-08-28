<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Jadwal_fix extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_ta');
        $this->load->model('m_guru');
        $this->load->model('m_hari');
        $this->load->model('m_kelas');
        $this->load->model('m_jam');
        $this->load->model('m_mapel');
        $this->load->model('m_rumusan');
        $this->load->model('m_pengampu');
        $this->load->model('m_khusus');
        $this->load->model('m_drag');
        $this->load->model('m_jadwal');
        $this->load->model('m_transfer');
        $this->load->model('m_jadwal_fix');
        $this->load->library('dompdf_gen');
        $this->load->helper('jadwal_helper');
    }


    public function index()
    {
        $data['title'] = "Jadwal Fix : e-Schedule";

        $data['ta'] = $this->m_ta->tampil_ta();

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/jadwal_fix', $data);
        $this->load->view('layouts/footer', $data);
    }


    public function tampil_jadwal_by_ta($id_ta)
    {
        // Load model untuk mendapatkan data
        // $this->load->model('JadwalModel');
        // $data['rumusan'] = $this->JadwalModel->getRumusan($id_ta);
        // $data['penjadwalan'] = $this->JadwalModel->getPenjadwalan($id_ta);
        // $data['kelas'] = $this->JadwalModel->getKelas($id_ta);
        // $data['mapel'] = $this->JadwalModel->getMapel();

        $data['rumusan'] = $this->m_rumusan->getDataRumusan();
        $data['penjadwalan'] = $this->m_jadwal_fix->getAllDataPenjadwalanTa($id_ta);
        $data['jadwal'] = $this->m_jadwal->getAllData();
        $data['kelas'] = $this->m_kelas->getAllData();
        $data['mapel'] = $this->m_mapel->getAllData();
        $data['rangeJam'] = $this->m_jam->getAllData();

        // $data['tahun_ajaran'] = $tahun_akademik;

        // Load view dan convert ke string
        $html = $this->load->view('print/pdf_jadwal_fix', $data, true);

        // Inisialisasi DOMPDF
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Simpan PDF ke file sementara
        $output = $dompdf->output();
        $file_path = 'public/uploads/jadwal_' . $id_ta . '.pdf';
        file_put_contents($file_path, $output);

        // Load view untuk menampilkan PDF
        $data['pdf_path'] = base_url($file_path);

        $data['title'] = "Jadwal Final Dokumen : e-Schedule";

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/jadwal_fix_share_ta', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Jadwal_fix.php */

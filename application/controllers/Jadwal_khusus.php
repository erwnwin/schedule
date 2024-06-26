<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_khusus extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            // $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
        $this->load->model('m_kelas');
        $this->load->model('m_jadwal');
        $this->load->model('m_khusus');
        $this->load->library("pagination");
    }


    public function index()
    {

        $data = [
            'title' => "Jadwal Khusus : e-Schedule",
            'jadwal_khusus' => $this->m_khusus->getAllData(),
            'dataKelas' => $this->m_kelas->getAllData(),
            'jadwal' => $this->m_jadwal->getAllData(),
            // 'kelas' => $this->m_kelas->tampil_kelas(),
        ];

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar', $data);
        $this->load->view('template/admin/header', $data);
        $this->load->view('admin/jadwal_khusus', $data);
        $this->load->view('template/admin/footer', $data);
    }


    public function act_add()
    {
        $this->m_khusus->tambah_data();
        $this->session->set_flashdata('sukses', 'Berhasil ditambahkan');
        redirect(base_url('jadwal-khusus'));
    }
}

/* End of file Jadwal_khusus.php */

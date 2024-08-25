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

        // // Menghitung total rows
        // $jumlah = $this->m_khusus->countAllData();

        // // Konfigurasi Pagination
        // $config = array();
        // $config['base_url'] = base_url('jadwal-khusus'); // Ganti 'jadwal-khusus' dengan nama route Anda
        // $config['total_rows'] = $jumlah;
        // $config['per_page'] = 10; // Jumlah data per halaman
        // $config['uri_segment'] = 2; // Segment URL yang berisi nomor halaman

        // // CSS dan HTML untuk pagination
        // $config['full_tag_open'] = '<ul class="pagination pagination-sm m-0">';
        // $config['full_tag_close'] = '</ul>';
        // $config['num_tag_open'] = '<li class="page-item">';
        // $config['num_tag_close'] = '</li>';
        // $config['next_tag_open'] = '<li class="page-item">';
        // $config['next_tag_close'] = '</li>';
        // $config['prev_tag_open'] = '<li class="page-item">';
        // $config['prev_tag_close'] = '</li>';
        // $config['first_tag_open'] = '<li class="page-item">';
        // $config['first_tag_close'] = '</li>';
        // $config['last_tag_open'] = '<li class="page-item">';
        // $config['last_tag_close'] = '</li>';
        // $config['cur_tag_open'] = '<li class="page-item active">';
        // $config['cur_tag_close'] = '</li>';
        // $config['next_link'] = '&raquo;';
        // $config['prev_link'] = '&laquo;';
        // $config['first_link'] = 'First';
        // $config['last_link'] = 'Last';
        // $config['num_links'] = 2;

        // $this->pagination->initialize($config);

        // // Ambil data berdasarkan halaman
        // $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        // $offset = $page;
        // $limit = $config['per_page'];

        // $data = array(
        //     'title' => "Jadwal Khusus : e-Schedule",
        //     'jadwal_khusus' => $this->m_khusus->getAllData($limit, $offset),
        //     'dataKelas' => $this->m_kelas->getAllData(),
        //     'jadwal' => $this->m_jadwal->getAllData(),
        //     // 'pagination_links' => $this->pagination->create_links()
        // );


        $data = [
            'title' => "Jadwal Khusus : SiJadwalTa",
            'jadwal_khusus' => $this->m_khusus->getAllData(),
            'dataKelas' => $this->m_kelas->getAllData(),
            'jadwal' => $this->m_jadwal->getAllData(),
        ];

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/jadwal_khusus_new', $data);
        $this->load->view('layouts/footer', $data);
    }


    public function act_add()
    {
        $this->m_khusus->tambah_data();
        $this->session->set_flashdata('sukses', 'Nice!!<br>Berhasil ditambahkan');
        redirect(base_url('jadwal-khusus'));
    }
}

/* End of file Jadwal_khusus.php */

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
        $this->load->model('m_jam');
        $this->load->library("pagination");
    }


    public function index()
    {
        $jumlah = $this->m_khusus->countAllData();

        // Konfigurasi pagination
        $config = array(
            'base_url' => base_url('jadwal-khusus'),
            'total_rows' => $jumlah,
            'per_page' => 10,
            'uri_segment' => 2, // Posisi nomor halaman dalam URL
            'full_tag_open' => '<ul class="pagination pagination-sm m-0">',
            'full_tag_close' => '</ul>',
            'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>',
            'next_tag_open' => '<li class="page-item">',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li class="page-item">',
            'prev_tag_close' => '</li>',
            'first_tag_open' => '<li class="page-item">',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li class="page-item">',
            'last_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item ">',
            'cur_tag_close' => '</li>',
            'next_link' => '&raquo;',
            'prev_link' => '&laquo;',
            'first_link' => 'First',
            'last_link' => 'Last',
            'num_links' => 1 // Jumlah link halaman yang ditampilkan di sekitar halaman aktif
        );

        // Inisialisasi pagination
        $this->pagination->initialize($config);

        // Mendapatkan nomor halaman saat ini
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        // Ambil data dengan limit dan offset
        $data['jadwal_khusus'] = $this->m_khusus->get_data_jk($config['per_page'], $page);

        // Membuat link pagination
        $data['pagination'] = $this->pagination->create_links();

        $data['dataKelas'] =  $this->m_kelas->getAllData();
        $data['jadwal_khususku'] =  $this->m_khusus->getAllDataNew();
        $data['jadwal'] =  $this->m_jadwal->getAllData();
        $data['range_jam'] = $this->m_jam->getSingleData();

        $data['title'] = "Jadwal Khusus : e-Schedule";

        // $data = [
        //     'title' => "Jadwal Khusus : e-Schedule",
        //     // 'jadwal_khusus' => $this->m_khusus->getAllData(),
        //     'dataKelas' => $this->m_kelas->getAllData(),
        //     'jadwal' => $this->m_jadwal->getAllData(),
        // ];

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


    // Controller
    public function get_kelas_by_hari_and_keterangan()
    {
        $hari = $this->input->get('hari');
        $keterangan = $this->input->get('keterangan');

        if (!$hari || !$keterangan) {
            echo json_encode(['selected_classes' => []]);
            return;
        }

        $kelas = $this->m_khusus->get_kelas_by_hari_and_keterangan($hari, $keterangan);
        echo json_encode(['selected_classes' => $kelas]);
    }
}

/* End of file Jadwal_khusus.php */

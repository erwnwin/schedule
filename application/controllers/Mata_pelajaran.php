<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mata_pelajaran extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            // $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
        $this->load->model('m_mapel');
    }


    public function index()
    {
        $data['title'] = "Mata Pelajaran : e-Schedule";

        $data['mapel'] = $this->m_mapel->mapel();

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar', $data);
        $this->load->view('template/admin/header', $data);
        $this->load->view('admin/mata_pelajaran', $data);
        $this->load->view('template/admin/footer', $data);
    }

    public function validation_form()
    {
        $this->m_mapel->tambah_data();
        $this->session->set_flashdata('sukses', 'Berhasil ditambahkan');
        redirect(base_url('mata-pelajaran'));
    }
}

/* End of file Login.php */

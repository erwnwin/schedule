<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Hari extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            // $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
        $this->load->model('m_hari');
    }


    public function index()
    {
        $data['hari'] = $this->m_hari->tampil_hari();


        $data['title'] = "Setting Hari : e-Schedule";

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar', $data);
        $this->load->view('template/admin/header', $data);
        $this->load->view('admin/hari', $data);
        $this->load->view('template/admin/footer', $data);
    }
}

/* End of file Hari.php */

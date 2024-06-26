<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
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
        $data['title'] = "Jadwal : e-Schedule";

        $this->load->view('template/frontend/head', $data);
        $this->load->view('template/frontend/sidebar', $data);
        $this->load->view('jadwal', $data);
        $this->load->view('template/frontend/footer', $data);
    }
}

/* End of file Login.php */

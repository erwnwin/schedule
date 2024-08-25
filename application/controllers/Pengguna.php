<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Pengguna : e-Schedule";

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/pengguna_new', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Pengguna.php */

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_fix extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Jadwal Fix : e-Schedule";

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/jadwal_fix', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Jadwal_fix.php */

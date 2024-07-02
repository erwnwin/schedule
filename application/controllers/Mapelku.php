<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mapelku extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Mapelku : e-Schedule";

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar', $data);
        $this->load->view('template/admin/header', $data);
        $this->load->view('admin/mapelku', $data);
        $this->load->view('template/admin/footer', $data);
    }
}

/* End of file Mapelku.php */

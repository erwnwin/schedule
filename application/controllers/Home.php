<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Home : e-Schedule";

        $this->load->view('template/frontend/head', $data);
        $this->load->view('template/frontend/sidebar', $data);
        $this->load->view('home', $data);
        $this->load->view('template/frontend/footer', $data);
    }
}

/* End of file Login.php */

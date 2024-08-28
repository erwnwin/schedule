<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Set_notifikasi extends CI_Controller
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
        $data['title'] = "Set Notifikasi : e-Schedule";
        $data['notif'] = $this->db->query("SELECT * FROM pengaturan_notifikasi ")->result();

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/set_notif', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Set_notifikasi.php */

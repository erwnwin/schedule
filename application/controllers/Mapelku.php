<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mapelku extends CI_Controller
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
        $data['title'] = "Mapelku : e-Schedule";
        $id_guru = $this->session->userdata('id_guru');

        $data['mapelku'] = $this->db->query("SELECT * FROM guru_pengampu 
        JOIN guru ON guru_pengampu.id_guru=guru.id_guru
        JOIN mapelku on guru_pengampu.id_mapel=mapelku.id_mapel
        JOIN kelasku on guru_pengampu.id_kelas=kelasku.id_kelas
        WHERE guru_pengampu.id_guru='$id_guru' ")->result();


        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar', $data);
        $this->load->view('template/admin/header', $data);
        $this->load->view('admin/mapelku', $data);
        $this->load->view('template/admin/footer', $data);
    }
}

/* End of file Mapelku.php */

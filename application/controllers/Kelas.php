<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            // $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
        $this->load->model('m_kelas');
    }


    public function index()
    {
        $data['title'] = "Kelas : e-Schedule";

        $data['kelas'] = $this->m_kelas->tampil_kelas();
        // $data['ruang'] = $this->m_kelas->ruang();

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/kelas_new', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function add_act()
    {
        $kelas = $this->input->post('kelas');
        $urutan_kelas = $this->input->post('urutan_kelas');
        // $id_ruang = $this->input->post('id_ruang');

        $data = array(
            'id_kelas' => 'Kelas' . $kelas . $urutan_kelas,
            'kelas' => $kelas,
            'urutan_kelas' => $urutan_kelas,
            // 'id_ruang' => $id_ruang,
        );

        $sql = $this->db->query("SELECT id_kelas FROM kelasku where id_kelas='Kelas$kelas$urutan_kelas'");
        $cek = $sql->num_rows();
        if ($cek > 0) {
            $this->session->set_flashdata('valid', 'Opps!!<br>Gagal ditambahkan. Kelas ' . $kelas . $urutan_kelas . ' sudah ada');
            redirect(base_url('kelas'));
        } else {

            $this->db->insert('kelasku', $data);
            $this->session->set_flashdata('sukses', 'Nice!!<br>Berhasil ditambahkan');
            redirect(base_url('kelas'));
        }
    }
}

/* End of file Kelas.php */

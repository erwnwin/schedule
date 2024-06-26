<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            // $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
        $this->load->model('m_ruangan');
    }

    public function index()
    {
        $data['title'] = "Ruangan : e-Schedule";

        $data['ruang'] = $this->m_ruangan->tampil_ruangan();

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar', $data);
        $this->load->view('template/admin/header', $data);
        $this->load->view('admin/ruangan', $data);
        $this->load->view('template/admin/footer', $data);
    }

    public function add_act()
    {
        $nama_ruangan = $this->input->post('nama_ruangan');
        $jenis = $this->input->post('jenis');

        $data = array(
            'nama_ruangan' => $nama_ruangan,
            'jenis' => $jenis,
        );

        $this->db->insert('ruang', $data);
        $this->session->set_flashdata('sukses', 'Berhasil ditambahkan');
        redirect(base_url('ruangan'));
    }

    public function hapus_act($id)
    {
        $this->m_ruangan->hapus($id);
        $this->session->set_flashdata('gagal', 'Berhasil dihapus');
        redirect(base_url('ruangan'));
    }
}

/* End of file Login.php */

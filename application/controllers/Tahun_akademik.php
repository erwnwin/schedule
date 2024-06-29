<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_akademik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_ta');

        if ($this->session->userdata('masuk') != TRUE) {
            // $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
    }


    public function index()
    {
        $data['title'] = "Tahun Akademik : e-Schedule";

        $data['ta'] = $this->m_ta->tampil_ta();

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar', $data);
        $this->load->view('template/admin/header', $data);
        $this->load->view('admin/tahun_akademik', $data);
        $this->load->view('template/admin/footer', $data);
    }


    public function add_act()
    {
        $tahun_akademik = $this->input->post('tahun_akademik');
        $status = $this->input->post('status');
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $tipe_semester = $this->input->post('tipe_semester');

        $data = array(
            'tahun_akademik' => $tahun_akademik,
            'status' => $status,
            'tgl_mulai' => $tgl_mulai,
            'tgl_akhir' => $tgl_akhir,
            'tipe_semester' => $tipe_semester,
        );

        $this->db->insert('tahun_akademik', $data);
        $this->session->set_flashdata('sukses', 'Tahun Akademik berhasil ditambahkan');
        redirect(base_url('tahun-akademik'));
    }

    public function act_aktif($id_ta)
    {

        $id_ta = $this->input->post('id_ta');
        $status = 'Aktif';

        $data = array(
            'id_ta' => $id_ta,
            'status' => 'Aktif',
        );

        $where = array(
            'id_ta' => $id_ta,
        );

        $sql = $this->db->query("SELECT status FROM tahun_akademik where status='$status'");
        $cek = $sql->num_rows();
        if ($cek > 0) {
            $this->session->set_flashdata('gagal', 'Silahkan menonaktifkan tahun akademik yang lampau!');
            redirect(base_url('tahun-akademik'));
        } else {
            $this->db->update('tahun_akademik', $data, $where);
            $this->session->set_flashdata('sukses', 'Data tahun akademik berhasil diaktifkan!');
        }
    }
}

/* End of file Tahun_akademik.php */

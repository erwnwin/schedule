<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jam extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            // $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
        $this->load->model('m_jam');
        $this->load->model('m_hari');
        $this->load->model('m_kelas');
        $this->load->model('m_mapel');
        $this->load->model('m_jadwal');
    }


    public function index()
    {
        $data['title'] = "Setting Jam : e-Schedule";

        $data['range_jam'] = $this->m_jam->getAllData();


        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar', $data);
        $this->load->view('template/admin/header', $data);
        $this->load->view('admin/jam', $data);
        $this->load->view('template/admin/footer', $data);
    }


    public function edit_act()
    {
        $id = $this->input->post('id');
        $range_jam = $this->input->post('range_jam');
        $waktu_shalat = $this->input->post('waktu_shalat');

        $data = array(
            'id' => $id,
            'range_jam' => $range_jam,
            'waktu_shalat' => $waktu_shalat,

        );

        $where = array(
            'id' => $id,
        );

        $this->db->update('jam', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Update</h4>
        Data jam berhasil terupdate!
        </div>');
        redirect(base_url('jam'));
    }

    public function validation_form()
    {
        $this->m_jadwal->update_act2();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses</h4>
        Data jam berhasil diset!
        </div>');
        redirect(base_url('jam'));
    }

    public function act_add()
    {
        $this->m_jam->tambah_data();
        $this->session->set_flashdata('sukses', 'Berhasil ditambahkan');
        redirect(base_url('jam'));
    }
}

/* End of file Jam.php */

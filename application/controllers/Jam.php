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

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/jam_new', $data);
        $this->load->view('layouts/footer', $data);
    }


    public function edit_act()
    {
        $id_jadwal = $this->input->post('id_jadwal');
        $jumlah_sesi = $this->input->post('jumlah_sesi');
        $lama_sesi = $this->input->post('lama_sesi');
        $jam_mulai = $this->input->post('jam_mulai');

        // Ambil data yang ada di database
        $this->db->where('id_jadwal', $id_jadwal);
        $existing_data = $this->db->get('jadwal')->row_array();

        // Cek apakah data yang akan diupdate sama dengan data yang ada
        if (
            $existing_data['jumlah_sesi'] == $jumlah_sesi &&
            $existing_data['lama_sesi'] == $lama_sesi &&
            $existing_data['jam_mulai'] == $jam_mulai
        ) {

            $this->session->set_flashdata('info', 'Info!!<br>Tidak ada data yang diperbarui!');
            redirect(base_url('jam')); // Redirect setelah menampilkan pesan
            return; // Hentikan eksekusi lebih lanjut
        } else {
            // Update data jika ada perubahan
            $data = array(
                'jumlah_sesi' => $jumlah_sesi,
                'lama_sesi' => $lama_sesi,
                'jam_mulai' => $jam_mulai
            );

            $where = array(
                'id_jadwal' => $id_jadwal,
            );

            $this->db->update('jadwal', $data, $where);
            $this->session->set_flashdata('sukses', 'Good!!<br>Berhasil diupdate');
            redirect(base_url('jam')); // Redirect setelah update data
        }
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

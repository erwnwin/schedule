<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mata_pelajaran extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            // $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
        $this->load->model('m_mapel');
    }


    public function index()
    {
        $data['title'] = "Mata Pelajaran : e-Schedule";

        $data['mapel'] = $this->m_mapel->mapel();

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar', $data);
        $this->load->view('template/admin/header', $data);
        $this->load->view('admin/mata_pelajaran', $data);
        $this->load->view('template/admin/footer', $data);
    }

    public function validation_form()
    {
        $this->m_mapel->tambah_data();
        $this->session->set_flashdata('sukses', 'Berhasil ditambahkan');
        redirect(base_url('mata-pelajaran'));
    }

    public function act_edit()
    {
        // Validasi input
        $this->form_validation->set_rules('kode_mapel', 'Kode Mata Pelajaran', 'required');
        $this->form_validation->set_rules('nama_mapel', 'Nama Mata Pelajaran', 'required');
        $this->form_validation->set_rules('kelompok_mapel', 'Semester', 'required');
        $this->form_validation->set_rules('beban_jam', 'Beban Jam', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, redirect kembali ke halaman edit dengan pesan error
            $this->session->set_flashdata('error', validation_errors());
            redirect('mata-pelajaran');
        } else {
            // Ambil data dari form
            $id_mapel = $this->input->post('id_mapel');
            $kode_mapel = $this->input->post('kode_mapel');
            $nama_mapel = $this->input->post('nama_mapel');
            $kelompok_mapel = $this->input->post('kelompok_mapel');
            $beban_jam = $this->input->post('beban_jam');
            $chkKelas = $this->input->post('chkKelas') ? implode(',', $this->input->post('chkKelas')) : '';

            // Siapkan data untuk update
            $data = array(
                'kode_mapel' => $kode_mapel,
                'nama_mapel' => $nama_mapel,
                'kelompok_mapel' => $kelompok_mapel,
                'beban_jam' => $beban_jam,
                'id_kelas' => $chkKelas
            );

            // Panggil model untuk update data
            if ($this->m_mapel->update_mapel($id_mapel, $data)) {
                $this->session->set_flashdata('sukses', 'Data mata pelajaran berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat memperbarui data.');
            }

            // Redirect ke halaman mata pelajaran
            redirect(base_url('mata-pelajaran'));
        }
    }
}

/* End of file Login.php */

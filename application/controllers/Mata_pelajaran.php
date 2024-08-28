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
        $this->load->library('pagination');
    }


    public function index()
    {


        // Ambil data untuk halaman saat ini
        // $data['mapel'] = $this->m_mapel->mapel();

        $jumlah = $this->m_mapel->count_mapel();

        // Konfigurasi pagination
        $config = array(
            'base_url' => base_url('mata-pelajaran'),
            'total_rows' => $jumlah,
            'per_page' => 13,
            'uri_segment' => 2, // Posisi nomor halaman dalam URL
            'full_tag_open' => '<ul class="pagination pagination-sm m-0">',
            'full_tag_close' => '</ul>',
            'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>',
            'next_tag_open' => '<li class="page-item">',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li class="page-item">',
            'prev_tag_close' => '</li>',
            'first_tag_open' => '<li class="page-item">',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li class="page-item">',
            'last_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item ">',
            'cur_tag_close' => '</li>',
            'next_link' => '&raquo;',
            'prev_link' => '&laquo;',
            'first_link' => 'First',
            'last_link' => 'Last',
            'num_links' => 2 // Jumlah link halaman yang ditampilkan di sekitar halaman aktif
        );

        // Inisialisasi pagination
        $this->pagination->initialize($config);

        // Mendapatkan nomor halaman saat ini
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        // Ambil data dengan limit dan offset
        $data['mapel'] = $this->m_mapel->get_mapel($config['per_page'], $page);

        // Membuat link pagination
        $data['pagination'] = $this->pagination->create_links();
        $data['all_classes'] = $this->m_mapel->get_all_classes();
        $data['title'] = "Mata Pelajaran : e-Schedule";

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/mata_pelajaran_new', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function validation_form()
    {
        $this->m_mapel->tambah_data();
        $this->session->set_flashdata('sukses', 'Berhasil ditambahkan');
        redirect(base_url('mata-pelajaran'));
    }


    public function act_edit()
    {
        $kode_mapel = $this->input->post('kode_mapel');
        $nama_mapel = $this->input->post('nama_mapel');
        $beban_jam = $this->input->post('beban_jam');
        $kelompok_mapel = 'A';
        $kelas_ids = $this->input->post('chkKelas');

        // Update mata pelajaran
        $data_mapel = [
            'kode_mapel' => $kode_mapel,
            'nama_mapel' => $nama_mapel,
            'kelompok_mapel' => $kelompok_mapel,
            'beban_jam' => $beban_jam
        ];

        // Update data mapel (kode_mapel sebagai identifier utama)
        $this->m_mapel->update_mapelku($kode_mapel, $data_mapel);

        // Sync kelas yang terkait
        $this->m_mapel->sync_classes($kode_mapel, $nama_mapel, $kelompok_mapel, $beban_jam, $kelas_ids);
        $this->session->set_flashdata('sukses', 'Nice!!<br>Data Mapel Berhasil diupdate');
        redirect(base_url('mata-pelajaran'));
    }


    public function delete_mapel($kode_mapel)
    {
        // Cek apakah kode_mapel digunakan oleh guru pengampu
        $this->db->select('kode_mapel');
        $this->db->from('guru_pengampu');
        $this->db->where('kode_mapel', $kode_mapel);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // Jika ada data di tabel guru_pengampu yang berelasi dengan id_kelas
            $this->session->set_flashdata('error', 'Oppss!! Gagal Hapus.<br> Data tidak dapat dihapus karena mapel telah ada guru pengampunya. Silahkan lakukan edit saja.');
            redirect(base_url('mata-pelajaran'));
        } else {
            // Hapus data dari tabel mapelku dan tabel terkait lainnya
            $this->db->where('kode_mapel', $kode_mapel);
            $this->db->delete('mapelku');
            $this->session->set_flashdata('sukses', 'Nice!!<br>Data Mapel Berhasil dihapus. Silahkan input data baru');
            redirect(base_url('mata-pelajaran'));
        }
    }



    // public function act_edit()
    // {
    //     // Validasi input
    //     $this->form_validation->set_rules('kode_mapel', 'Kode Mata Pelajaran', 'required');
    //     $this->form_validation->set_rules('nama_mapel', 'Nama Mata Pelajaran', 'required');
    //     $this->form_validation->set_rules('kelompok_mapel', 'Semester', 'required');
    //     $this->form_validation->set_rules('beban_jam', 'Beban Jam', 'required|numeric');

    //     if ($this->form_validation->run() === FALSE) {
    //         // Jika validasi gagal, redirect kembali ke halaman edit dengan pesan error
    //         $this->session->set_flashdata('error', validation_errors());
    //         redirect('mata-pelajaran');
    //     } else {
    //         // Ambil data dari form
    //         $id_mapel = $this->input->post('id_mapel');
    //         $kode_mapel = $this->input->post('kode_mapel');
    //         $nama_mapel = $this->input->post('nama_mapel');
    //         $kelompok_mapel = $this->input->post('kelompok_mapel');
    //         $beban_jam = $this->input->post('beban_jam');
    //         $chkKelas = $this->input->post('chkKelas') ? implode(',', $this->input->post('chkKelas')) : '';

    //         // Siapkan data untuk update
    //         $data = array(
    //             'kode_mapel' => $kode_mapel,
    //             'nama_mapel' => $nama_mapel,
    //             'kelompok_mapel' => $kelompok_mapel,
    //             'beban_jam' => $beban_jam,
    //             'id_kelas' => $chkKelas
    //         );

    //         // Panggil model untuk update data
    //         if ($this->m_mapel->update_mapel($id_mapel, $data)) {
    //             $this->session->set_flashdata('sukses', 'Nice!!<br>Data mata pelajaran berhasil diperbarui.');
    //         } else {
    //             $this->session->set_flashdata('error', 'Opps!!<br>Terjadi kesalahan saat memperbarui data.');
    //         }

    //         // Redirect ke halaman mata pelajaran
    //         redirect(base_url('mata-pelajaran'));
    //     }
    // }


    // public function act_edit()
    // {
    //     // Validasi input
    //     $this->form_validation->set_rules('kode_mapel', 'Kode Mata Pelajaran', 'required');
    //     $this->form_validation->set_rules('nama_mapel', 'Nama Mata Pelajaran', 'required');
    //     // $this->form_validation->set_rules('kelompok_mapel', 'Semester', 'required');
    //     $this->form_validation->set_rules('beban_jam', 'Beban Jam', 'required|numeric');

    //     if ($this->form_validation->run() === FALSE) {
    //         // Jika validasi gagal, redirect kembali ke halaman edit dengan pesan error
    //         $this->session->set_flashdata('error', validation_errors());
    //         redirect('mata-pelajaran');
    //     } else {
    //         // Ambil data dari form
    //         $id_mapel = $this->input->post('id_mapel');
    //         $kode_mapel = $this->input->post('kode_mapel');
    //         $nama_mapel = $this->input->post('nama_mapel');
    //         // $kelompok_mapel = $this->input->post('kelompok_mapel');
    //         $beban_jam = $this->input->post('beban_jam');
    //         $chkKelas = $this->input->post('chkKelas') ? implode(',', $this->input->post('chkKelas')) : '';

    //         // Ambil data record lama
    //         $old_record = $this->m_mapel->get_mapel_by_id($id_mapel);

    //         // Siapkan data untuk update
    //         $data = array(
    //             'kode_mapel' => $kode_mapel,
    //             'nama_mapel' => $nama_mapel,
    //             // 'kelompok_mapel' => $kelompok_mapel,
    //             'beban_jam' => $beban_jam,
    //             'id_kelas' => $chkKelas
    //         );

    //         // Update berdasarkan kode_mapel
    //         if ($old_record->kode_mapel != $kode_mapel) {
    //             $this->m_mapel->update_mapel_by_code($old_record->kode_mapel, $data);
    //         }

    //         // Update berdasarkan nama_mapel
    //         if ($old_record->nama_mapel != $nama_mapel) {
    //             $this->m_mapel->update_mapel_by_name($old_record->nama_mapel, $data);
    //         }

    //         if ($old_record->beban_jam != $beban_jam) {
    //             $this->m_mapel->update_mapel_by_jam($old_record->beban_jam, $data);
    //         }

    //         // Update record utama
    //         if ($this->m_mapel->update_mapel($id_mapel, $data)) {
    //             $this->session->set_flashdata('sukses', 'Nice!!<br>Data mata pelajaran berhasil diperbarui.');
    //         } else {
    //             $this->session->set_flashdata('error', 'Opps!!<br>Terjadi kesalahan saat memperbarui data.');
    //         }

    //         // Redirect ke halaman mata pelajaran
    //         redirect(base_url('mata-pelajaran'));
    //     }
    // }




    public function get_filter()
    {
        // Mengambil data unik dari mata pelajaran
        $mapel = $this->db->distinct()->select('kode_mapel, nama_mapel, beban_jam')->get('mapelku')->result_array();

        // Mengambil data unik dari kelas
        $kelas = $this->db->distinct()->select('id_kelas, kelas, urutan_kelas')->get('kelasku')->result_array();

        echo json_encode([
            'mapel' => $mapel,
            'kelas' => $kelas
        ]);
    }



    public function filter_data()
    {
        $kode_mapel = $this->input->post('kode_mapel');
        $id_kelas = $this->input->post('id_kelas');

        // Query dasar
        $this->db->select('*');
        $this->db->from('mapelku');

        // Menambahkan filter jika ada
        if (!empty($kode_mapel)) {
            $this->db->where('kode_mapel', $kode_mapel);
        }
        if (!empty($id_kelas)) {
            $this->db->where('id_kelas', $id_kelas);
        }

        // Mengambil data
        $mapel = $this->db->get()->result_array();

        echo json_encode([
            'mapel' => $mapel
        ]);
    }
}

/* End of file Login.php */

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

        // Ambil data semua opsi kelas dan urutan
        $data['all_kelas'] = ['X', 'XI', 'XII'];
        $data['all_urutan'] = range(1, 10);

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


    public function update()
    {
        $id_kelas = $this->input->post('id_kelas');
        $kelas = $this->input->post('kelas');
        $urutan_kelas = $this->input->post('urutan_kelas');

        // Ambil data lama
        $old_data = $this->db->get_where('kelasku', ['id_kelas' => $id_kelas])->row();

        // Cek jika tidak ada perubahan
        if ($old_data->kelas == $kelas && $old_data->urutan_kelas == $urutan_kelas) {
            $this->session->set_flashdata('info', 'Info!!<br>Tidak ada data yang diperbarui.');
            redirect(base_url('kelas'));
            return;
        }

        // Cek jika kelas dan urutan_kelas sudah digunakan
        $this->db->where('kelas', $kelas);
        $this->db->where('urutan_kelas', $urutan_kelas);
        $this->db->where('id_kelas !=', $id_kelas); // Jangan cek data yang sama
        $exists = $this->db->count_all_results('kelasku');

        if ($exists > 0) {
            $this->session->set_flashdata('error', 'Opps!!<br>Tidak dapat diupdate karena data telah digunakan pada kelas lain.');
            redirect(base_url('kelas'));
            return;
        }

        // Update data jika valid
        $data = array(
            'kelas' => $kelas,
            'urutan_kelas' => $urutan_kelas
        );

        $this->db->where('id_kelas', $id_kelas);
        $this->db->update('kelasku', $data);

        // Set flash data untuk sukses
        $this->session->set_flashdata('sukses', 'Nice!!<br>Berhasil diupdate');
        redirect(base_url('kelas')); // Redirect setelah update
    }


    public function delete_kelas($id_kelas)
    {
        // Cek apakah id_kelas digunakan oleh guru pengampu
        $this->db->select('id_kelas, kode_mapel');
        $this->db->from('guru_pengampu');
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // Jika ada data di tabel guru_pengampu yang berelasi dengan id_kelas
            $this->session->set_flashdata('error', 'Oppss!!<br>Data tidak dapat dihapus karena kelas telah ada mapel dan guru pengampunya. Silahkan lakukan edit saja.');
            redirect(base_url('kelas'));
        } else {
            // Hapus data dari tabel mapelku dan tabel terkait lainnya
            $this->db->where('id_kelas', $id_kelas);
            $this->db->delete('kelasku');

            // Hapus data dari tabel terkait lainnya jika ada
            // $this->db->where('kode_mapel', $kode_mapel);
            // $this->db->delete('kelasku'); // Misalnya, jika ada tabel kelas terkait

            $this->session->set_flashdata('sukses', 'Nice!!<br>Berhasil dihapus. Silahkan input data baru');
            redirect(base_url('kelas')); // Redirect setelah update
        }
    }

    // public function update()
    // {
    //     $id_kelas = $this->input->post('id_kelas');
    //     $kelas = $this->input->post('kelas');
    //     $urutan_kelas = $this->input->post('urutan_kelas');

    //     $data = array(
    //         'kelas' => $kelas,
    //         'urutan_kelas' => $urutan_kelas
    //     );


    //     $this->db->where('id_kelas', $id_kelas);
    //     $this->db->update('kelasku', $data);
    //     $this->session->set_flashdata('sukses', 'Nice!!<br>Berhasil diupdate');
    //     redirect(base_url('kelas')); // Redirect setelah update
    // }
}

/* End of file Kelas.php */

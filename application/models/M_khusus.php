<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_khusus extends CI_Model
{

    // pagination
    function get_mahasiswa_list($limit, $start)
    {
        $this->db->select('id_jadwal_khusus, kelas, hari, keterangan, sesi, durasi');
        $this->db->from('jadwal_khusus');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
    }


    public function getAllDataNew()
    {
        $this->db->select('id_jadwal_khusus, kelas, hari, keterangan, sesi, durasi');
        $this->db->from('jadwal_khusus');
        return $this->db->get()->result_array();
    }


    public function getAllData()
    {
        $this->db->select('id_jadwal_khusus, kelas, hari, keterangan, sesi, durasi');
        $this->db->from('jadwal_khusus');
        return $this->db->get()->result_array();
    }

    public function get_data_jk($limit, $start)
    {
        $this->db->select('keterangan, GROUP_CONCAT(DISTINCT kelas) as kelas, hari, sesi, durasi');
        $this->db->from('jadwal_khusus');
        $this->db->group_by('keterangan, hari, sesi, durasi');
        $this->db->order_by('sesi', 'ACS');
        $this->db->order_by("FIELD(hari, 'Minggu', 'Sabtu', 'Jum`at', 'Kamis', 'Rabu', 'Selasa', 'Senin') DESC");

        $this->db->limit($limit, $start); // Menambahkan limit dan offset
        return $this->db->get()->result_array();
    }



    // public function getAllData($limit, $offset)
    // {
    //     $this->db->select('id_jadwal_khusus, kelas, hari, keterangan, sesi, durasi');
    //     $this->db->from('jadwal_khusus');

    //     // Jika ada limit dan offset, tambahkan ke query
    //     if ($limit !== null) {
    //         $this->db->limit($limit, $offset);
    //     }

    //     return $this->db->get()->result_array();
    // }


    public function countAllData()
    {
        $this->db->from('jadwal_khusus');
        return $this->db->count_all_results();
    }

    public function get_projects($limit, $start)
    {
        // $this->db->limit($limit, $start);
        // $query = $this->db->get('jadwal_khusus');
        // return $query->result_array();
        // return $query->result();
        // $this->db->select('id_jadwal_khusus, kelas, hari, keterangan, sesi, durasi');
        // $this->db->from('jadwal_khusus');
        $query = $this->db->get('jadwal_khusus', $limit, $start);
        return $query->result_array();
        // return $this->db->get()->result_array();
    }

    public function get_count_all()
    {
        // return $this->db->count_all('jadwal_khusus');
        $query = $this->db->get('jadwal_khusus');
        return $query->num_rows();
    }


    public function tambah_data()
    {
        $hari = $this->input->post('hari');
        $kelas = $this->input->post('kelas');
        foreach ($hari as $h) {
            foreach ($kelas as $k) {
                $data = array(
                    'hari' => $h,
                    'kelas' => $k,
                    'keterangan' => $this->input->post('keterangan'),
                    'sesi' => $this->input->post('sesi'),
                    'durasi' => $this->input->post('durasi')
                );
                $this->db->insert('jadwal_khusus', $data);
            }
        }
    }


    public function getJadwalKhusus_hari($kelas, $hari)
    {
        return $this->db->query("SELECT * FROM `jadwal_khusus` WHERE hari = '" . $hari . "' AND kelas LIKE '%" . $kelas . "' GROUP by sesi ")->result();
    }

    public function get_kelas_by_hari_and_keterangan($hari, $keterangan)
    {
        if (!$hari || !$keterangan) {
            return [];
        }

        $this->db->select('kelas');
        $this->db->where('hari', $hari);
        $this->db->where('keterangan', $keterangan);
        $query = $this->db->get('jadwal_khusus');

        $result = $query->result_array();
        $selected_classes = [];

        foreach ($result as $row) {
            if (isset($row['kelas'])) {
                $selected_classes[] = $row['kelas'];
            }
        }
        return $selected_classes;
    }





    // function get_mahasiswa_all($limit, $offset)
    // {
    //     $this->db->select('tb_mahasiswa.nim, tb_mahasiswa.nama, tb_mahasiswa.tanggal_lahir,
    //         tb_mahasiswa.jenis_kelamin, tb_mahasiswa.alamat, tb_mahasiswa.propinsi,
    //         tb_mahasiswa.telepon, tb_mahasiswa.email, tb_mahasiswa.photo,
    //         tb_mahasiswa.prodi,
    //         tb_prodi.namaprodi');
    //     $this->db->from('tb_mahasiswa');
    //     $this->db->join('tb_prodi', 'tb_mahasiswa.prodi=tb_prodi.kode');
    //     //$query = $this->db->get();
    //     $this->db->order_by('nim', 'ASC');
    //     //$query = $this->db->get('tb_mahasiswa','tb_prodi',$limit, $offset);
    //     $query = $this->db->get($limit, $offset);
    //     return $query->result();
    // }
}

/* End of file M_khusus.php */

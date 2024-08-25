<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_mapel extends CI_Model
{

    public function getAllData($grup = false)
    {

        $this->db->select('id_mapel, kode_mapel, nama_mapel, mapelku.kelas, beban_jam, kelompok_mapel');
        $this->db->from('mapelku');
        $this->db->join('kelasku', 'kelasku.id_kelas = mapelku.id_kelas');
        if ($grup) {
            $this->db->group_by('kode_mapel');
        }
        // $this->db->order_by('kode_mapel', 'ASC');
        return $this->db->get()->result();
    }



    public function mapel()
    {
        $this->db->select('*');
        $this->db->from('mapelku');
        $this->db->join('kelasku', 'mapelku.id_kelas = kelasku.id_kelas', 'left');
        return $this->db->get()->result();
    }


    // Model function to get paginated data
    public function get_mapel($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('mapelku');
        $this->db->join('kelasku', 'mapelku.id_kelas = kelasku.id_kelas', 'left');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    public function count_mapel()
    {
        $this->db->from('mapelku');
        return $this->db->count_all_results();
        // $query = $this->db->get('mapelku');
        // return $query->num_rows();
    }


    public function tambah_data()
    {
        foreach ($this->input->post('chkKelas') as $valueKls) {
            $data = [
                'kode_mapel' => $this->input->post('kode_mapel'),
                'nama_mapel' => $this->input->post('nama_mapel'),
                'kelompok_mapel' => $this->input->post('kelompok_mapel'),
                'id_kelas' => $valueKls,
                'beban_jam' => $this->input->post('beban_jam')
            ];
            if ($this->checkExist($this->input->post('kode_mapel'), $this->input->post('kelompok_mapel'), $valueKls, $this->input->post('beban_jam'))) {
                $this->db->insert('mapelku', $data);
            }
        }
    }

    public function checkExist($kode_mapel, $kelompok_mapel, $id_kelas, $beban_jam)
    {
        $data = [
            'kode_mapel' => $kode_mapel,
            'kelompok_mapel' => $kelompok_mapel,
            'id_kelas' => $id_kelas,
            'beban_jam' => $beban_jam
        ];
        $query = $this->db->get_where('mapelku', $data)->num_rows();
        if ($query > 0) {
            return false;
        }
        return true;
    }

    public function mapelKosong()
    {
        return $this->db->query("SELECT mapelku.kode_mapel, mapelku.nama_mapel, sum(case when guru_pengampu.id_tugas IS NULL then 1 else 0 end) AS jumlah_kosong FROM `mapelku` INNER join kelasku on (mapelku.id_kelas = kelasku.id_kelas) LEFT JOIN guru_pengampu on (kelasku.id_kelas = guru_pengampu.id_kelas && mapelku.id_mapel = guru_pengampu.id_mapel) GROUP by kode_mapel ORDER BY mapelku.kode_mapel ASC
		")->result();
    }

    public function getMapelbyKodeMapel($kodeMapel)
    {
        return $this->db->get_where('mapelku', ['kode_mapel' => $kodeMapel])->row('nama_mapel');
    }

    public function update_mapel($id_mapel, $data)
    {
        // Update data di tabel mata_pelajaran berdasarkan id_mapel
        $this->db->where('id_mapel', $id_mapel);
        return $this->db->update('mapelku', $data);
    }


    // Ambil data mapel berdasarkan ID
    public function get_mapel_by_id($id_mapel)
    {
        $this->db->from('mapelku');
        $this->db->where('id_mapel', $id_mapel);
        return $this->db->get()->row();
    }

    // Update semua record berdasarkan kode_mapel lama
    public function update_mapel_by_code($kode_mapel_lama, $data)
    {
        $this->db->where('kode_mapel', $kode_mapel_lama);
        return $this->db->update('mapelku', $data);
    }

    // Update semua record berdasarkan nama_mapel lama
    public function update_mapel_by_name($nama_mapel_lama, $data)
    {
        $this->db->where('nama_mapel', $nama_mapel_lama);
        return $this->db->update('mapelku', $data);
    }

    public function update_mapel_by_jam($beban_jam_lama, $data)
    {
        $this->db->where('beban_jam', $beban_jam_lama);
        return $this->db->update('mapelku', $data);
    }


    // Update record berdasarkan ID
    // public function update_mapel($id_mapel, $data)
    // {
    //     $this->db->where('id_mapel', $id_mapel);
    //     return $this->db->update('nama_tabel_mapel', $data);
    // }
}

/* End of file M_mapel.php */

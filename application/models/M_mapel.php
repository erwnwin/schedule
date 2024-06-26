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
}

/* End of file M_mapel.php */

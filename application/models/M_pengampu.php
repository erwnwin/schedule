<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

defined('BASEPATH') or exit('No direct script access allowed');

class M_pengampu extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('guru_pengampu')->result();
    }

    public function dataKelasByKodeMapel($kode_mapel)
    {
        return $this->db->query("SELECT mapelku.*, kelasku.*, guru_pengampu.id_tugas, guru_pengampu.id_guru  FROM `mapelku` INNER join kelasku on (mapelku.id_kelas = kelasku.id_kelas)  LEFT JOIN guru_pengampu on (kelasku.id_kelas = guru_pengampu.id_kelas && mapelku.id_mapel = guru_pengampu.id_mapel) WHERE mapelku.kode_mapel = '" . $kode_mapel . "'   ORDER BY `kelasku`.`kelas` ASC, `kelasku`.`urutan_kelas` ASC")->result();
    }

    public function hapus_data($id)
    {
        $this->db->delete('guru_pengampu', ['id_tugas' => $id]);
    }

    public function tugasGuruBelumterplot($id_kelas = null)
    {
        if ($id_kelas === null) {
            return $this->db->query("SELECT guru_pengampu.*, mapelku.beban_jam, mapelku.nama_mapel , guru.nama, request_jadwal.hari from guru_pengampu join guru on guru_pengampu.id_guru = guru.id_guru left join mapelku on guru_pengampu.id_mapel = mapelku.id_mapel LEFT JOIN request_jadwal ON guru_pengampu.id_guru = request_jadwal.id_guru where guru_pengampu.status = 0")->result();
        }
        return $this->db->query("SELECT guru_pengampu.*, mapelku.beban_jam, mapelku.nama_mapel, guru.nama from guru_pengampu join guru on guru_pengampu.id_guru = guru.id_guru left join mapelku on guru_pengampu.id_mapel = mapelku.id_mapel LEFT JOIN request_jadwal ON guru_pengampu.id_guru = request_jadwal.id_guru where guru_pengampu.id_kelas= '" . $id_kelas . "' AND guru_pengampu.status = 0 GROUP by id_tugas")->result();
    }


    public function tambah_data()
    {
        // $jumlah = $this->input->post('jml_data');
        echo $jumlah = count($this->input->post('guru'));
        $id_kelas = $this->input->post('id_kelas');
        $id_mapel = $this->input->post('id_mapel');
        $kode_mapel = $this->input->post('kode_mapel');
        $beban_jam = $this->input->post('beban_jam');
        $id_guru = $this->input->post('guru');
        print_r($id_guru);
        echo '<br>';
        for ($i = 0; $i < $jumlah; $i++) {
            if ($id_guru[$i] != 'Pilih Guru') {
                $data = array(
                    'id_tugas' => $id_guru[$i] . '-' . $id_mapel[$i] . '-' . $id_kelas[$i],
                    'id_guru' => $id_guru[$i],
                    'id_mapel' => $id_mapel[$i],
                    'kode_mapel' => $kode_mapel,
                    'id_kelas' => $id_kelas[$i],
                    'sisa_jam' => $beban_jam[$i],
                    'beban_jam' => $beban_jam[$i]
                );
                print_r($data);
                echo '<br>';
                $this->db->insert('guru_pengampu', $data);
            }
        }
    }

    public function getDatatugasByidGuru($id_guru, $id_kelas)
    {
        $this->db->select('*, guru.warna_guru');
        $this->db->from('guru_pengampu');
        $this->db->join('mapelku', 'guru_pengampu.id_mapel = mapelku.id_mapel');
        $this->db->join('guru', 'guru.id_guru = guru_pengampu.id_guru');
        $this->db->where('guru_pengampu.id_guru', $id_guru);
        $this->db->where('guru_pengampu.id_kelas', $id_kelas);
        $this->db->where('guru_pengampu.sisa_jam !=', '0');
        return $this->db->get()->result();
    }
}

/* End of file M_pengampu.php */

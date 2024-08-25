<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_drag extends CI_Model
{

    public function pindahJadwal_1_2($dataFirst, $dataSecond)
    {
        // Mengatur id_guru dan id_mapel menjadi null jika 0
        if ($dataSecond['id_guru'] == 0) {
            $dataSecond['id_guru'] = null;
        }
        if ($dataSecond['id_mapel'] == 0) {
            $dataSecond['id_mapel'] = null;
        }

        $data1 = [
            'id_guru' => $dataSecond['id_guru'],
            'id_mapel' => $dataSecond['id_mapel'],
            'kode_jadwal' => $dataSecond['kode_jadwal'],
            'keterangan' => $dataSecond['keterangan']
        ];

        // Update jadwal dengan data dari jadwal kedua
        $this->db->update('penjadwalan', $data1, ['id_penjadwalan' => $dataFirst['id_penjadwalan']]);
    }

    public function pindahJadwal_2_1($dataFirst, $dataSecond)
    {
        // Mengatur id_guru dan id_mapel menjadi null jika 0
        if ($dataFirst['id_guru'] == 0) {
            $dataFirst['id_guru'] = null;
        }
        if ($dataFirst['id_mapel'] == 0) {
            $dataFirst['id_mapel'] = null;
        }

        $data2 = [
            'id_guru' => $dataFirst['id_guru'],
            'id_mapel' => $dataFirst['id_mapel'],
            'kode_jadwal' => $dataFirst['kode_jadwal'],
            'keterangan' => $dataFirst['keterangan']
        ];

        // Update jadwal dengan data dari jadwal pertama
        $this->db->update('penjadwalan', $data2, ['id_penjadwalan' => $dataSecond['id_penjadwalan']]);
    }


    public function pindahJadwal($dataFirst, $dataSecond)
    {
        // Mengatur id_guru dan id_mapel menjadi null jika 0
        if ($dataFirst['id_guru'] == 0) {
            $dataFirst['id_guru'] = null;
        }
        if ($dataFirst['id_mapel'] == 0) {
            $dataFirst['id_mapel'] = null;
        }

        $data2 = [
            'id_guru' => $dataFirst['id_guru'],
            'id_mapel' => $dataFirst['id_mapel'],
            'kode_jadwal' => $dataFirst['id_tugas'], // Pastikan bahwa 'id_tugas' sesuai dengan field yang digunakan
            'keterangan' => $dataFirst['nama_mapel'] // Pastikan bahwa 'nama_mapel' sesuai dengan field yang digunakan
        ];

        // Update jadwal dengan data baru
        $this->db->update('penjadwalan', $data2, ['id_penjadwalan' => $dataSecond['id_penjadwalan']]);
    }


    // public function checkingJadwalTabrakan($hari, $sesi, $id_guru)
    // {
    //     // Implementasikan logika untuk memeriksa tabrakan jadwal
    //     // Contoh query:
    //     $this->db->where('hari', $hari);
    //     $this->db->where('sesi', $sesi);
    //     $this->db->where('id_guru', $id_guru);
    //     $query = $this->db->get('jadwal');
    //     return $query->result();
    // }

    public function checkingJadwalTabrakan($hari = null, $sesi, $idGuru)
    {
        return $this->db->query("SELECT * FROM penjadwalan where hari='$hari' && sesi='$sesi' && id_guru  = '$idGuru'")->result();
    }


    public function updateSisaJam($id_tugas, $jumlah, $status)
    {
        if ($status == '-') {
            $this->db->query("UPDATE guru_pengampu SET sisa_jam = sisa_jam-$jumlah WHERE id_tugas='" . $id_tugas . "'");
        } else {
            $this->db->query("UPDATE guru_pengampu SET sisa_jam = sisa_jam+$jumlah WHERE id_tugas='" . $id_tugas . "'");
        }
        $dataTugasGuru = $this->db->get_where("guru_pengampu", ['id_tugas' => $id_tugas])->row();
        if ($dataTugasGuru->sisa_jam == 0) {
            $this->updateStatusPenugasan($id_tugas, 1);
        } else {
            $this->updateStatusPenugasan($id_tugas, 0);
        }
    }

    public function updateStatusPenugasan($id_tugas, $status)
    {
        $this->db->query("UPDATE guru_pengampu SET status = '$status' WHERE id_tugas='" . $id_tugas . "'");
    }

    public function checkExist($id_ta, $id_hari)
    {
        $data = [
            'id_hari' => $id_hari,
            'id_ta' => $id_ta
        ];
        $query = $this->db->get_where('jadwal_plan', $data)->num_rows();
        if ($query > 0) {
            return false;
        }
        return true;
    }

    public function detail_data($id)
    {
        $this->db->join('mapelku', 'guru_pengampu.id_mapel = mapel.id_mapel');
        return $this->db->get_where('guru_pengampu', ['id_tugas' => $id])->row_array();
    }
}

/* End of file M_drag.php */

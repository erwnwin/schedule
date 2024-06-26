<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_guru extends CI_Model
{




    public function tampil_guru()
    {
        return $this->db->get('guru')->result();
    }

    // function tampil_guru($limit, $start)
    // {
    //     $query = $this->db->get('guru', $limit, $start);
    //     return $query;
    // }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->order_by('id_guru', 'ASC');
        return $this->db->get();
    }


    // public function hapus($id)
    // {
    //     $this->db->where('id_guru', $id);
    //     return $this->db->delete('guru');
    // }

    public function hapus($id)
    {
        $this->db->delete('guru', ['id_guru' => $id]);
    }

    public function getDataPagination($limit, $offset)
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->order_by('id', 'ASC');
        $this->db->limit($limit, $offset);

        return $this->db->get();
    }

    // public function hapus($id)
    // {
    //     $this->db->where('id_guru', $id);
    //     return $this->db->delete('guru');
    // }

    public function getDataGuruJoinRequest()
    {
        return $this->db->query("SELECT guru.id_guru, guru.nama, request_jadwal.id_request, request_jadwal.hari FROM guru left join request_jadwal on guru.id_guru = request_jadwal.id_guru")->result();
    }



    public function getDataGuruJoinKelas($id_guru)
    {
        $query = $this->db->query("SELECT id_kelas from guru_pengampu where id_guru ='$id_guru' GROUP BY id_kelas")->result();
        $data = [];
        foreach ($query as $value) {
            $data[] = $value->id_kelas;
        }
        return $data;
    }

    /* 
		* beban kerja guru berdasarkan id_guru
		*/
    public function getDataBebanKerja($id_guru)
    {
        $query =  $this->db->query("SELECT SUM(sisa_jam) as beban FROM `guru_pengampu` where id_guru ='$id_guru'")->row()->beban;
        return ($query) ? $query : 0;
    }

    /* 
		* total ketersediaan pada hari
		*/
    public function ketersediaanJam($kelas, $hari)
    {
        $query = "SELECT COUNT(id_penjadwalan) as total FROM `penjadwalan` where keterangan = 'kosong' AND (";
        if (empty($kelas)) {
            return 0;
        } else {
            foreach ($kelas as $key => $dataKelas) {
                if ($key == 0) {
                    $query .= "id_kelas = '$dataKelas'";
                } else {
                    $query .= " OR id_kelas = '$dataKelas'";
                }
            }
            $query .= ") AND (";
            foreach ($hari as $key => $dataHari) {
                if ($key == 0) {
                    $query .= "hari = '$dataHari'";
                } else {
                    $query .= " OR hari = '$dataHari'";
                }
            }
            $query .= ")";
            return $this->db->query($query)->row()->total;
        }
    }

    public function detail_data($id)
    {
        return $this->db->get_where('guru', ['id_guru' => $id])->row_array();
    }
}

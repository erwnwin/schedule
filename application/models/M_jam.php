<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_jam extends CI_Model
{

    public function getAllData()
    {
        $this->db->select('id_jadwal, hari, jumlah_sesi, lama_sesi, jam_mulai');
        $this->db->from('jadwal');
        return $this->db->get()->result();
    }

    public function tampil_jam()
    {
        $this->db->select('*');
        $this->db->from('jam');
        $query = $this->db->get();
        return $query->result();
    }

    public function tampil_jam2()
    {
        $this->db->select('DISTINCT(nama_hari)');
        $this->db->group_by('nama_hari');
        $this->db->order_by('id_set_jam', 'asc');
        $query = $this->db->get('set_jam');
        return $query->result();
    }

    public function tampil_kelas()
    {
        $this->db->select('*');
        $this->db->from('set_jam');
        $query = $this->db->get();
        return $query->result();
    }


    public function jam()
    {
        // $query = $this->db->select('range_jam')
        //     ->distinct('range_jam')
        //     ->from('set_jam')
        //     ->get();
        // return $query->result();

        $this->db->select('DISTINCT(set_jam.range_jam), id_kelas, id_jam');
        $this->db->join('jam', 'set_jam.id_jam = jam.id', 'left');
        $this->db->group_by('set_jam.range_jam');
        $query = $this->db->get('set_jam');
        return $query->result();
    }

    public function jurusan()
    {
        return $this->db->get('jurusan')->result();
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
        $this->db->order_by('id', 'ASC');

        return $this->db->get();
    }

    public function getDataPagination($limit, $offset)
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->order_by('id', 'ASC');
        $this->db->limit($limit, $offset);

        return $this->db->get();
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('guru');
    }

    // public function tambah_data()
    // {
    //     foreach ($this->input->post('chkKelas') as $valueKls) {
    //         foreach ($this->input->post('chkHari') as $valueHari) {
    //             $data = [
    //                 'range_jam' => $this->input->post('range_jam'),
    //                 'nama_hari' => $valueHari,
    //                 'id_kelas' => $valueKls,

    //             ];
    //             if ($this->checkExist($this->input->post('range_jam'), $valueKls, $valueHari)) {
    //                 $this->db->insert('set_jam', $data);
    //             }
    //         }
    //     }
    // }

    public function tambah_data()
    {
        $hari = $this->input->post('chkJadwalHari');
        foreach ($hari as $value) {
            $data = array(
                'id_jadwal' => $this->input->post('id_jadwal'),
                'hari' => $value,
                'jumlah_sesi' => $this->input->post('sesi'),
                'lama_sesi' => $this->input->post('durasi'),
                'jam_mulai' => $this->input->post('waktuMulai')
            );
            $this->db->insert('jadwal', $data);
        }
    }

    public function checkExist($range_jam, $id_kelas, $nama_hari)
    {
        $data = [
            'range_jam' => $range_jam,
            'nama_hari' => $nama_hari,
            'id_kelas' => $id_kelas
        ];
        $query = $this->db->get_where('set_jam', $data)->num_rows();
        if ($query > 0) {
            return false;
        }
        return true;
    }
}

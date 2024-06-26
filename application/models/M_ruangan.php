<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_ruangan extends CI_Model
{
    public function tampil_ruangan()
    {
        $this->db->select('*');
        $this->db->from('ruang');
        $this->db->order_by('ruang.id', 'ASC');

        $query = $this->db->get();
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
        return $this->db->delete('ruang');
    }
}

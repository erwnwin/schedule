<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_ta extends CI_Model
{
    public function tampil_ta()
    {
        return $this->db->get('tahun_akademik')->result();
    }

    public function aktif()
    {
        $this->db->select('*');
        $this->db->from('tahun_akademik');
        $this->db->where('status', 'Aktif');
        return $this->db->get()->result();
    }
}

/* End of file M_ta.php */

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_hari extends CI_Model
{
    public function tampil_hari()
    {
        $this->db->select('*');
        $this->db->from('hari');
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file M_hari.php */

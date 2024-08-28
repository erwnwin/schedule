<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_jadwal_fix extends CI_Model
{

    public function getAllDataPenjadwalanTa($id_ta)
    {
        $this->db->select('penjadwalan_fix_share.*, guru.warna_guru, guru.nama, request_jadwal.hari as request');
        $this->db->join('guru', 'guru.id_guru = penjadwalan_fix_share.id_guru', 'left');
        $this->db->join('tahun_akademik', 'tahun_akademik.id_ta = penjadwalan_fix_share.id_ta', 'left');
        $this->db->join('request_jadwal', 'guru.id_guru = request_jadwal.id_guru', 'left');
        $this->db->where('penjadwalan_fix_share.id_ta', $id_ta); // Filter berdasarkan id_ta
        return $this->db->get('penjadwalan_fix_share')->result();
    }
}

/* End of file M_jadwal_fix.php */

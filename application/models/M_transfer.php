<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_transfer extends CI_Model
{
    public function transfer_data($id_ta)
    {
        // Ambil semua data dari penjadwalan
        $this->db->select('*');
        $query = $this->db->get('penjadwalan');
        $data = $query->result_array();

        // Siapkan data untuk dimasukkan
        foreach ($data as &$row) {
            // $row['tahun_ajaran'] = $tahun_ajaran;
            $row['id_ta'] = $id_ta;
        }

        // Cek apakah data yang akan dimasukkan berbeda dengan data yang sudah ada
        // $this->db->where('tahun_ajaran', $tahun_ajaran);
        $this->db->where('id_ta', $id_ta);
        $existing_data = $this->db->get('penjadwalan_fix_share')->result_array();

        // Jika data sudah ada dan tidak ada perubahan, kembalikan false
        if ($existing_data == $data) {
            return false;
        }

        // Hapus data yang ada di penjadwalan_fix_share dengan tahun_ajaran dan id_ta yang sama
        // $this->db->where('tahun_ajaran', $tahun_ajaran);
        $this->db->where('id_ta', $id_ta);
        $this->db->delete('penjadwalan_fix_share');

        // Masukkan data ke dalam penjadwalan_fix_share
        if (!empty($data)) {
            $this->db->insert_batch('penjadwalan_fix_share', $data);
        }

        return true;
    }
}

/* End of file M_transfer.php */

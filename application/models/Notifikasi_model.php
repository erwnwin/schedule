<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi_model extends CI_Model
{
    public function get_pengaturan_notifikasi($waktu_sekarang)
    {
        $this->db->where('waktu', $waktu_sekarang);
        $this->db->where('aktif', 1);
        $query = $this->db->get('pengaturan_notifikasi');
        return $query->result_array();
    }

    // Mengambil nomor WA guru berdasarkan hari
    public function get_guru_untuk_hari($hari)
    {
        $this->db->select('guru.telp_wa, guru.nama, penjadwalan_fix_share.hari, penjadwalan_fix_share.sesi, penjadwalan_fix_share.jam_mulai, penjadwalan_fix_share.jam_selesai, mapelku.kode_mapel, mapelku.nama_mapel, kelasku.kelas, kelasku.urutan_kelas');
        $this->db->from('penjadwalan_fix_share');
        $this->db->join('mapelku', 'penjadwalan_fix_share.id_mapel = mapelku.id_mapel');
        $this->db->join('guru', 'penjadwalan_fix_share.id_guru = guru.id_guru');
        $this->db->join('kelasku', 'penjadwalan_fix_share.id_kelas = kelasku.id_kelas');
        $this->db->where('penjadwalan_fix_share.hari', $hari);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Simpan pengaturan notifikasi
    public function set_pengaturan($waktu, $aktif, $jenis_notifikasi)
    {
        $data = array(
            'waktu' => $waktu,
            'aktif' => $aktif,
            'jenis_notifikasi' => $jenis_notifikasi
        );

        // Menggunakan replace untuk mengupdate atau menyisipkan data
        $this->db->replace('pengaturan_notifikasi', $data);
    }


    public function hapus_pengaturan_yang_lewat()
    {
        // Mendapatkan waktu saat ini dalam format H:i
        $waktu_sekarang = date('H:i');

        // Menghitung batas waktu penghapusan, yaitu satu menit setelah waktu sekarang
        $batas_waktu = date('H:i', strtotime($waktu_sekarang . ' -2 minute'));

        // Hapus entri yang waktu-nya sudah melewati batas waktu
        // Hanya hapus entri dengan waktu yang sudah lewat dibandingkan batas waktu
        $this->db->where('waktu <', $batas_waktu);
        $this->db->delete('pengaturan_notifikasi');
    }


    public function update_status_pengaturan($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update('pengaturan_notifikasi', array('aktif' => $status));
    }
}

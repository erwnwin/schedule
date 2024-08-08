<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('filter_jadwal')) {
    function filter_jadwal($penjadwalan, $hari, $kelas, $jamMulai)
    {
        $data = [];
        foreach ($penjadwalan as $value) {
            if ($value->hari == $hari && $value->jam_mulai == $jamMulai && $value->id_kelas == $kelas) {
                $data[] = $value;
            }
        }
        return $data;
    }
}

if (!function_exists('getkodeMapel')) {
    function getkodeMapel($mapel, $idMapel)
    {
        $key = array_search($idMapel, array_column($mapel, 'id_mapel'));
        return $mapel[$key]->kode_mapel ?? 'Kode tidak ditemukan';
    }
}

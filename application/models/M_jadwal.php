<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_jadwal extends CI_Model
{


    function all()
    {
        $this->db->select('*');
        $this->db->from('jadwal_plan');
        $this->db->order_by('id_jadwal', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function getDataPenjadwalan($idKelas, $hari, $id_guru)
    {
        $this->db->select('penjadwalan.*');
        $this->db->from('penjadwalan');
        $this->db->where('id_kelas', $idKelas);
        $this->db->where('keterangan', 'kosong');
        $this->db->where('kode_jadwal', '-');
        $this->db->where('hari', $hari);
        $jadwal =  $this->db->get()->result();
        $jadwalGuru = $this->getDataPenjadwalanguru($hari, $id_guru);
        if ($id_guru && !empty($jadwalGuru)) {
            $key = [];
            foreach ($jadwalGuru as $value) {
                $ketemu = array_search($value->sesi, array_column($jadwal, 'sesi'));
                if (is_int($ketemu)) {
                    $key[] = $ketemu;
                }
            }
            foreach ($key as $value) {
                unset($jadwal[$value]);
            }
        }
        return $jadwal;
    }


    public function getDataPenjadwalanguru($hari, $id_guru)
    {
        $this->db->select('penjadwalan.*');
        $this->db->from('penjadwalan');
        // $this->db->where('id_kelas', $idKelas);
        // $this->db->where('keterangan', 'kosong');
        // $this->db->where('kode_jadwal', '-');
        $this->db->where('id_guru', $id_guru);
        $this->db->where('hari', $hari);
        return $this->db->get()->result();
    }

    public function getJadwalGuru_Kelas_Hari($kelas, $hari, $guru)
    {
        $this->db->where('id_kelas', $kelas);
        $this->db->where('hari', $hari);
        $this->db->where('id_guru', $guru);
        $this->db->where('keterangan', 'kosong');
        $this->db->where('kode_jadwal', '-');
        return $this->db->get('penjadwalan')->result();
    }

    public function getAllData()
    {
        return $this->db->get('jadwal')->result();
    }


    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function tambah_data()
    {
        foreach ($this->input->post('id_hari') as $valueHari) {
            $data = [
                'id_hari' => $valueHari,
                'id_ta' => $this->input->post('id_ta')
            ];

            if ($this->checkExist($this->input->post('id_ta'), $valueHari)) {
                $this->db->insert('jadwal_plan', $data);
            }
        }
    }


    public function isiJadwal($kelas, $hari, $sesi, $id_guru, $id_mapel, $keterangan, $kode_jadwal)
    {
        if (is_array($sesi)) {
            foreach ($sesi as $value) {
                $data = [
                    'id_guru' => $id_guru,
                    'id_mapel' => $id_mapel,
                    'kode_jadwal' => $kode_jadwal,
                    'keterangan' => $keterangan
                ];

                $this->db->where('sesi', $value);
                $this->db->where('id_kelas', $kelas);
                $this->db->where('hari', $hari);
                $this->db->update('penjadwalan', $data);
            }
            $this->updateSisaJam($kode_jadwal, count($sesi), '-');
        } else {
            echo '<br>{sesi error }<br>';
        }
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


    public function act_plan()
    {
        foreach ($this->input->post('chkJam') as $valueJam) {
            foreach ($this->input->post('chkKelas') as $valueKls) {
                $data = [
                    'id_ta' => $this->input->post('id_ta'),
                    'id_hari' => $this->input->post('id_hari'),
                    'id_mapel' => $this->input->post('id_mapel'),
                    'id_kelas' => $valueKls,
                    'id_jam' => $valueJam

                ];
                // if ($this->checkExist2($this->input->post('id_hari'), $this->input->post('id_mapel'), $valueKls, $valueJam)) {
                $this->db->insert('set_jadwal', $data);
                // }
            }
        }
    }

    public function checkExist2($id_hari, $id_mapel, $id_kelas, $id_jam)
    {
        $data = [
            'id_hari' => $id_hari,
            'id_mapel' => $id_mapel,
            'id_kelas' => $id_kelas,
            'id_jam' => $id_jam
        ];
        $query = $this->db->get_where('set_jadwal', $data)->num_rows();
        if ($query > 0) {
            return false;
        }
        return true;
    }


    public function kode_input()
    {
        $this->db->select('RIGHT(set_jadwal.kode_input,5) as kode_input', FALSE);
        $this->db->order_by('kode_input', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('set_jadwal');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_input) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "JWLMP" . $batas;
        return $kodetampil;
    }


    public function getAllDataPenjadwalan()
    {
        $this->db->select('penjadwalan.*, guru.warna_guru, guru.nama, request_jadwal.hari as request');
        $this->db->join('guru', 'guru.id_guru = penjadwalan.id_guru', 'left');
        $this->db->join('request_jadwal', 'guru.id_guru = request_jadwal.id_guru', 'left');
        return $this->db->get('penjadwalan')->result();
    }


    public function insertData($hari, $kelas, $sesi, $kodeJadwal, $keterangan, $jam_mulai, $jam_selesai)
    {
        $data = array(
            'id_kelas' => $kelas,
            'hari' => $hari,
            'sesi' => $sesi,
            'kode_jadwal' => $kodeJadwal,
            'keterangan' => $keterangan,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai
        );
        $this->db->insert('penjadwalan', $data);
    }

    public function checkingJadwalExist($hari = null, $sesi, $idGuru)
    {
        if ($this->db->query('SELECT * FROM penjadwalan where hari="' . $hari . '" && sesi="' . $sesi . '" && kode_jadwal LIKE %' . $idGuru . '%')->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkingJadwalGuru($idGuru)
    {
        if ($this->db->query('SELECT * FROM penjadwalan where kode_jadwal LIKE %' . $idGuru . '%')->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkingJadwalTabrakan($hari = null, $sesi, $idGuru)
    {
        return $this->db->query("SELECT * FROM penjadwalan where hari='$hari' && sesi='$sesi' && id_guru  = '$idGuru'")->result();
    }


    // public function resetPenjadwalan()
    // {
    //     $this->db->query('UPDATE penjadwalan 
    //     SET 
    //         id_guru = NULL, 
    //         id_mapel = NULL, 
    //         kode_jadwal = "-", 
    //         keterangan = "kosong" 
    //     WHERE 
    //         id_guru IS NOT NULL AND id_guru != "" 
    //         AND id_mapel IS NOT NULL AND id_mapel != ""
    //     ');
    //     $this->db->query('UPDATE guru_pengampu SET status = "0" WHERE status="1"');
    //     $this->db->query('UPDATE guru_pengampu SET sisa_jam = beban_jam');
    // }

    public function resetPenjadwalan()
    {
        $this->db->query(
            'UPDATE penjadwalan 
        SET 
            id_guru = NULL, 
            id_mapel = NULL, 
            kode_jadwal = "-", 
            keterangan = "kosong" 
        WHERE 
            id_guru IS NOT NULL 
            AND id_mapel IS NOT NULL'
        );

        $this->db->query('UPDATE guru_pengampu SET status = "0" WHERE status="1"');
        $this->db->query('UPDATE guru_pengampu SET sisa_jam = beban_jam');
    }


    public function resetJadwal()
    {
        $this->db->empty_table('penjadwalan');
    }


    public function getJadwalKosong($idKelas, $hari = null)
    {
        $this->db->where('kode_jadwal', '-');
        $this->db->where('keterangan', 'kosong');
        $this->db->where('id_kelas', $idKelas);
        if ($hari != null) {
            $this->db->where('hari', $hari);
        }
        return $this->db->get('penjadwalan')->result();
    }


    // public function tambah_data_jadwal()
    // {
    //     foreach ($this->input->post('id_hari') as $valueHari) {
    //         $data = [
    //             'id_hari' => $valueHari,
    //             'id_ta' => $this->input->post('id_ta')
    //         ];



    //         if ($this->checkExist_jadwal($this->input->post('id_ta'), $valueHari)) {
    //             $this->db->update('jadwal_plan', $data);
    //         }
    //     }
    // }

    // public function checkExist_jadwal($id_ta, $id_hari)
    // {
    //     $data = [
    //         'id_hari' => $id_hari,
    //         'id_ta' => $id_ta
    //     ];
    //     $query = $this->db->get_where('jadwal_plan', $data)->num_rows();
    //     if ($query > 0) {
    //         return false;
    //     }
    //     return true;
    // }

    // public function update_act2()
    // {
    //     foreach ($this->input->post('id_mapel') as $mapel) {
    //         foreach ($this->input->post('id_kelas') as $valueKls) {
    //             foreach ($this->input->post('id_jam') as $valueJam) {
    //                 $data = [
    //                     // 'id_set_jam' => $this->input->post('id_set_jam'),
    //                     'id_jam' => $valueJam,
    //                     'id_kelas' => $valueKls,
    //                     'id_mapel' => $mapel,
    //                     'id_hari' => $this->input->post('id_jam'),
    //                     // 'kelas' => $valueKls,
    //                 ];


    //                 if ($this->checkExist2($this->input->post('id_hari'), $mapel, $valueKls, $valueJam)) {
    //                     $this->db->insert('set_jadwal', $data);
    //                 }
    //             }
    //         }
    //     }
    // }

    // public function checkExist2($id_jam, $id_kelas, $id_mapel, $id_hari)
    // {
    //     $data = [
    //         'id_jam' => $id_jam,
    //         'id_mapel' => $id_mapel,
    //         'id_kelas' => $id_kelas,
    //         'id_hari' => $id_hari
    //     ];


    //     $query = $this->db->get_where('set_jadwal', $data)->num_rows();
    //     if ($query > 0) {
    //         return false;
    //     }
    //     return true;
    // }
}

/* End of file M_jadwal.php */

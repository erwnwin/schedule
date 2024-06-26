<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penjadwalan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_ta');
        $this->load->model('m_jadwal');
        $this->load->model('m_guru');
        $this->load->model('m_hari');
        $this->load->model('m_kelas');
        $this->load->model('m_jam');
        $this->load->model('m_mapel');
        $this->load->model('m_rumusan');
        $this->load->model('m_pengampu');
        $this->load->model('m_khusus');
        if ($this->session->userdata('masuk') != TRUE) {
            // $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $data = [
            'title' => "Penjadwalan : e-Schedule",
            'ta' => $this->m_ta->tampil_ta(),
            'rumusan' => $this->m_rumusan->getDataRumusan(),
            'belumterplot' => $this->m_pengampu->tugasGuruBelumterplot(),
            'kelas' => $this->m_kelas->getAllData(),
            'penjadwalan' => $this->m_jadwal->getAllDataPenjadwalan(),
            'jadwal' => $this->m_jadwal->getAllData(),
            'kelas' => $this->m_kelas->getAllData(),
            'mapel' => $this->m_mapel->getAllData(),
            'rangeJam' => $this->m_jam->getAllData()
        ];

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar', $data);
        $this->load->view('template/admin/header', $data);
        $this->load->view('admin/penjadwalan', $data);
        $this->load->view('template/admin/footer', $data);
    }

    public function create()
    {
        $data['title'] = "Create Penjadwalan : SiJadwalTa";

        $data['ta'] = $this->m_ta->tampil_ta();
        $data['hari'] = $this->m_hari->tampil_hari();

        $data['kelas'] = $this->m_kelas->tampil_kelas();
        $data['ruang'] = $this->m_kelas->ruang();
        $data['jam'] = $this->m_jam->tampil_jam();

        $data['mapel'] = $this->m_mapel->mapel();

        $where = array('id_ta' => $this->input->post('id_ta'));

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/create_penjadwalan', $data);
        $this->load->view('template/footer', $data);
    }


    public function validation_form()
    {
        $id_ta = $this->input->post('id_ta');

        $sql = $this->db->query("SELECT id_ta FROM jadwal_plan where id_ta='$id_ta'");
        $cek = $sql->num_rows();
        if ($cek > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Gagal</h4>
            Data jadwal mata pelajaran gagal dibuat. Mohon untuk melengkapi Jadwal yang ada!
            </div>');
            redirect(base_url('penjadwalan'));
        } else {
            $this->m_jadwal->tambah_data();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Sukses</h4>
            Data jadwal mata pelajaran berhasil dibuat. Mohon untuk dilengkapi!
            </div>');
            redirect(base_url('penjadwalan'));
        }
    }

    public function add_act()
    {
        $id_ta = $this->input->post('id_ta');

        $sql = $this->db->query("SELECT id_ta FROM jadwal_plan where id_ta='$id_ta'");
        $cek = $sql->num_rows();
        if ($cek > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Gagal</h4>
            Data jadwal mata pelajaran gagal dibuat. Mohon untuk melengkapi Jadwal yang ada!
            </div>');
            redirect(base_url('penjadwalan'));
        } else {
            $this->m_jadwal->tambah_data();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Sukses</h4>
            Data jadwal mata pelajaran berhasil dibuat. Mohon untuk dilengkapi!
            </div>');
            redirect(base_url('penjadwalan'));
        }
    }

    // search jadwal Khusus 
    public function searchJadwalKhusus($array, $sesi, $hari, $kelas)
    {
        foreach ($array as $value) {
            if ($value['kelas'] == $kelas && $value['hari'] == $hari  && $value['sesi'] == $sesi) {
                return ['id_jadwal' => $value['id_jadwal_khusus'], 'keterangan' => $value['keterangan'], 'durasi' => $value['durasi']];
            }
        }
        return false;
    }

    //create jadwal
    public function create_jadwal()
    {
        $jadwal = $this->m_jadwal->getAllData();
        $kelas = $this->m_kelas->getAllData();
        $jadwalKhusus = $this->m_khusus->getAllData();
        // $tahunAKademik = $this->m_ta->aktif();

        echo '<table>';
        foreach ($kelas as $rowKelas) {
            $kosong = 0;
            echo '<tr>';
            echo '<td>';
            echo "jadwal kelas" . $rowKelas->kelas . $rowKelas->urutan_kelas . "<br>";
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td colspan = "6">';
            echo 'Mapel : ';
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            foreach ($jadwal as $rowJadwal) {
                echo '<td>';
                echo "===================<br>";
                echo $rowJadwal->hari;
                echo "<br>";
                echo "=================== <br>";
                $jam_mulai = strtotime($rowJadwal->jam_mulai);
                for ($i = 0; $i < $rowJadwal->jumlah_sesi; $i++) {
                    if (is_array($khusus = $this->searchJadwalKhusus($jadwalKhusus, $i, $rowJadwal->hari, $rowKelas->kelas))) {
                        $idJadwal = $khusus['id_jadwal'];
                        $keterangan = $khusus['keterangan'];
                        $lama_sesi = $khusus['durasi'];
                    } else {
                        $idJadwal = '-';
                        $keterangan = "kosong";
                        $lama_sesi = $rowJadwal->lama_sesi;
                        $kosong++;
                    }
                    $jam_selesai = date("H:i", strtotime('+' . $lama_sesi . ' minutes', $jam_mulai));
                    $this->m_jadwal->insertData($rowJadwal->hari, $rowKelas->id_kelas, $i, $idJadwal, $keterangan, date("H:i", $jam_mulai), $jam_selesai);
                    echo $i . " " . $idJadwal . " " . $keterangan . " " . date("H:i", $jam_mulai) . "-" . $jam_selesai . "<br>";
                    $jam_mulai = strtotime($jam_selesai);
                }
                echo '</td>';
            }
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            echo 'jumlah jadwal kosong : ' . $kosong;
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        redirect(base_url('penjadwalan'));
    }

    public function rumusan()
    {
        $result = $this->m_guru->getDataGuruJoinRequest();

        foreach ($result as $key => $value) {
            if (!$value->id_request) {
                // tambah data bila ada guru yang tidak request
                $value->hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
                $status = 0;
                $result[$key]->status_request = $status;
            } else {
                // convert data string to array
                $value->hari = explode(",", $value->hari);
                $status = 1;
                $result[$key]->status_request = $status;
            }
            // menambahkan kelas yang diajar
            $result[$key]->kelas = $this->m_guru->getDataGuruJoinKelas($value->id_guru);
            $kelas = $result[$key]->kelas;
            // menambahkan beban kerja guru
            $result[$key]->beban_kerja = $this->m_guru->getDataBebanKerja($value->id_guru);
            // menambahkan total jam tersedia
            $result[$key]->jam_tersedia = $this->m_guru->ketersediaanJam($kelas, $value->hari);
            // menambahkan hasil rumusan 
            if ($result[$key]->beban_kerja == 0 && $result[$key]->jam_tersedia == 0) {
                $rumusan = 0;
            } else {
                $rumusan = round(($status == 1) ? 1 + ($result[$key]->beban_kerja / $result[$key]->jam_tersedia) : 0 + ($result[$key]->beban_kerja / $result[$key]->jam_tersedia), 2);
            }

            $result[$key]->rumusan = $rumusan;
        }

        echo "<pre>";
        echo print_r($result);
        echo "</pre>";
        /* 
		!create data 
		*/
        $this->m_rumusan->createData($result);
        redirect(base_url('penjadwalan'));
    }

    public function reset_penjadwalan()
    {
        $this->m_jadwal->resetPenjadwalan();
        redirect(base_url('penjadwalan'));
    }

    public function reset_rumusan()
    {
        $this->m_rumusan->resetRumusan();
        $this->reset_Penjadwalan();
        redirect(base_url('penjadwalan'));
    }

    public function reset_jadwal()
    {
        $this->m_jadwal->resetJadwal();
        redirect(base_url('penjadwalan'));
    }


    // ploting
    public function ploting_jadwal()
    {
        $dataKelas = $this->m_kelas->getAllData();
        // data kelas 
        foreach ($dataKelas as $valuedataKelas) {
            $metode = 1;
            $kelas = $valuedataKelas->id_kelas;
            echo "<hr>";
            echo $kelas;
            // ambil data guru dan tugas mengajarnya berdasarkan id kelas 
            $dataGuru = $this->dataGuru($kelas);
            // echo "<pre>";
            // print_r($dataGuru);
            // echo "</pre>";
            foreach ($dataGuru as $valueDataGuru) {
                echo '<br>';
                $id_guru = $valueDataGuru->id_guru;
                $request = $valueDataGuru->hari_request;
                echo "$id_guru";
                echo $valueDataGuru->hari_request . '<br>';
                echo 'mengajar : <br>';
                // echo '<pre>';
                // print_r($valueDataGuru->mengajar);
                // echo '</pre>';
                foreach ($valueDataGuru->mengajar as $valueMengajar) {
                    echo "<br>-> $valueMengajar->nama_mapel kel. : $valueMengajar->kelompok_mapel beban : $valueMengajar->beban_jam , ";
                    // *pencarian waktu terbaik
                    $this->cariWaktuTerbaik($kelas, $id_guru, $request, $valueMengajar->beban_jam, $valueMengajar->kelompok_mapel, $metode, $valueMengajar->id_mapel, $valueMengajar->nama_mapel, $valueMengajar->id_tugas);
                }
                echo '<br>';
                // 	break;
            }
            // break;
            echo "<hr>";
            echo "ploting ulang perulangan";
            echo "<hr>";
            $kelasKosong = $this->m_jadwal->getJadwalKosong($kelas);
            if (count($kelasKosong) > 0) {
                $tugasGuruBelumterplot = [];
                $guru = $this->dataGuru($kelas);
                foreach (array_column($guru, 'mengajar') as $key => $value) {
                    if (!empty($value)) {
                        $tugasGuruBelumterplot[] = $guru[$key];
                    }
                }
                foreach ($tugasGuruBelumterplot as $valueDataGuruBelumTerplot) {
                    echo '<br>';
                    $id_guru = $valueDataGuruBelumTerplot->id_guru;
                    $request = $valueDataGuruBelumTerplot->hari_request;
                    echo $id_guru . '<br>';
                    echo $valueDataGuruBelumTerplot->hari_request . '<br>';
                    echo 'mengajar : <br>';
                    print_r($valueDataGuruBelumTerplot->mengajar);
                    echo '<br>';
                    foreach ($valueDataGuruBelumTerplot->mengajar as $valueMengajar) {
                        echo "<br>-> $valueMengajar->nama_mapel kel. : $valueMengajar->kelompok_mapel sisa beban jam  : $valueMengajar->sisa_jam , ";
                        // echo "<br>-> $valueMengajar->nama_mapel kel. : $valueMengajar->kelompok_mapel sisa beban jam  : $valueMengajar->beban_jam , ";
                        // *pencarian waktu terbaik
                        // $this->cariWaktuTerbaik($kelas, $id_guru, $request, $valueMengajar->beban_jam, $valueMengajar->kelompok_mapel, $metode++, $valueMengajar->id_mapel, $valueMengajar->nama_mapel, $valueMengajar->id_tugas);
                        $this->cariWaktuTerbaik($kelas, $id_guru, $request, $valueMengajar->sisa_jam, $valueMengajar->kelompok_mapel, $metode++, $valueMengajar->id_mapel, $valueMengajar->nama_mapel, $valueMengajar->id_tugas);
                    }
                    echo '<br>';
                }

                $kelasKosong = $this->m_jadwal->getJadwalKosong($kelas);
                if (count($kelasKosong) > 0) {
                    echo '<br>';
                    echo '=============================';
                    echo "JADWAL STUCK";
                    echo '=============================';
                    echo '<br>';
                }
            }
        }
        redirect(base_url('penjadwalan'));
    }

    /* 
	* ambil data guru yang mengajar di kelas beserta kewajiban mengajarnya
	*/
    public function dataGuru(String $kelas)
    {
        $dataGuru = $this->m_rumusan->getDataRumusan($kelas);
        foreach ($dataGuru as $key => $valuedataGuru) {
            $dataGuru[$key]->mengajar = $this->m_pengampu->getDatatugasByidGuru($valuedataGuru->id_guru, $kelas);
        }
        return (array) $dataGuru;
    }

    /* 
	* mencari jam terbaik
	*/
    public function cariWaktuTerbaik($kelas, $id_guru, $hari, $bebanJam, $kelompokMapel, $metode = 1, $id_mapel, $nama_mapel, $id_tugas)
    {
        /*
		* jumlah pembagian jam 
		* cek apakah ada jadwal yg ngepress
		* cek apakah ada jadwal yang ada tapi tidak ngpress
		* jika sudah tidak ada tambahi metode
		* kalau sudah tidak bisa maka geser
		* kalau sudah tidak bisa lagi maka kepepet
		*/

        $pembagianJam = $this->pembagianWaktu($kelompokMapel, $bebanJam, $metode);
        $dataHari = explode(',', $hari);
        foreach ($pembagianJam as $valuePembagianjam) {
            $hasilJadwal = $this->jadwalPas($kelas, $valuePembagianjam, $dataHari, $id_guru);
            // * cek hasil statusnya
            switch ($hasilJadwal['status']) {
                case 'Press':
                    echo " sesi press";
                    $status = '<div style="background-color: #c82333">error</div>';
                    echo "<br>";
                    print_r($hasilJadwal['sesi']);
                    echo "<br>";

                    foreach ($hasilJadwal['sesi'] as $keyHariJadwal => $sesi) {
                        $jadwaltersedia = $this->m_jadwal->getJadwalGuru_Kelas_Hari($kelas, $keyHariJadwal, $id_guru);
                        if (count($jadwaltersedia) == 0) {
                            $saranSesi = [];
                            foreach ($sesi as $valueSesi) {
                                $saranSesi = $this->sesiUrut($kelas, $keyHariJadwal, $valueSesi);
                            }
                            if (!empty($saranSesi)) {
                                $this->m_jadwal->isiJadwal($kelas, $keyHariJadwal, $saranSesi, $id_guru, $id_mapel, $nama_mapel, $id_tugas);
                                $status = "<div style='background-color: #218838;'>sukses</div>";
                                break;
                            }
                        }
                    }
                    echo "<br>";
                    echo "$status : ";
                    print_r($saranSesi);
                    echo "<br>";
                    break;
                case 'tidakPress':
                    echo "<br>";
                    echo "<div style='background-color: #7FFFD4 ;'>proses dahulu</div>";
                    $tempTotal = 0;
                    $hariyangdipilih = '';
                    $status = '<div style="background-color: #c82333">error</div>';

                    foreach ($hasilJadwal['sesi'] as $keyHariJadwal => $sesi) {
                        $jadwaltersedia = $this->m_jadwal->getJadwalGuru_Kelas_Hari($kelas, $keyHariJadwal, $id_guru);
                        if (count($jadwaltersedia) == 0) {
                            if ($tempTotal < count($sesi)) {
                                $tempTotal = count($sesi);
                                $hariyangdipilih = $keyHariJadwal;
                            }
                        }
                    }
                    echo "---$hariyangdipilih==>temp Total : " . $tempTotal . "---<br>";

                    if ($hariyangdipilih == '') {
                        foreach ($hasilJadwal['sesi'] as $keyHariJadwal => $sesi) {
                            // echo "<br>";
                            // echo "tidak ada pilihan lain jumlah jadwal " . count($jadwaltersedia);
                            if ($tempTotal < count($sesi)) {
                                $tempTotal = count($sesi);
                                $hariyangdipilih = $keyHariJadwal;
                            }
                        }
                        echo 'hari yang dipilih kosong';
                    }

                    // print_r($hasilJadwal['sesi'][$hariyangdipilih]);
                    foreach ($hasilJadwal['sesi'][$hariyangdipilih] as $valueSesi) {
                        $saranSesi = $this->sesiUrut($kelas, $hariyangdipilih, $valueSesi);
                        if (!empty($saranSesi)) {
                            // $this->m_jadwal->isiJadwal($kelas, $hariyangdipilih, $hasilJadwal['sesi'][$hariyangdipilih][0], $id_guru, $id_mapel, $nama_mapel, $id_tugas);
                            $this->m_jadwal->isiJadwal($kelas, $hariyangdipilih, $saranSesi, $id_guru, $id_mapel, $nama_mapel, $id_tugas);
                            $status = "<div style='background-color: #218838;'>sukses</div>";
                            break;
                        }
                    }
                    echo "<br>";
                    echo "$status : ";
                    print_r($saranSesi);
                    echo "<br>";
                    break;
                case 'tidakMuat':
                    echo "tidak muat";
                    break;
            }
        }
    }

    public function sesiUrut($kelas, $hari, $sesi)
    {
        $kelas = $this->m_kelas->detail_data($kelas)['kelas'];
        echo "$kelas === $hari";
        $JadwalKhusus = $this->m_khusus->getJadwalKhusus_hari($kelas, $hari);
        $sesiKhusus = array_column($JadwalKhusus, 'sesi');
        $jumlahSesi = count($sesi);
        $sesiPertama = $sesi[0];
        $sesiBenar = [];
        $tempSesi = 0;
        for ($i = 0; $i < $jumlahSesi; $i++) {
            $tempSesi = $sesiPertama;
            if (is_bool(array_search($tempSesi, $sesiKhusus))) {
                $sesiBenar[] = $sesiPertama;
            } else {
                $i--;
            }
            $sesiPertama++;
        }

        if (empty(array_diff($sesi, $sesiBenar))) {
            return $sesi;
        } else {
            print_r($sesiKhusus);
        }
    }



    /* 
	* memecah jam sks
	*/
    public function pembagianWaktu($kelompokMapel, $bebanJam, $metodeKe = null)
    {
        switch ($bebanJam) {
            case '8':
                switch ($metodeKe) {
                    case '1':
                        return [4, 4];
                        break;
                    case '2':
                        return [2, 2, 2, 2];
                        break;
                    case '3':
                        return [5, 3];
                        break;
                    default:
                        return false;
                        break;
                }
                break;
            case '7':
                switch ($metodeKe) {
                    case '1':
                        return [3, 2, 2];
                        break;
                    case '2':
                        return [4, 3];
                        break;
                    case '3':
                        return [5, 2];
                        break;
                    default:
                        return false;
                        break;
                }
                break;
            case '6':
                switch ($metodeKe) {
                    case '1':
                        return [3, 3];
                        break;
                    case '2':
                        return [2, 2, 2];
                        break;
                    case '3':
                        return [4, 2];
                    default:
                        return false;
                        break;
                }
                break;

            case '5':
                switch ($metodeKe) {
                    case '1':
                        return [3, 2];
                        break;
                    case '2':
                        return [4, 1];
                        break;
                    default:
                        return false;
                        break;
                }
                break;
            case '4':
                if ($kelompokMapel == 'C') {
                    switch ($metodeKe) {
                        case '1':
                            return [4];
                            break;
                        case '2':
                            return [2, 2];
                            break;
                        default:
                            return false;
                            break;
                    }
                } else {
                    return [2, 2];
                }
                break;
            case '3':
                // switch ($metodeKe) {
                // 	case '1':
                // 		return [3];
                // 		break;
                // 	case '2':
                // 		return [2, 1];
                // 		break;
                // }
                return [3];
                break;
            case '2':
                // switch ($metodeKe) {
                // 	case '1':
                // 		return [2];
                // 		break;
                // case '2':
                // 	return [1, 1];
                // 	break;
                // }
                return [2];
                break;
            default:
                return [$bebanJam];
                break;
        }
    }

    /* 
	* function untuk mencari apakah ada jadwal yg ngepress dan berturut turut / hanya bisa di isi saja namun tidak ngepress
	* 
	*/
    public function jadwalPas($kelas, $pembagianJam, $hari, $id_guru)
    {
        echo "jumlah hari yang tersedia :" . count($hari) . "<br>";
        echo  "<div style='background-color: #DC143C'>Pembagian_jam ($pembagianJam sks)  -> </div>";
        // echo implode(", ", $pembagianJam);
        // foreach ($pembagianJam as $beban_jam) {
        // echo "value pembagian : $beban_jam <br>";
        $error = 0;
        foreach ($hari as $valueDataHari) {
            $jumlahHariKosong = 0;
            // echo $kelas;
            echo $valueDataHari;
            $dataJadwal = $this->m_jadwal->getDataPenjadwalan($kelas, $valueDataHari, $id_guru);
            // echo "</br>";
            // print_r($dataJadwal);
            // echo "</br>";
            $data = [];
            if ($pembagianJam <= count($dataJadwal)) {
                foreach ($dataJadwal as $dataHari) {
                    if ($dataHari->kode_jadwal == '-' && $dataHari->keterangan == 'kosong') {
                        $jumlahHariKosong++;
                        $data[] = $dataHari->sesi;
                        if (count($data) == $pembagianJam) {
                            $sesi[$valueDataHari][] = $data;
                            $data = [];
                        }
                    } else {
                        $data = [];
                        $jumlahHariKosong = 0;
                    }
                }
                if ($jumlahHariKosong == $pembagianJam) {
                    $result =  [
                        'status' => 'Press',
                        'sesi' => $pembagianBebanJam[$pembagianJam][] = $sesi
                    ];
                } else if ($jumlahHariKosong > $pembagianJam) {
                    $result =  [
                        'status' => 'tidakPress',
                        'sesi' => $pembagianBebanJam[$pembagianJam][] = $sesi
                    ];
                } else {
                    $result =  [
                        'status' => 'ada sesuatu',
                    ];
                }
            } else {
                $error++;
                if ($error == count($hari)) {
                    return [
                        'status' => 'tidakMuat'
                    ];
                }
            }
        }
        // }
        return $result;
    }

    /* 
	* pindah jadwal
	*/

    public function pindahJadwal($status = null)
    {
        if ($status == null) {
            $dataFirst = $this->input->post('dataFirst');
            $dataSecond = $this->input->post('dataSecond');

            if ($dataFirst['id_kelas'] == $dataSecond['id_kelas']) {
                // if ($dataFirst['id_guru'] != null) {
                // 	echo 'dataFirst null';
                // }

                // if ($dataSecond['id_guru'] != null) {
                // 	echo 'dataSecond null';
                // }
                $cekJadwal1 = $this->m_jadwal->checkingJadwalTabrakan($dataFirst['hari'], $dataFirst['sesi'], $dataSecond['id_guru']);
                $cekJadwal2 = $this->m_jadwal->checkingJadwalTabrakan($dataSecond['hari'], $dataSecond['sesi'], $dataFirst['id_guru']);
                if (count($cekJadwal1) == 0 && count($cekJadwal2) == 0) {
                    $this->m_jadwal->pindahJadwal_1_2($dataFirst, $dataSecond);
                    $this->m_jadwal->pindahJadwal_2_1($dataFirst, $dataSecond);
                    $data['status'] = 'success';
                } else {
                    $data['keterangan'] = 'Jadwal Tabrakan';
                    $data['status'] = 'error';
                }
            } else {
                $data['keterangan'] = 'tukar jadwal harus berbeda kelas';
                $data['status'] = 'error';
            }
            echo json_encode($data);
        } else {
            $tugasGuru = $this->input->post('tugasGuru');
            $dataFirst = $this->PenugasanGuru_Model->detail_data($tugasGuru);
            $dataSecond = $this->input->post('dataSecond');
            $cekJadwal = $this->m_jadwal->checkingJadwalTabrakan($dataSecond['hari'], $dataSecond['sesi'], $dataFirst['id_guru']);
            if (count($cekJadwal) == 0) {
                // echo "this is data first : ";
                // print_r($dataFirst);
                // echo "<br>";
                // echo "this is data second : ";
                // print_r($dataSecond);
                // echo "<br>";
                $this->m_jadwal->pindahJadwal($dataFirst, $dataSecond);
                if ($dataSecond['id_guru'] != null) {
                    // echo $dataSecond['kode_jadwal'] . "+,";
                    $this->m_jadwal->updateSisaJam($dataSecond['kode_jadwal'], 1,  '+');
                    $data['status'] = 'success';
                } else {
                    $data['status'] = 'success';
                }
                // echo $tugasGuru . "-";
                $this->m_jadwal->updateSisaJam($tugasGuru, 1,  '-');
            } else {
                $data['keterangan'] = 'Jadwal Tabrakan';
                $data['status'] = 'error';
            }
            echo json_encode($data);
        }
    }

    /* 
	* ambil hari yang kosong 
	*/
    public function getDataHariKosong($hari, $kelas)
    {
        foreach ($hari as $valueHari) {
            $dataKosong[$valueHari] = $this->m_jadwal->getDataPenjadwalanByIdKelas($kelas, $valueHari);
        }
        return $dataKosong;
    }


    public function update_act()
    {
        $id_kelas = $this->input->post('id_kelas');
        $id_jam = $this->input->post('id_jam');
        $id_mapel = $this->input->post('id_mapel');

        $data = array(
            'id_kelas' => $id_kelas,
            'id_jam' => $id_jam,
            'id_mapel' => $id_mapel,
        );


        $where = array(
            'id_mapel' => $id_mapel,
        );

        $this->db->update('set_jam', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Update</h4>
        Data ruangan berhasil terupdate!
        </div>');
        redirect(base_url('jam'));
    }


    public function update_act2()
    {

        $this->m_mapel->tambah_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Sukses</h4>
            Data mata pelajaran berhasil disimpan!
            </div>');
        redirect(base_url('jam'));
    }


    public function act_plan()
    {
        // $this->m_jadwal->act_plan();
        foreach ($this->input->post('chkJam') as $valueJam) {
            $data = [
                'id_ta' => $this->input->post('id_ta'),
                'id_kelas' => $this->input->post('id_kelas'),
                'id_hari' => $this->input->post('id_hari'),
                'id_mapel' => $this->input->post('id_mapel'),
                'id_jam' => $valueJam
            ];

            if ($this->checkExist2($this->input->post('id_ta'), $this->input->post('id_kelas'), $this->input->post('id_hari'), $this->input->post('id_mapel'), $valueJam)) {
                $this->db->insert('set_jadwal', $data);
            }
        }
        $this->session->set_flashdata('sukses', 'Data mata pelajaran berhasil disimpan!');
        // $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        // <h4><i class="icon fa fa-check"></i> Sukses</h4>
        // Data mata pelajaran berhasil disimpan!
        // </div>');
        redirect(base_url('penjadwalan'));
    }

    private function checkExist2($id_ta, $id_hari, $id_mapel, $id_kelas, $id_jam)
    {
        $data = [
            'id_ta' => $id_ta,
            'id_hari' => $id_hari,
            'id_mapel' => $id_mapel,
            'id_kelas' => $id_kelas,
            'id_jam' => $id_jam
        ];
        $sql = $this->db->query("SELECT * FROM set_jadwal WHERE id_mapel='$id_mapel' and id_jam='$id_jam' and id_kelas='$id_kelas' ");
        $cek = $sql->num_rows();
        if ($cek > 0) {
            $this->session->set_flashdata('gagal', 'Data untuk jadwal mata pelajaran ini sudah diinput atau sama dengan kelas yang lain!');

            // $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            // <h4><i class="icon fa fa-ban"></i> Sudah ada</h4>
            // Data untuk jadwal mata pelajaran ini sudah diinput atau sama dengan kelas yang lain!
            // </div>');
            redirect(base_url('penjadwalan'));
        } else {
            return true;
        }
    }


    public function export($id_guru = null)
    {
        $data = [
            'belumterplot' => $this->m_pengampu->tugasGuruBelumterplot(),
            'kelas' => $this->m_kelas->getAllData(),
            'penjadwalan' => $this->m_jadwal->getAllDataPenjadwalan(),
            'jadwal' => $this->m_jadwal->getAllData(),
            'kelas' => $this->m_kelas->getAllData(),
            'mapel' => $this->m_mapel->getAllData(),
            'guru' => $id_guru

        ];
        if ($id_guru != null) {
            $data['guru'] = $this->m_guru->detail_data($id_guru);
        }
        // export pdf
        // $this->load->library('pdfgenerator');
        // $html = $this->load->view('jadwal/exportPDF', $data, true);
        // $this->pdfgenerator->generate($html, 'tes');
        $this->load->view('file/export_excel', $data);
    }
}

/* End of file Penjadwalan.php */

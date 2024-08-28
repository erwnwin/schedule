<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Type;

class Spout_lib
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('m_rumusan');
        $this->CI->load->model('m_pengampu');
        $this->CI->load->model('m_kelas');
        $this->CI->load->model('m_jadwal');
        $this->CI->load->model('m_mapel');
        $this->CI->load->model('m_jam');
    }

    public function export_excel()
    {
        $data = [
            'title' => "Hasil Ploting Penjadwalan : e-Schedule",
            'rumusan' => $this->CI->m_rumusan->getDataRumusan(),
            'belumterplot' => $this->CI->m_pengampu->tugasGuruBelumterplot(),
            'kelas' => $this->CI->m_kelas->getAllData(),
            'penjadwalan' => $this->CI->m_jadwal->getAllDataPenjadwalan(),
            'jadwal' => $this->CI->m_jadwal->getAllData(),
            'mapel' => $this->CI->m_mapel->getAllData(),
            'rangeJam' => $this->CI->m_jam->getAllData()
        ];

        $writer = WriterEntityFactory::createXLSXWriter();
        $fileName = 'Penjadwalan_Sekolah_' . date('YmdHis') . '.xlsx';
        $filePath = APPPATH . '../downloads/' . $fileName;

        if (!is_dir(APPPATH . '../downloads/')) {
            mkdir(APPPATH . '../downloads/', 0777, true);
        }

        $writer->openToFile($filePath);

        // Title Row
        $titleRow = WriterEntityFactory::createRowFromArray([$data['title']]);
        $writer->addRow($titleRow);

        // Headers
        $headerRow = WriterEntityFactory::createRowFromArray(['Tahun Ajaran', '2024/2025']);
        $writer->addRow($headerRow);

        // Data Rows
        // foreach ($data['penjadwalan'] as $penjadwal) {
        //     $row = [
        //         $penjadwal->id_kelas,
        //         $penjadwal->keterangan,
        //         $penjadwal->nama,
        //         $data['mapel'][$penjadwal->id_mapel]->nama_mapel,
        //         $penjadwal->jam_mulai,
        //         $penjadwal->jam_selesai
        //     ];
        //     $dataRow = WriterEntityFactory::createRowFromArray($row);
        //     $writer->addRow($dataRow);
        // }

        // Close writer
        $writer->close();

        return $filePath;
    }
}

<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?> | Penjadwalan Sekolah</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $logo ?>" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $logo ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $logo ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 30px;
            margin: 0;
        }

        .header h2 {
            font-size: 24px;
            margin: 5px 0;
        }

        .page-break {
            page-break-before: always;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            page-break-inside: avoid;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            vertical-align: middle;
        }

        .table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .table td {
            background-color: #ffffff;
        }

        .table td.empty {
            background-color: #f8d7da;
            color: #721c24;
        }

        .table td.filled {
            background-color: #d4edda;
            color: #155724;
        }

        .table td.special {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        @page {
            size: A4 landscape;
            margin: 10mm;
        }

        .content {
            min-height: 297mm;
            padding-bottom: 40mm;
        }

        .footer {
            position: fixed;
            bottom: 10mm;
            left: 10mm;
            right: 10mm;
            text-align: center;
            font-size: 10px;
            border-top: 1px solid #000;
            padding-top: 5px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Jadwal SMA Kristen Sudiang Makassar</h1>
        <h2>Tahun Ajaran <?= date('Y') ?>/<?= date('Y') + 1 ?></h2>
    </div>
    <div class="content">
        <?php if (!empty($penjadwalan)) : ?>
            <?php
            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
            $jamMulaiArray = array_unique(array_column($penjadwalan, 'jam_mulai'));

            function format_jam($jam)
            {
                return date('H:i', strtotime($jam));
            }

            function sanitizeId($value)
            {
                return preg_replace('/[^a-zA-Z0-9_\-]/', '_', $value);
            }

            foreach ($hari as $valueHari) :
                $collapseId = sanitizeId($valueHari);
            ?>
                <div class="page-break">
                    <h2><?= $valueHari ?></h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 15%;">Jam</th>
                                <?php foreach ($kelas as $valueKelas) : ?>
                                    <th style="width: <?= 85 / count($kelas) ?>%;"><?= $valueKelas->id_kelas ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jamMulaiArray as $jamMulai) {
                                $formattedJamMulai = format_jam($jamMulai);
                                $dataJadwal = array_filter($penjadwalan, function ($item) use ($jamMulai, $valueHari) {
                                    return $item->jam_mulai == $jamMulai && $item->hari == $valueHari;
                                });
                                $jamSelesai = !empty($dataJadwal) ? format_jam(reset($dataJadwal)->jam_selesai) : '';
                            ?>
                                <tr>
                                    <td>
                                        <?= $formattedJamMulai ?> s.d <?= $jamSelesai ?> WITA
                                    </td>
                                    <?php foreach ($kelas as $valueKelas) :
                                        $dataJadwalKelas = filter_jadwal($penjadwalan, $valueHari, $valueKelas->id_kelas, $jamMulai);
                                        $cellClass = 'empty';
                                        $displayText = 'Kosong';

                                        if (!empty($dataJadwalKelas)) {
                                            $jadwalKelas = $dataJadwalKelas[0];
                                            $displayText = $jadwalKelas->keterangan;
                                            $cellClass = $jadwalKelas->id_guru !== null ? 'filled' : 'special';
                                            if ($jadwalKelas->id_guru !== null) {
                                                $displayText = $jadwalKelas->nama . ' ~ ' . getkodeMapel($mapel, $jadwalKelas->id_mapel);
                                            }
                                        }
                                    ?>
                                        <td class="<?= $cellClass ?>">
                                            <?= $displayText ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="footer">
        <p>&copy; Copyright | <?= date('Y') ?> <b>Titik Balik Teknologi</b></p>
    </div>
</body>

</html>
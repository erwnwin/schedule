<?php
$fileName = "Penjadwalan Mata Pelajaran Makassar";
if ($guru != null) {
    $fileName = "(" . $guru['id_guru'] . ")Penjadwalan " . $guru['nama_guru'];
}
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename={$fileName}.xls");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-size: 12px;
        }

        .jadwal,
        .jadwal td,
        .jadwal th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .jadwal {
            width: 100%;
        }

        .frame {
            border-collapse: collapse;
            padding: 10px;
        }

        .frame td {
            vertical-align: top;
        }

        @page {
            margin: 0px;
        }

        page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
        }
    </style>
</head>

<body>
    <page size="A4">
        <table class="frame">
            <tr>
                <td colspan="2" style="height: 40px;">
                    <center>
                        <img src="<?= htmlspecialchars(base_url("assets/img/logo.png")) ?>" alt="kop smk">
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php if ($guru != null) : ?>
                        <center>
                            <h2>Data Jadwal Belum terPloting</h2>
                        </center>
                        <div class="row">
                            <div class="col-12">
                                <div class="callout callout-danger">
                                    <table class="jadwal">
                                        <tr>
                                            <td>Kelas</td>
                                            <td>Nama Guru</td>
                                            <td>Mapel</td>
                                            <td>Beban Jam</td>
                                            <td>Jumlah Yang belum Terplot</td>
                                            <td>Request Jadwal</td>
                                        </tr>
                                        <?php foreach ($belumterplot as $valueBelumterplot) :
                                            if ($guru['id_guru'] == $valueBelumterplot->id_guru) : ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($valueBelumterplot->id_kelas) ?></td>
                                                    <td><?= htmlspecialchars($valueBelumterplot->nama) ?></td>
                                                    <td><?= htmlspecialchars($valueBelumterplot->nama_mapel) ?></td>
                                                    <td><?= htmlspecialchars($valueBelumterplot->beban_jam) ?></td>
                                                    <td><?= htmlspecialchars($valueBelumterplot->sisa_jam) ?></td>
                                                    <td><?= htmlspecialchars($valueBelumterplot->hari) ?></td>
                                                </tr>
                                        <?php endif;
                                        endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </td>
            </tr>
            <?php
            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
            foreach ($hari as $valueHari) :
                $keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
                $jumlahSesi = $jadwal[$keyJadwal]->jumlah_sesi;
            ?>
                <tr>
                    <td>
                        <div>
                            <table class="jadwal">
                                <tr>
                                    <td colspan="<?= count($kelas) + 1 ?>">
                                        <?= htmlspecialchars($valueHari) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>+</th>
                                    <?php foreach ($kelas as $valueKelas) : ?>
                                        <th><?= htmlspecialchars($valueKelas->id_kelas) ?></th>
                                    <?php endforeach; ?>
                                </tr>
                                <?php for ($i = 0; $i < $jumlahSesi; $i++) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($i) ?></td>
                                        <?php foreach ($kelas as $valueKelas) :
                                            $dataJadwalKelas = filter_jadwal($penjadwalan, $valueHari, $valueKelas->id_kelas, $i);
                                            $dataJadwalKelas = !empty($dataJadwalKelas) ? $dataJadwalKelas[0] : null;
                                            if ($dataJadwalKelas && $dataJadwalKelas->id_guru !== null) :
                                                $guru_color = $guru && $guru['id_guru'] == $dataJadwalKelas->id_guru ? $dataJadwalKelas->warna_guru : $dataJadwalKelas->warna_guru;
                                        ?>
                                                <td id="<?= htmlspecialchars($dataJadwalKelas->id_penjadwalan) ?>" class='penjadwalan first' data-kelas='<?= htmlspecialchars($valueKelas->id_kelas) ?>' data-hari='<?= htmlspecialchars($valueHari) ?>' data-jadwal='<?= htmlspecialchars(json_encode($dataJadwalKelas)) ?>' data-request='<?= htmlspecialchars($dataJadwalKelas->request) ?>' style="background-color: <?= htmlspecialchars($guru_color) ?> ;">
                                                    <div>
                                                        <?= '(' . htmlspecialchars($dataJadwalKelas->id_guru) . ') ' .  htmlspecialchars(getkodeMapel($mapel, $dataJadwalKelas->id_mapel)) ?>
                                                    </div>
                                                </td>
                                        <?php else :
                                                $color = $dataJadwalKelas && $dataJadwalKelas->keterangan == 'kosong' ? 'red' : 'blue';
                                                echo "<td style='color: $color ;' data-request='-' data-guru='" . htmlspecialchars($dataJadwalKelas->id_guru ?? '') . "' data-kelas='" . htmlspecialchars($valueKelas->id_kelas) . "' data-hari='" . htmlspecialchars($valueHari) . "' class='penjadwalan first' data-jadwal='" . htmlspecialchars(json_encode($dataJadwalKelas)) . "'>" . htmlspecialchars($dataJadwalKelas->keterangan ?? '') . "</td>";
                                            endif;
                                        endforeach; ?>
                                    </tr>
                                <?php endfor; ?>
                            </table>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </page>
</body>

</html>
<?php
require_once(APPPATH . 'helpers/jadwal_helper.php');

$fileName = "Penjadwalan Mata Pelajaran Makassar";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$fileName.xls");
?>
<!DOCTYPE html>
<html lang="en">
<?php
$hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];

?>

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
                        <img src="<?= base_url("assets/img/logo.png") ?>" alt="kop smk">
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
                                        <?php
                                        foreach ($belumterplot as $valueBelumterplot) :
                                            if ($guru['id_guru'] == $valueBelumterplot->id_guru) {
                                        ?>
                                                <tr>
                                                    <td><?= $valueBelumterplot->id_kelas ?></td>
                                                    <td><?= $valueBelumterplot->nama ?></td>
                                                    <td><?= $valueBelumterplot->nama_mapel ?></td>
                                                    <td><?= $valueBelumterplot->beban_jam ?></td>
                                                    <td><?= $valueBelumterplot->sisa_jam ?></td>
                                                    <td><?= $valueBelumterplot->hari ?></td>
                                                </tr>
                                        <?php
                                            }
                                        endforeach; ?>
                                    </table>
                                </div>
                            </div>

                        </div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <center>
                        <h2>Jadwal Mata Pelajaran</h2>
                    </center>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $valueHari = "Senin";
                    $keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
                    $jumlahSesi = $jadwal[$keyJadwal]->jumlah_sesi;
                    ?>

                    <div>
                        <table class="jadwal">
                            <tr>
                                <td colspan="<?= count($kelas) + 1 ?>">
                                    <?= $valueHari ?>
                                </td>
                            </tr>
                            <tr>
                                <th>+</th>
                                <?php foreach ($kelas as $valueKelas) : ?>
                                    <th><?= $valueKelas->id_kelas ?></th>
                                <?php endforeach; ?>
                            </tr>
                            <?php
                            // print_r($penjadwalan);
                            for ($i = 0; $i < $jumlahSesi; $i++) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <?php
                                    foreach ($kelas as $valueKelas) :
                                        $dataJadwalKelas = filter_jadwal($penjadwalan, $valueHari, $valueKelas->id_kelas, $i);
                                        if ($dataJadwalKelas[0]->id_guru !== null) {
                                            $guru_color = '#ffffff';
                                            if ($guru != null) {
                                                if ($guru['id_guru'] == $dataJadwalKelas[0]->id_guru) {
                                                    $guru_color = $dataJadwalKelas[0]->warna_guru;
                                                }
                                            } else {
                                                $guru_color = $dataJadwalKelas[0]->warna_guru;
                                            }
                                    ?>
                                            <td id="<?= $dataJadwalKelas[0]->id_penjadwalan ?>" class='penjadwalan first' data-kelas='<?= $valueKelas->id_kelas ?>' data-hari='<?= $valueHari ?>' data-jadwal='<?= json_encode($dataJadwalKelas[0]) ?>' data-request='<?= $dataJadwalKelas[0]->request ?>' style="background-color: <?= $guru_color ?> ;">
                                                <div>
                                                    <?= '(' . $dataJadwalKelas[0]->id_guru . ') ' .  getkodeMapel($mapel, $dataJadwalKelas[0]->id_mapel) ?>
                                                </div>
                                            </td>
                                    <?php
                                        } else {
                                            $color = 'blue';
                                            if ($dataJadwalKelas[0]->keterangan == 'kosong') {
                                                $color = 'red';
                                            }
                                            echo "<td style='color: $color ;' data-request='-' data-guru='" . $dataJadwalKelas[0]->id_guru . "' data-kelas='$valueKelas->id_kelas' data-hari='$valueHari' class='penjadwalan first' data-jadwal='" . json_encode($dataJadwalKelas[0]) . "'>" . $dataJadwalKelas[0]->keterangan . "</td>";
                                        }
                                    endforeach; ?>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </td>
                <td>
                    <?php
                    $valueHari = "Selasa";
                    $keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
                    $jumlahSesi = $jadwal[$keyJadwal]->jumlah_sesi;
                    ?>

                    <div>
                        <table class="jadwal">
                            <tr>
                                <td colspan="<?= count($kelas) + 1 ?>">
                                    <?= $valueHari ?>
                                </td>
                            </tr>
                            <tr>
                                <th>+</th>
                                <?php foreach ($kelas as $valueKelas) : ?>
                                    <th><?= $valueKelas->id_kelas ?></th>
                                <?php endforeach; ?>
                            </tr>
                            <?php
                            // print_r($penjadwalan);
                            for ($i = 0; $i < $jumlahSesi; $i++) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <?php
                                    foreach ($kelas as $valueKelas) :
                                        $dataJadwalKelas = filter_jadwal($penjadwalan, $valueHari, $valueKelas->id_kelas, $i);
                                        if ($dataJadwalKelas[0]->id_guru !== null) {
                                            $guru_color = '';
                                            if ($guru != null) {
                                                if ($guru['id_guru'] == $dataJadwalKelas[0]->id_guru) {
                                                    $guru_color = $dataJadwalKelas[0]->warna_guru;
                                                }
                                            } else {
                                                $guru_color = $dataJadwalKelas[0]->warna_guru;
                                            }
                                    ?>
                                            <td id="<?= $dataJadwalKelas[0]->id_penjadwalan ?>" class='penjadwalan first' data-kelas='<?= $valueKelas->id_kelas ?>' data-hari='<?= $valueHari ?>' data-jadwal='<?= json_encode($dataJadwalKelas[0]) ?>' data-request='<?= $dataJadwalKelas[0]->request ?>' style="background-color: <?= $guru_color ?> ;">
                                                <div>
                                                    <?= '(' . $dataJadwalKelas[0]->id_guru . ') ' .  getkodeMapel($mapel, $dataJadwalKelas[0]->id_mapel) ?>
                                                </div>
                                            </td>
                                    <?php
                                        } else {
                                            $color = 'blue';
                                            if ($dataJadwalKelas[0]->keterangan == 'kosong') {
                                                $color = 'red';
                                            }
                                            echo "<td style='color: $color ;' data-request='-' data-guru='" . $dataJadwalKelas[0]->id_guru . "' data-kelas='$valueKelas->id_kelas' data-hari='$valueHari' class='penjadwalan first' data-jadwal='" . json_encode($dataJadwalKelas[0]) . "'>" . $dataJadwalKelas[0]->keterangan . "</td>";
                                        }
                                    endforeach; ?>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $valueHari = "Rabu";
                    $keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
                    $jumlahSesi = $jadwal[$keyJadwal]->jumlah_sesi;
                    ?>

                    <div>
                        <table class="jadwal">
                            <tr>
                                <td colspan="<?= count($kelas) + 1 ?>">
                                    <?= $valueHari ?>
                                </td>
                            </tr>
                            <tr>
                                <th>+</th>
                                <?php foreach ($kelas as $valueKelas) : ?>
                                    <th><?= $valueKelas->id_kelas ?></th>
                                <?php endforeach; ?>
                            </tr>
                            <?php
                            // print_r($penjadwalan);
                            for ($i = 0; $i < $jumlahSesi; $i++) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <?php
                                    foreach ($kelas as $valueKelas) :
                                        $dataJadwalKelas = filter_jadwal($penjadwalan, $valueHari, $valueKelas->id_kelas, $i);
                                        if ($dataJadwalKelas[0]->id_guru !== null) {
                                            $guru_color = '';
                                            if ($guru != null) {
                                                if ($guru['id_guru'] == $dataJadwalKelas[0]->id_guru) {
                                                    $guru_color = $dataJadwalKelas[0]->warna_guru;
                                                }
                                            } else {
                                                $guru_color = $dataJadwalKelas[0]->warna_guru;
                                            }
                                    ?>
                                            <td id="<?= $dataJadwalKelas[0]->id_penjadwalan ?>" class='penjadwalan first' data-kelas='<?= $valueKelas->id_kelas ?>' data-hari='<?= $valueHari ?>' data-jadwal='<?= json_encode($dataJadwalKelas[0]) ?>' data-request='<?= $dataJadwalKelas[0]->request ?>' style="background-color: <?= $guru_color ?> ;">
                                                <div>
                                                    <?= '(' . $dataJadwalKelas[0]->id_guru . ') ' .  getkodeMapel($mapel, $dataJadwalKelas[0]->id_mapel) ?>
                                                </div>
                                            </td>
                                    <?php
                                        } else {
                                            $color = 'blue';
                                            if ($dataJadwalKelas[0]->keterangan == 'kosong') {
                                                $color = 'red';
                                            }
                                            echo "<td style='color: $color ;' data-request='-' data-guru='" . $dataJadwalKelas[0]->id_guru . "' data-kelas='$valueKelas->id_kelas' data-hari='$valueHari' class='penjadwalan first' data-jadwal='" . json_encode($dataJadwalKelas[0]) . "'>" . $dataJadwalKelas[0]->keterangan . "</td>";
                                        }
                                    endforeach; ?>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </td>
                <td>
                    <?php
                    $valueHari = "Kamis";
                    $keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
                    $jumlahSesi = $jadwal[$keyJadwal]->jumlah_sesi;
                    ?>

                    <div>
                        <table class="jadwal">
                            <tr>
                                <td colspan="<?= count($kelas) + 1 ?>">
                                    <?= $valueHari ?>
                                </td>
                            </tr>
                            <tr>
                                <th>+</th>
                                <?php foreach ($kelas as $valueKelas) : ?>
                                    <th><?= $valueKelas->id_kelas ?></th>
                                <?php endforeach; ?>
                            </tr>
                            <?php
                            // print_r($penjadwalan);
                            for ($i = 0; $i < $jumlahSesi; $i++) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <?php
                                    foreach ($kelas as $valueKelas) :
                                        $dataJadwalKelas = filter_jadwal($penjadwalan, $valueHari, $valueKelas->id_kelas, $i);
                                        if ($dataJadwalKelas[0]->id_guru !== null) {
                                            $guru_color = '';
                                            if ($guru != null) {
                                                if ($guru['id_guru'] == $dataJadwalKelas[0]->id_guru) {
                                                    $guru_color = $dataJadwalKelas[0]->warna_guru;
                                                }
                                            } else {
                                                $guru_color = $dataJadwalKelas[0]->warna_guru;
                                            }
                                    ?>
                                            <td id="<?= $dataJadwalKelas[0]->id_penjadwalan ?>" class='penjadwalan first' data-kelas='<?= $valueKelas->id_kelas ?>' data-hari='<?= $valueHari ?>' data-jadwal='<?= json_encode($dataJadwalKelas[0]) ?>' data-request='<?= $dataJadwalKelas[0]->request ?>' style="background-color: <?= $guru_color ?> ;">
                                                <div>
                                                    <?= '(' . $dataJadwalKelas[0]->id_guru . ') ' .  getkodeMapel($mapel, $dataJadwalKelas[0]->id_mapel) ?>
                                                </div>
                                            </td>
                                    <?php
                                        } else {
                                            $color = 'blue';
                                            if ($dataJadwalKelas[0]->keterangan == 'kosong') {
                                                $color = 'red';
                                            }
                                            echo "<td style='color: $color ;' data-request='-' data-guru='" . $dataJadwalKelas[0]->id_guru . "' data-kelas='$valueKelas->id_kelas' data-hari='$valueHari' class='penjadwalan first' data-jadwal='" . json_encode($dataJadwalKelas[0]) . "'>" . $dataJadwalKelas[0]->keterangan . "</td>";
                                        }
                                    endforeach; ?>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $valueHari = "Jum`at";
                    $keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
                    $jumlahSesi = $jadwal[$keyJadwal]->jumlah_sesi;
                    ?>

                    <div>
                        <table class="jadwal">
                            <tr>
                                <td colspan="<?= count($kelas) + 1 ?>">
                                    <?= $valueHari ?>
                                </td>
                            </tr>
                            <tr>
                                <th>+</th>
                                <?php foreach ($kelas as $valueKelas) : ?>
                                    <th><?= $valueKelas->id_kelas ?></th>
                                <?php endforeach; ?>
                            </tr>
                            <?php
                            // print_r($penjadwalan);
                            for ($i = 0; $i < $jumlahSesi; $i++) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <?php
                                    foreach ($kelas as $valueKelas) :
                                        $dataJadwalKelas = filter_jadwal($penjadwalan, $valueHari, $valueKelas->id_kelas, $i);
                                        if ($dataJadwalKelas[0]->id_guru !== null) {
                                            $guru_color = '';
                                            if ($guru != null) {
                                                if ($guru['id_guru'] == $dataJadwalKelas[0]->id_guru) {
                                                    $guru_color = $dataJadwalKelas[0]->warna_guru;
                                                }
                                            } else {
                                                $guru_color = $dataJadwalKelas[0]->warna_guru;
                                            }
                                    ?>
                                            <td id="<?= $dataJadwalKelas[0]->id_penjadwalan ?>" class='penjadwalan first' data-kelas='<?= $valueKelas->id_kelas ?>' data-hari='<?= $valueHari ?>' data-jadwal='<?= json_encode($dataJadwalKelas[0]) ?>' data-request='<?= $dataJadwalKelas[0]->request ?>' style="background-color: <?= $guru_color ?> ;">
                                                <div>
                                                    <?= '(' . $dataJadwalKelas[0]->id_guru . ') ' .  getkodeMapel($mapel, $dataJadwalKelas[0]->id_mapel) ?>
                                                </div>
                                            </td>
                                    <?php
                                        } else {
                                            $color = 'blue';
                                            if ($dataJadwalKelas[0]->keterangan == 'kosong') {
                                                $color = 'red';
                                            }
                                            echo "<td style='color: $color ;' data-request='-' data-guru='" . $dataJadwalKelas[0]->id_guru . "' data-kelas='$valueKelas->id_kelas' data-hari='$valueHari' class='penjadwalan first' data-jadwal='" . json_encode($dataJadwalKelas[0]) . "'>" . $dataJadwalKelas[0]->keterangan . "</td>";
                                        }
                                    endforeach; ?>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </td>
                <td>
                    <?php
                    $valueHari = "Sabtu";
                    $keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
                    $jumlahSesi = $jadwal[$keyJadwal]->jumlah_sesi;
                    ?>

                    <div>
                        <table class="jadwal">
                            <tr>
                                <td colspan="<?= count($kelas) + 1 ?>">
                                    <?= $valueHari ?>
                                </td>
                            </tr>
                            <tr>
                                <th>+</th>
                                <?php foreach ($kelas as $valueKelas) : ?>
                                    <th><?= $valueKelas->id_kelas ?></th>
                                <?php endforeach; ?>
                            </tr>
                            <?php
                            // print_r($penjadwalan);
                            for ($i = 0; $i < $jumlahSesi; $i++) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <?php
                                    foreach ($kelas as $valueKelas) :
                                        $dataJadwalKelas = filter_jadwal($penjadwalan, $valueHari, $valueKelas->id_kelas, $i);
                                        if ($dataJadwalKelas[0]->id_guru !== null) {
                                            $guru_color = '';
                                            if ($guru != null) {
                                                if ($guru['id_guru'] == $dataJadwalKelas[0]->id_guru) {
                                                    $guru_color = $dataJadwalKelas[0]->warna_guru;
                                                }
                                            } else {
                                                $guru_color = $dataJadwalKelas[0]->warna_guru;
                                            }
                                    ?>
                                            <td id="<?= $dataJadwalKelas[0]->id_penjadwalan ?>" class='penjadwalan first' data-kelas='<?= $valueKelas->id_kelas ?>' data-hari='<?= $valueHari ?>' data-jadwal='<?= json_encode($dataJadwalKelas[0]) ?>' data-request='<?= $dataJadwalKelas[0]->request ?>' style="background-color: <?= $guru_color ?> ;">
                                                <div>
                                                    <?= '(' . $dataJadwalKelas[0]->id_guru . ') ' .  getkodeMapel($mapel, $dataJadwalKelas[0]->id_mapel) ?>
                                                </div>
                                            </td>
                                    <?php
                                        } else {
                                            $color = 'blue';
                                            if ($dataJadwalKelas[0]->keterangan == 'kosong') {
                                                $color = 'red';
                                            }
                                            echo "<td style='color: $color ;' data-request='-' data-guru='" . $dataJadwalKelas[0]->id_guru . "' data-kelas='$valueKelas->id_kelas' data-hari='$valueHari' class='penjadwalan first' data-jadwal='" . json_encode($dataJadwalKelas[0]) . "'>" . $dataJadwalKelas[0]->keterangan . "</td>";
                                        }
                                    endforeach; ?>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </td>
            </tr>
        </table>

    </page>

</body>

</html>
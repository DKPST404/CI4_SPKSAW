<?php 
    // dd(byNamaKriteria('penghasilan orang tua')['bobot_kriteria'])
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>No</td>
                <td>nama siswa</td>
                <td>kelas siswa</td>
                <td>alamat siswa</td>
                <td>periode</td>
                <td>tanggungan orang tua</td>
                <td>penghasilan orang tua</td>
                <td>kehadiran</td>
                <td>nilai_rapot</td>
                <td>peringkat</td>
                <td>Hasil</td>
            </tr>
        </thead>
        <tbody>
            <!-- if = (?) else (:) -->
            <?php foreach($data as $value):?>
            <tr>
                <td></td>
                <td><?= $value['nama_siswa']; ?></td>
                <td><?= $value['kelas_siswa']; ?></td>
                <td><?= $value['alamat_siswa']; ?></td>
                <td><?= $value['periode']; ?></td>
                <td>
                    <?= hitungByKriteria('Tanggungan Orang Tua', $value['tanggungan_orang_tua'], $data) ?>
                </td>
                <td>
                    <?= hitungByKriteria('Penghasilan Orang Tua', $value['penghasilan_orang_tua'], $data) ?>
                </td>
                <td>
                    <?= hitungByKriteria('Nilai Kehadiran', $value['nilai_kehadiran'], $data) ?>
                </td>
                <td>
                    <?= hitungByKriteria('Nilai Rata-rata rapot', $value['nilai_rata-rata_rapot'], $data) ?>
                </td>
                <td>
                    <?= hitungByKriteria('Peringkat kelas', $value['peringkat_kelas'], $data) ?>
                </td>
                <td>
                    <?= hitungHasil([
                        array_keys($value)[6] => hitungByKriteria('Tanggungan Orang Tua', $value['tanggungan_orang_tua'], $data),
                        array_keys($value)[7] => hitungByKriteria('Penghasilan Orang Tua', $value['penghasilan_orang_tua'], $data),
                        array_keys($value)[8] => hitungByKriteria('Nilai Kehadiran', $value['nilai_kehadiran'], $data),
                        array_keys($value)[9] => hitungByKriteria('Nilai Rata-rata rapot', $value['nilai_rata-rata_rapot'], $data),
                        array_keys($value)[10] => hitungByKriteria('Peringkat kelas', $value['peringkat_kelas'], $data)
                    ]) ?>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>
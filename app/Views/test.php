<?php 

    // $min_max_data = [
    //     'penghasilan_orangtua' => [
    //         'min' => min(array_column($data, 'penghasilan_orang_tua')),
    //         'max' => max(array_column($data, 'penghasilan_orang_tua'))
    //     ],
    //     'nilai_kehadiran' => [
    //         'min' => min(array_column($data, 'nilai_kehadiran')),
    //         'max' => max(array_column($data, 'nilai_kehadiran'))
    //     ],
    //     'nilai_rapot' => [
    //         'min' => min(array_column($data, 'nilai_rapot')),
    //         'max' => max(array_column($data, 'nilai_rapot'))
    //     ],
    //     'peringkat' => [
    //         'min' => min(array_column($data, 'peringkat')),
    //         'max' => max(array_column($data, 'peringkat'))
    //     ]
    // ];

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
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $value):?>

            <tr>
                <td></td>
                <td><?= $value['nama_siswa']; ?></td>
                <td><?= $value['kelas_siswa']; ?></td>
                <td><?= $value['alamat_siswa']; ?></td>
                <td><?= $value['periode']; ?></td>
                <td><?= number_format($value['tanggungan_orang_tua'] / max(array_column($data, 'tanggungan_orang_tua')), 6) ?></td>
                <td><?= number_format($value['penghasilan_orang_tua'] / min(array_column($data, 'penghasilan_orang_tua')), 6) ?></td>
                <td><?= number_format($value['nilai_kehadiran'] / max(array_column($data, 'nilai_kehadiran')), 6) ?></td>
                <td><?= number_format($value['nilai_rapot'] / max(array_column($data, 'nilai_rapot')), 6) ?></td>
                <td><?= number_format($value['peringkat'] / max(array_column($data, 'peringkat')), 6) ?></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>
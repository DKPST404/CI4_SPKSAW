<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        * {
            font-family: 'Times New Roman', arial;
            font-size: 12pt;
        }

        .justified {
            text-align: justify;
            text-justify: inter-word;
        }

        /* print remove margin */
        @page {
            size: auto;
            margin: 0mm;
        }

        @media print {
            body {
                padding: 1cm 1.2cm;
            }
        }
    </style>
    <?php
    $tanggal = date('Y-m-d');
    date('d F Y', strtotime($tanggal));

    function tglIndonesia($tgl)
    {
        $nama_bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tgl);
        return $pecahkan[2] . ' ' . $nama_bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
    ?>
</head>

<body>
    <div class="container-fluid">
        <!-- KOP -->
        <div class="row flex justify-content-center align-items-center">
            <div class="col-2 text-center">
                <img src="<?= base_url('assets/img/smansi.png') ?>" alt="logo" width="100px">
            </div>
            <div class="col-10 px-5">
                <h5 class="text-center mb-0">
                    PEMERINTAH PROVINSI JAWA TENGAH <br>
                    DINAS PENDIDIKAN DAN KEBUDAYAAN
                </h5>
                <h5 class="text-center fw-bold mb-0">
                    SEKOLAH MENENGAH ATAS NEGERI 1 KESESI
                </h5>
                <center>
                    <p class="text-xs mb-0 fw-bold">Jl. Raya Kaibahan Kesesi Telp. (0285) 4483086 Kab. Pekalongan - 51162</p>
                    <p class="text-xs mb-0">Website : www.sman1kesesi.sch.id  email : smakesesipekalongan@gmail.com</p>
                </center>
            </div>
        </div>
        <!-- separator -->
        <hr style="border: 1.5px solid #333; margin-top: 0.3cm; margin-bottom: 0.3cm;">
        <!-- body -->
        <div class="text-center">
            <h5 class="fw-bold">
                SURAT KETERANGAN
            </h5>
        </div>
        <div class="mt-1">
            <p class="mb-1">
                Yang bertanda tangan dibawah ini :
            </p>
            <table class="table table-borderless table-sm">
                <tr>
                    <th>Nama</th>
                    <td>:</td>
                    <td>Drs. Eko Supriyanto M.Pd </td>
                </tr>
                <tr>
                    <th>NIP</th>
                    <td>:</td>
                    <td>19650109 199203 1 006 </td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>:</td>
                    <td>Kepala Sekolah </td>
                </tr>
                <tr>
                    <th>Nama Satuan pendidikan</th>
                    <td>:</td>
                    <td>SMA Negeri 1 Kesesi </td>
                </tr>
            </table>
            <p class="justified">
                Dengan ini menerangkan bahwa nama-nama tersebut dibawah ini, adalah benar peserta didik SMA Negeri 1 Kesesi dan yang bersangkutan sebagai penerima bantuan BSM Tahun 2023 :
            </p>
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>No. Rek</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 1; $i < 10; $i++) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= "Nama " . $i; ?></td>
                            <td><?= "KELAS " . $i; ?></td>
                            <td>4832908392</td>
                            <td>Rp. 1.000.000,-</td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
            <p class="justified">
                Dengan ini menerangkan bahwa nama-nama tersebut dibawah ini, adalah benar peserta didik SMA Negeri 1 Kesesi dan yang bersangkutan sebagai penerima bantuan BSM Tahun 2023 :
            </p>
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <p class="text-center">
                        Kesesi, <?= tglIndonesia($tanggal)?> <br>
                        Kepala Sekolah
                    </p>
                    <br>
                    <br>
                    <br>
                    <p class="text-center fw-bold">
                        Drs. Eko Supriyanto M.Pd
                    </p>
                    <p class="text-center">
                        NIP. 19650109 199203 1 006
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // print
        window.print();
    </script>
</body>

</html>
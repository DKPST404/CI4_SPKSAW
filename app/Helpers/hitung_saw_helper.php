<?php

    // function hitungByKriteria($nama_kriteria, $nilai_kriteria, $data)
    // {
    //     $km = new \App\Models\M_kriteria();
    //     $k = $km->where('nama_kriteria', $nama_kriteria)->first();

    //     if ($k['jenis_kriteria'] == 'benefit') {
    //         $hasil = number_format($nilai_kriteria / max(array_column($data, strtolower(str_replace(' ', '_', $k['nama_kriteria'])))), 6);
    //     } else {
    //         $hasil = number_format(min(array_column($data, strtolower(str_replace(' ', '_', $k['nama_kriteria'])))) / $nilai_kriteria, 6);
    //     }

    //     return $hasil;
    // }

    // function hitungHasil($cb = [])
    // {
    //     $km = new \App\Models\M_kriteria();

    //     $hasil = 0;
    //     foreach($cb as $key => $value) {
    //         $k = $km->where('nama_kriteria', str_replace("_", " ", $key))->first();
    //         $hasil += ($value * $k['bobot_kriteria']) / 100;
    //     }

    //     return $hasil;
    // }

    function hitung($nis)
    {
        $sm = new \App\Models\M_siswa();
        $km = new \App\Models\M_kriteria();
        $pm = new \App\Models\M_Perhitungan();

        $siswa = $sm->where('nis_siswa', $nis)->first();
        $perhitungan = $pm->where('id_siswa', $siswa['id_siswa'])->findAll();

        $data = $pm->select('nilai_kriteria')->where('id_siswa', $siswa['id_siswa'])->findAll();
        $hitung = [];
        foreach ($perhitungan as $key => $value) {
            $tipe = $km->select('jenis_kriteria')->where('id_kriteria', $value['id_kriteria'])->first();
            
            if ($tipe['jenis_kriteria'] == 'benefit') {
                $hitung[$value['id_kriteria']] = $value['nilai_kriteria'] / max(array_column($data, 'nilai_kriteria'));
            } else {
                $hitung[$value['id_kriteria']] = min(array_column($data, 'nilai_kriteria')) / $value['nilai_kriteria'];
            }
        }
        
        $hasil = 0;
        foreach($hitung as $key => $value) {
            $k = $km->where('id_kriteria', $key)->first();
            $hasil += ($value * $k['bobot_kriteria']) / 100;
        }
        
        return number_format($hasil, 6);        
    }
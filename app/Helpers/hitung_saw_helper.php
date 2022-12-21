<?php

    function hitungByKriteria($nama_kriteria, $nilai_kriteria, $data)
    {
        $km = new \App\Models\M_kriteria();
        $k = $km->where('nama_kriteria', $nama_kriteria)->first();

        if ($k['jenis_kriteria'] == 'benefit') {
            $hasil = number_format($nilai_kriteria / max(array_column($data, strtolower(str_replace(' ', '_', $k['nama_kriteria'])))), 6);
        } else {
            $hasil = number_format(min(array_column($data, strtolower(str_replace(' ', '_', $k['nama_kriteria'])))) / $nilai_kriteria, 6);
        }

        return $hasil;
    }

    function hitungHasil($cb = [])
    {
        $km = new \App\Models\M_kriteria();

        $hasil = 0;
        foreach($cb as $key => $value) {
            $k = $km->where('nama_kriteria', str_replace("_", " ", $key))->first();
            $hasil += ($value * $k['bobot_kriteria']) / 100;
        }

        return $hasil;
    }
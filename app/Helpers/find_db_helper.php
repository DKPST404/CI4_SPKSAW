<?php 

    function byNamaKriteria($nama_kriteria)
    {
        $kriteria = new \App\Models\M_kriteria();
        $data = $kriteria->where('nama_kriteria', $nama_kriteria)->first();
        return $data;
    }
<?php

namespace App\Controllers;

class perhitungan extends BaseController
{
    public function __construct()
    {
        $this->M_siswa = new \App\Models\M_siswa();
        $this->M_kriteria = new \App\Models\M_kriteria();
        // Load the helper
        helper('url');
    }
    public function index()
    {
        $data = [
            'title' => 'Perhitungan',
            'slug' =>  "Data Perhitungan",
            'kriteria' => $this->M_kriteria->findAll(),
            'siswa' => $this->M_siswa->findAll(),
        ];
        // dd($data);
        return view('perhitungan', $data);
    }
}
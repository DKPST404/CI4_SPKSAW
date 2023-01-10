<?php

namespace App\Controllers;

class kriteria extends BaseController
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
            'title' => 'Data Kriteria',
            'slug' =>  "Kriteria",
            'kriteria' => $this->M_kriteria->findAll(),
        ];
        // dd($data);
        return view('kriteria', $data);
    }

    public function input_kriteria()
    {
        // get column bobot_kriteria
        $bobot = $this->M_kriteria->select('bobot_kriteria')->findAll();
        foreach ($bobot as $key => $value) {
            $bobot[$key] = $value['bobot_kriteria'];
        }

        $data = [
            'title' => 'Input Data Kriteria',
            'slug' =>  "Input Data Kriteria",
            'bobot' => $bobot
        ];
        // dd($data);
        return view('input_kriteria', $data);
    }
}
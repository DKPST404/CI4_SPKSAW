<?php

namespace App\Controllers;

class Home extends BaseController
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
            'title' => 'Home',
            'siswa' => $this->M_siswa->get_data()
        ];
        // dd($data);
        return view('index', $data);
    }

    public function debug(){
        $data =[
            'data' => $this->M_siswa->findAll(),
        ];
        return view('test', $data);
    }
    public function siswa(){
        $data = [
            'title' => 'Data Siswa',
            'siswa' => $this->M_siswa->findAll(),
        ];
        // dd($data);
        return view('siswa', $data);
    }
    public function kriteria(){
        $data = [
            'title' => 'Data Kriteria',
            'kriteria' => $this->M_kriteria->findAll(),
        ];
        // dd($data);
        return view('kriteria', $data);
    }
}

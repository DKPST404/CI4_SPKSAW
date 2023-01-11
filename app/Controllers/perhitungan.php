<?php

namespace App\Controllers;

class perhitungan extends BaseController
{
    protected $M_siswa;
    protected $M_kriteria;
    
    public function __construct()
    {
        $this->M_siswa = new \App\Models\M_siswa();
        $this->M_kriteria = new \App\Models\M_kriteria();
        // Load the helper
        helper('url');
    }
    public function index()
    {
        if(!isset($_SESSION['verify_login'])){
            return redirect()->to(base_url('/login'));
        } else {
            if (!session()->get('verify_login')) {
                return redirect()->to(base_url('/login'));
            }
        }
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
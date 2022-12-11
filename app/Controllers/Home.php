<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        $this->M_siswa = new \App\Models\M_siswa();
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
            'tertinggi'=> $this->M_siswa->penghasilan_orangtua_tertinggi(),
            'data' => $this->M_siswa->findAll(),
        ];
        return view('test', $data);
    }
}

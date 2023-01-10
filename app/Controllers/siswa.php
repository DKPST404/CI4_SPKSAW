<?php

namespace App\Controllers;

class siswa extends BaseController
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
            'title' => 'Data Siswa',
            'slug' =>  "Data Siswa",
            'siswa' => $this->M_siswa->findAll(),
        ];
        // dd($data);
        return view('siswa', $data);
    }
    public function addsiswa()
    {
        $data = [
            'slug' =>  "Tambah Data",
            'nis_siswa'      => $this->request->getPost('nis_siswa'),
            'nama_siswa'     => $this->request->getPost('nama_siswa'),
            'kelas_siswa'    => $this->request->getPost('kelas_siswa'),
            'alamat_siswa'   => $this->request->getPost('alamat_siswa'),
            'periode'        => $this->request->getPost('periode')

        ];
        // dd($data);
        return view('input_siswa', $data);
    }
}
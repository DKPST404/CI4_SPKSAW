<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $M_siswa;
    protected $M_kriteria;
    
    public function __construct()
    {

        $this->M_siswa = new \App\Models\M_siswa();
        $this->M_kriteria = new \App\Models\M_kriteria();
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
            'title' => 'Home',
            'slug' =>  "Dashboard",
            'siswa' => $this->M_siswa->get_data()
        ];
        // dd($data);
        return view('index', $data);
    }

    // public function debug()
    // {
    //     $data = [
    //         'slug' =>  "Debug Test",
    //         'data' => $this->M_siswa->findAll(),
    //     ];
    //     // dd($data);
    //     return view('test', $data);
    // }
    // public function siswa()
    // {
    //     $data = [
    //         'title' => 'Data Siswa',
    //         'slug' =>  "Data Siswa",
    //         'siswa' => $this->M_siswa->findAll(),
    //     ];
    //     // dd($data);
    //     return view('siswa', $data);
    // }
    // public function kriteria()
    // {
    //     $data = [
    //         'title' => 'Data Kriteria',
    //         'slug' =>  "Kriteria",
    //         'kriteria' => $this->M_kriteria->findAll(),
    //     ];
    //     // dd($data);
    //     return view('kriteria', $data);
    // }
    // public function perhitungan()
    // {
    //     $data = [
    //         'title' => 'Perhitungan',
    //         'slug' =>  "Perhitungan",
    //         'kriteria' => $this->M_kriteria->findAll(),
    //         'siswa' => $this->M_siswa->findAll(),
    //     ];
    //     // dd($data);
    //     return view('perhitungan', $data);
    // }
    // public function input_kriteria()
    // {
    //     // get column bobot_kriteria
    //     $bobot = $this->M_kriteria->select('bobot_kriteria')->findAll();
    //     foreach ($bobot as $key => $value) {
    //         $bobot[$key] = $value['bobot_kriteria'];
    //     }

    //     $data = [
    //         'title' => 'Input Data Kriteria',
    //         'slug' =>  "Input Data Kriteria",
    //         'bobot' => $bobot
    //     ];
    //     // dd($data);
    //     return view('input_kriteria', $data);
    // }
    // public function addsiswa()
    // {
    //     $data = [
    //         'slug' =>  "Tambah Data",
    //         'nis_siswa'      => $this->request->getPost('nis_siswa'),
    //         'nama_siswa'     => $this->request->getPost('nama_siswa'),
    //         'kelas_siswa'    => $this->request->getPost('kelas_siswa'),
    //         'alamat_siswa'   => $this->request->getPost('alamat_siswa'),
    //         'periode'        => $this->request->getPost('periode')

    //     ];
    //     // dd($data);
    //     return view('input_siswa', $data);
    // }
}

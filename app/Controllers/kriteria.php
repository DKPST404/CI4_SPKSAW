<?php

namespace App\Controllers;

class Kriteria extends BaseController
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
            'title' => 'Kriteria',
            'slug' =>  " Data Kriteria",
            'kriteria' => $this->M_kriteria->findAll(),
        ];
        // dd($data);
        return view('kriteria', $data);
    }

    public function add()
    {
        if(!isset($_SESSION['verify_login'])){
            return redirect()->to(base_url('/login'));
        } else {
            if (!session()->get('verify_login')) {
                return redirect()->to(base_url('/login'));
            }
        }
        // get column bobot_kriteria
        $bobot = $this->M_kriteria->select('bobot_kriteria')->where('status_kriteria', 'aktif')->findAll();
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
    public function save()
    {
        $data = [
            'slug'           =>  "Tambah Data",
            'nama_kriteria'  => $this->request->getPost('nama_kriteria'),
            'bobot_kriteria' => $this->request->getPost('bobot_kriteria'),
            'atribut'        => $this->request->getPost('atribut'),
            'nilai_kriteria' => $this->request->getPost('nilai_kriteria'),
        ];
        // dd($data);
        $this->M_kriteria->insert($data);
        return redirect()->to('/kriteria');
    }
    
    public function edit()
    {
        if(!isset($_SESSION['verify_login'])){
            return redirect()->to(base_url('/login'));
        } else {
            if (!session()->get('verify_login')) {
                return redirect()->to(base_url('/login'));
            }
        }
        $id = $this->request->uri->getSegment(3);
        $data = [
            'title' => 'Edit Kriteria',
            'slug' =>  "Edit Data Kriteria",
            'kriteria' => $this->M_kriteria->where('id_kriteria', $id)->first(),
        ];
        // dd($data);
        return view('edit_kriteria', $data);
    }
    public function editKriteria()
    {
        $id = $this->request->getPost('id_kriteria');
        $data = [
            'slug'           =>  "Edit Data",
            'nama_kriteria'  => $this->request->getPost('nama_kriteria'),
            'bobot_kriteria' => $this->request->getPost('bobot_kriteria'),
            'jenis_kriteria' => $this->request->getPost('jenis_kriteria'),
            'status_kriteria' => $this->request->getPost('status_kriteria'),
        ];
        // dd($data);
        $this->M_kriteria->update($id, $data);
        return redirect()->to('/kriteria');
    }
}

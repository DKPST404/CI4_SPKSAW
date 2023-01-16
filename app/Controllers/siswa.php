<?php

namespace App\Controllers;

class siswa extends BaseController
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
            'title' => 'Siswa',
            'slug' =>  "Data Siswa",
            'siswa' => $this->M_siswa->findAll(),
        ];
        // dd($data);
        return view('siswa', $data);
    }
    public function add()
    {
        // $data = [
        //     'slug'           =>  "Tambah Data",
        //     'nis_siswa'      => $this->request->getPost('nis_siswa'),
        //     'nama_siswa'     => $this->request->getPost('nama_siswa'),
        //     'kelas_siswa'    => $this->request->getPost('kelas_siswa'),
        //     'alamat_siswa'   => $this->request->getPost('alamat_siswa'),
        //     'periode'        => $this->request->getPost('periode')
        // ];

        // dd($data);

        $kriteria = $this->M_kriteria->findAll();
        return view('input_siswa', [
            'title' => 'Input Data Siswa',
            'slug' =>  "Input Data Siswa",
            'kriteria' => $kriteria
        ]);
    }

    public function save()
    {
        $data = [
            'nis_siswa'      => $this->request->getPost('nis_siswa'),
            'nama_siswa'     => $this->request->getPost('nama_siswa'),
            'kelas_siswa'    => $this->request->getPost('kelas_siswa'),
            'alamat_siswa'   => $this->request->getPost('alamat_siswa'),
            'periode'        => $this->request->getPost('periode')

        ];
        // dd($_POST);
        $validasi_nis = $this->M_siswa->where('nis_siswa', $data['nis_siswa'])->first();

        if ($validasi_nis) {
            session()->setFlashdata('pesan', 'NIS Sudah Tersedia.');
            return redirect()->to('/siswa/add');
        }
        $this->M_siswa->insert($data);
        return redirect()->to('/siswa');
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
            'title' => 'Edit Siswa',
            'slug' =>  "Edit Data Siswa",
            'siswa' => $this->M_siswa->where('id_siswa', $id)->first(),
            'kriteria' => $this->M_kriteria->findAll(),
        ];
        // dd($data);
        return view('edit_siswa', $data);
    }
    public function editSiswa()
    {
        $id = $this->request->uri->getSegment(3);
        $data = [
            'slug'           =>  "Edit Data",
            'nis_siswa'      => $this->request->getPost('nis_siswa'),
            'nama_siswa'     => $this->request->getPost('nama_siswa'),
            'kelas_siswa'    => $this->request->getPost('kelas_siswa'),
            'alamat_siswa'   => $this->request->getPost('alamat_siswa'),
            'periode'        => $this->request->getPost('periode')
        ];
        // dd($data);
        $this->M_siswa->update($id, $data);
        return redirect()->to('/siswa');
    }

    public function delete()
    {
        $id = $this->request->uri->getSegment(3);
        $this->M_siswa->delete($id);
        return redirect()->to('/siswa');
    }
}
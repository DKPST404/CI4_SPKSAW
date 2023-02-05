<?php

namespace App\Controllers;

class siswa extends BaseController
{
    protected $M_siswa;
    protected $M_kriteria;
    protected $M_Perhitungan;
    
    public function __construct()
    {
        $this->M_siswa = new \App\Models\M_siswa();
        $this->M_kriteria = new \App\Models\M_kriteria();
        $this->M_Perhitungan = new \App\Models\M_Perhitungan();
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

        $kriteria = $this->M_kriteria->where('status_kriteria', 'aktif')->findAll();
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
            'periode'        => $this->request->getPost('periode'),
        ];

        $validasi_nis = $this->M_siswa->where('nis_siswa', $data['nis_siswa'])->first();

        if ($validasi_nis) {
            session()->setFlashdata('pesan', 'NIS Sudah Tersedia.');
            return redirect()->to('/siswa/add');
        }

        
        if ($this->M_siswa->insert($data)) {
            $s = $this->M_siswa->where('nis_siswa', $data['nis_siswa'])->first();
            foreach($this->request->getPost('kriteria_siswa') as $key => $kriteria){
                $dk = [
                    'id_siswa' => $s['id_siswa'],
                    'id_kriteria' => $key,
                    'nilai_kriteria' => $kriteria
                ];
                $this->M_Perhitungan->insert($dk);
            }
        }
        
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
            'id_siswa'  => $id,
            'siswa' => $this->M_siswa->where('id_siswa', $id)->first(),
            'kriteria' => $this->M_kriteria->where('status_kriteria', 'aktif')->findAll(),
            'kriteria_value' => $this->M_Perhitungan->where('id_siswa', $id)->findAll()
        ];
        // dd($data);
        return view('edit_siswa', $data);
    }

    public function editSiswa()
    {
        $id = $this->request->getPost('id_siswa');
        $data = [
            'slug'           =>  "Edit Data",
            'id_siswa'       => $this->request->getPost('id_siswa'),
            'nis_siswa'      => $this->request->getPost('nis_siswa'),
            'nama_siswa'     => $this->request->getPost('nama_siswa'),
            'kelas_siswa'    => $this->request->getPost('kelas_siswa'),
            'alamat_siswa'   => $this->request->getPost('alamat_siswa'),
            'periode'        => $this->request->getPost('periode')
        ];

        if($this->M_siswa->update($id, $data)) {
            foreach($this->request->getPost('kriteria_siswa') as $key => $kriteria){
                // id_perhitungan
                $idp = $this->M_Perhitungan->select('id_perhitungan')->where('id_siswa', $id)->where('id_kriteria', $key)->first();
                
                if ($idp == null) {
                    $idp = [
                        'id_siswa' => $id,
                        'id_kriteria' => $key,
                        'nilai_kriteria' => $kriteria
                    ];
                    $this->M_Perhitungan->insert($idp);
                    continue;
                } 

                $dk = [
                    'id_siswa' => $id,
                    'id_kriteria' => $key,
                    'nilai_kriteria' => $kriteria
                ];

                $this->M_Perhitungan->update($idp['id_perhitungan'], $dk);
            }
        }

        return redirect()->to('/siswa');
    }

    public function delete()
    {
        $id = $this->request->uri->getSegment(3);
        $this->M_siswa->delete($id);
        return redirect()->to('/siswa');
    }
}
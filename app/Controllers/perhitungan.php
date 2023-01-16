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

        $bobot = [];
        $bk = $this->M_kriteria->select('bobot_kriteria')->where('status_kriteria', 'aktif')->findAll();
        foreach ($bk as $key => $value) {
            $bobot[] = $value['bobot_kriteria'];
        }

        if($this->request->getMethod() == 'post'){
            $periode = $this->request->getPost('periode');
            $jml = $this->request->getPost('jml');
            if ($periode == null && $jml == null) {
                return redirect()->to(base_url('/perhitungan'));
            } else {
                $data = [
                    'title' => 'Perhitungan',
                    'slug' =>  "Data Perhitungan",
                    'kriteria' => $this->M_kriteria->findAll(),
                    'siswa' => $this->M_siswa->where('periode', $periode)->findAll(),
                    'periode' => $this->M_siswa->select('periode')->groupBy('periode')->findAll(),
                    'bobot' => $bobot,
                    'selected_periode' => $periode,
                    'selected_jml' => $jml,
                ];
                return view('perhitungan', $data);
            }
        } else {   
            $data = [
                'title' => 'Perhitungan',
                'slug' =>  "Data Perhitungan",
                'kriteria' => $this->M_kriteria->findAll(),
                'periode' => $this->M_siswa->select('periode')->groupBy('periode')->findAll(),
                'bobot' => $bobot,
                'siswa' => null,
            ];
            // dd($data);
            return view('perhitungan', $data);
        }
    }
}
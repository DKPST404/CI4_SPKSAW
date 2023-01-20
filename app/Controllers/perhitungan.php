<?php

namespace App\Controllers;

class perhitungan extends BaseController
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

        $ambilBobot = $this->M_kriteria->selectSum('bobot_kriteria')->where('status_kriteria', 'aktif')->findAll();
        $data = [
            'title'             => 'Perhitungan',
            'slug'              => 'Perhitungan',
            'cek_bobot'         => $ambilBobot,
            'periode'           => $this->M_siswa->select('periode')->groupBy('periode')->findAll(),
            'data_perhitungan'  => [],
        ];

        return view('perhitungan', $data);

        // $bobot = [];
        // $bk = $this->M_kriteria->select('bobot_kriteria')->where('status_kriteria', 'aktif')->findAll();
        // foreach ($bk as $key => $value) {
        //     $bobot[] = $value['bobot_kriteria'];
        // }

        // $data = [
        //     'title' => 'Perhitungan',
        //     'slug' =>  "Data Perhitungan",
        //     'kriteria' => $this->M_kriteria->findAll(),
        //     'periode' => $this->M_siswa->select('periode')->groupBy('periode')->findAll(),
        //     'bobot' => $bobot,
        //     'siswa' => null,
        // ];
        // // dd($data);
        // return view('perhitungan', $data);
    }

    public function filter()
    {
        if (!session()->get('verify_login')) {
            return redirect()->to(base_url('/login'));
        }

        $tahun = $this->request->getGet('periode');
        $ambilBobot = $this->M_kriteria->selectSum('bobot_kriteria')->where('status_kriteria', 'aktif')->get();

        $rumus_kriteria    = [];
        $hasil_perhitungan = [];

        $data_kriteria = $this->M_Perhitungan->select("kriteria.id_kriteria, if(kriteria.jenis_kriteria = 'benefit', max(nilai_kriteria), min(nilai_kriteria)) as hasil")
            ->join('kriteria', 'perhitungan.id_kriteria = kriteria.id_kriteria')
            ->join('datasiswa', 'perhitungan.id_siswa = datasiswa.id_siswa')
            ->where('datasiswa.periode', $tahun)
            ->groupBy('perhitungan.id_kriteria')
            ->get();

        foreach ($data_kriteria->getResult() as $kriteria) {
            $rumus_kriteria[$kriteria->id_kriteria] = $kriteria->hasil;
        }

        $data_siswa_ke_kriteria = $this->M_Perhitungan->join('kriteria', 'perhitungan.id_kriteria = kriteria.id_kriteria')
            ->join('datasiswa', 'perhitungan.id_siswa = datasiswa.id_siswa')
            ->where('datasiswa.periode', $tahun)
            ->get();

        foreach ($data_siswa_ke_kriteria->getResult() as $value) {
            if ($rumus_kriteria[$value->id_kriteria] > 0) {
                if ($value->jenis_kriteria == 'benefit') {
                    $perhitungan[$value->id_siswa][$value->id_kriteria] = (
                        ($value->nilai_kriteria / $rumus_kriteria[$value->id_kriteria]) * ($value->bobot_kriteria / 100)
                    );
                } else {
                    $perhitungan[$value->id_siswa][$value->id_kriteria] = (
                        ($rumus_kriteria[$value->id_kriteria] / $value->nilai_kriteria) * ($value->bobot_kriteria / 100)
                    );
                }
            }
        }

        $data_siswa = $this->M_Perhitungan->join('datasiswa', 'perhitungan.id_siswa = datasiswa.id_siswa')
            ->where('datasiswa.periode', $tahun)
            ->groupBy('perhitungan.id_siswa')
            ->get();

        foreach ($data_siswa->getResult() as $value) {
            $hasil_perhitungan[] = [
                'data'  => $value,
                'hasil' => array_sum($perhitungan[$value->id_siswa])
            ];
        }

        usort($hasil_perhitungan, function ($a, $b) {
            return $b['hasil'] > $a['hasil'] ? 1 : -1;
        });
        
        $data = [
            'title'             => 'Perhitungan',
            'slug'              => 'Perhitungan',
            'data_perhitungan'  => $hasil_perhitungan,
            'cek_bobot'         => $ambilBobot->getResultArray(),
            'periode'    => $this->M_siswa->select('periode')->groupBy('periode')->findAll()
        ];

        return view('perhitungan', $data);
    }
}
<?php

namespace App\Controllers;

class Laporan extends BaseController
{
    public function index()
    {
        if (! session()->get('verify_login')) {
            return redirect()->to(base_url('/login'));
        }

        $data = [
            'title' => 'Laporan Hasil Perhitungan',
            'name'  => 'Laporan Hasil Perhitungan',
            'slug'  => 'Laporan'
        ];
        return view('laporan', $data);
    }
}

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
            'title' => 'Laporan',
            'name'  => 'Laporan'
        ];
        return view('laporan/laporan', $data);
    }
}

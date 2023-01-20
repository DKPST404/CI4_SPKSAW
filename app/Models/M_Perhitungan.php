<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Perhitungan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'perhitungan';
    protected $primaryKey       = 'id_perhitungan';
    protected $useAutoIncrement = true;
    protected $insertID         = 1;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_perhitungan', 'id_siswa', 'id_kriteria', 'nilai_kriteria'
    ];
}

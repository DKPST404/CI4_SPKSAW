<?php

namespace App\Models;

use CodeIgniter\Model;

class M_kriteria extends Model
{
    protected $table      = 'kriteria';
    protected $primaryKey = 'id_kriteria';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_kriteria', 'nama_kriteria', 'bobot_kriteria','jenis_kriteria'];
}
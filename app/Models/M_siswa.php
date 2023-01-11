<?php

namespace App\Models;

use CodeIgniter\Model;

class M_siswa extends Model
{
    protected $table      = 'datasiswa';
    protected $primaryKey = 'id_siswa';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_siswa', 'nis_siswa', 'nama_siswa', 'kelas_siswa','alamat_siswa','periode','tanggungan_orang_tua','penghasilan_orang_tua','nilai_kehadiran','nilai_rapot','peringkat'];

    public function penghasilan_orangtua_tertinggi(){
        return $query = $this->db->query("SELECT MAX(penghasilan_orang_tua) FROM datasiswa")->getResultArray();
    }
    public function get_data()
    {
        return $query = $this->db->query("SELECT * FROM datasiswa")->getResultArray();
}
}
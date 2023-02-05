<?php 

    function byNamaKriteria($nama_kriteria)
    {
        $kriteria = new \App\Models\M_kriteria();
        $data = $kriteria->where('nama_kriteria', $nama_kriteria)->first();
        return $data;
    }

    function getKriteriaValue($id_kriteria, $id_siswa)
    {
        $perhitungan = new \App\Models\M_Perhitungan();
        $data = $perhitungan->where(['id_kriteria' => $id_kriteria, 'id_siswa' => $id_siswa])->findAll();
        return $data;
    }

    // check perhitungan dan kriteria, jika ada yang belum diisi maka akan mengembalikan nilai false
    function checkPerhitungan($id_siswa)
    {
        $perhitungan = new \App\Models\M_Perhitungan();
        $kriteria = new \App\Models\M_kriteria();
        $data_kriteria = $kriteria->where('status_kriteria', 'aktif')->findAll();
        $data = [];
        foreach ($data_kriteria as $key => $value) {
            $temp = $perhitungan->where(['id_kriteria' => $value['id_kriteria'], 'id_siswa' => $id_siswa])->first();
            // if temp nilai_kriteria not null
            if (isset($temp['nilai_kriteria']) && !empty($temp['nilai_kriteria'])) {
                array_push($data, $temp);
            }
        }

        if (count($data) == count($data_kriteria)) {
            return true;
        } else {
            return false;
        }
    }
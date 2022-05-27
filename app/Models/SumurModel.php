<?php

namespace App\Models;

use CodeIgniter\Model;

class SumurModel extends Model
{
    protected $table      = 'sumur';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_perusahaan', 'alamat_perusahaan', 'lokasi', 'koordinat', 'nomor_registrasi', 'kegunaan_air', 'jumlah_max', 'kedalaman_bor', 'kedalaman_aquifer', 'kedalaman_pompa', 'foto'];

    public function search($keyword)
    {
        return $this->table('sumur')->like('nama_perusahaan', $keyword)->orLike('alamat_perusahaan', $keyword);
    }

    public function getSumur($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    // ...
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'karyawan';

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->table('karyawan')
                ->join('jabatan', 'jabatan.jabatan_id = karyawan.jabatan_id')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('karyawan')
                ->join('jabatan', 'jabatan.jabatan_id = karyawan.jabatan_id')
                ->where('karyawan.karyawan_id', $id)
                ->get()
                ->getRowArray();
        }
    }
    public function insertData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateData($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['jabatan_id' => $id]);
    }
    public function deleteData($id)
    {
        return $this->db->table($this->table)->delete(['jabatan_id' => $id]);
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarRakModel extends Model
{
	protected $table = 'rak';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('rak')
				->join('karyawan', 'karyawan.karyawan_id = rak.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('rak')
				->join('karyawan', 'karyawan.karyawan_id = rak.karyawan_id')
				->where('rak.rak_id', $id)
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
		return $this->db->table($this->table)->update($data, ['rak_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['rak_id' => $id]);
	}
}

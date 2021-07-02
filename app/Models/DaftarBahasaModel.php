<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarBahasaModel extends Model
{
	protected $table = 'bahasa';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('bahasa')
				->join('karyawan', 'karyawan.karyawan_id = bahasa.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('bahasa')
				->join('karyawan', 'karyawan.karyawan_id = bahasa.karyawan_id')
				->where('bahasa.bahasa_id', $id)
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
		return $this->db->table($this->table)->update($data, ['bahasa_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['bahasa_id' => $id]);
	}
}

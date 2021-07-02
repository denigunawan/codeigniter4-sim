<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarJabatanModel extends Model
{

	protected $table = 'jabatan';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->findAll();
		} else {
			return $this->getWhere(['jabatan_id' => $id]);
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

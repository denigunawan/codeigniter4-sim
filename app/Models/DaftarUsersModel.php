<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarUsersModel extends Model
{
	protected $table = 'user';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->findAll();
		} else {
			return $this->getWhere(['user_id' => $id]);
		}
	}


	public function insertData($data)
	{
		return $this->db->table($this->table)->insert($data);
	}

	public function updateData($data, $id)
	{
		return $this->db->table($this->table)->update($data, ['user_id' => $id]);
	}


	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['user_id' => $id]);
	}
}

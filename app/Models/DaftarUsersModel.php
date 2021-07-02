<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarUsersModel extends Model
{
	protected $table = 'user';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('user')
				->get()
				->getResultArray();
		} else {
			return $this->table('user')
				->where('user.user_id', $id)
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
		return $this->db->table($this->table)->update($data, ['user_id' => $id]);
	}


	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['user_id' => $id]);
	}
}

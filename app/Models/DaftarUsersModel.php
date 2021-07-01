<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarUsersModel extends Model
{
	protected $table = 'user';

	public function getData($user_id = false)
	{
		if ($user_id === false) {
			return $this->table('user')
				->get()
				->getResultArray();
		} else {
			return $this->table('user')
				->where('user.user_id', $user_id)
				->get()
				->getRowArray();
		}
	}


	public function insertData($data)
	{
		return $this->db->table($this->table)->insert($data);
	}

	public function updateData($data, $user_id)
	{
		return $this->db->table($this->table)->update($data, ['user_id' => $user_id]);
	}


	public function deleteData($user_id)
	{
		return $this->db->table($this->table)->delete(['user_id' => $user_id]);
	}
}

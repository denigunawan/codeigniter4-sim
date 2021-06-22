<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModels extends Model
{

	public function cek_login($username, $password)
	{
		return $this->db->table('user')
			->where(array('username' => $username, 'password' => $password))
			->get()->getRowArray();
	}
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentKeluarModel extends Model
{
	protected $table = 'documentkeluar';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('documentkeluar')
				->join('user', 'user.user_id = documentkeluar.user_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('documentkeluar')
				->join('user', 'user.user_id = documentkeluar.user_id')
				->where('documentkeluar.documentkeluar_id', $id)
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
		return $this->db->table($this->table)->update($data, ['documentkeluar_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['documentkeluar_id' => $id]);
	}
}

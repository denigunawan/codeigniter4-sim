<?php

namespace App\Models;

use CodeIgniter\Model;

class NotaMasukModel extends Model
{
	protected $table = 'nota_masuk';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('nota_masuk')
				->join('user', 'user.user_id = nota_masuk.user_id')
				->join('vendor', 'vendor.vendor_id = nota_masuk.vendor_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('nota_masuk')
				->join('user', 'user.user_id = nota_masuk.user_id')
				->join('vendor', 'vendor.vendor_id = nota_masuk.vendor_id')
				->where('nota_masuk.nota_masuk_id', $id)
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
		return $this->db->table($this->table)->update($data, ['nota_masuk_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['nota_masuk_id' => $id]);
	}
}

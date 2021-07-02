<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarDrawingKodeModel extends Model
{
	protected $table = 'drawingkode';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('drawingkode')
				->join('karyawan', 'karyawan.karyawan_id = drawingkode.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('drawingkode')
				->join('karyawan', 'karyawan.karyawan_id = drawingkode.karyawan_id')
				->where('drawingkode.drawingkode_id', $id)
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
		return $this->db->table($this->table)->update($data, ['drawingkode_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['drawingkode_id' => $id]);
	}
}

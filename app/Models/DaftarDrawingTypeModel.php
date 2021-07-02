<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarDrawingTypeModel extends Model
{
	protected $table = 'drawingtype';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('drawingtype')
				->join('karyawan', 'karyawan.karyawan_id = drawingtype.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('drawingtype')
				->join('karyawan', 'karyawan.karyawan_id = drawingtype.karyawan_id')
				->where('drawingtype.drawingtype_id', $id)
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
		return $this->db->table($this->table)->update($data, ['drawingtype_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['drawingtype_id' => $id]);
	}
}

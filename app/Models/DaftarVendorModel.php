<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarVendorModel extends Model
{
	protected $table = 'vendor';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('vendor')
				->join('karyawan', 'karyawan.karyawan_id = vendor.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('vendor')
				->join('karyawan', 'karyawan.karyawan_id = vendor.karyawan_id')
				->where('vendor.vendor_id', $id)
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
		return $this->db->table($this->table)->update($data, ['vendor_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['vendor_id' => $id]);
	}
}

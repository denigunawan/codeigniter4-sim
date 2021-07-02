<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentMasukModel extends Model
{

	protected $table = 'documentmasuk';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('documentmasuk')
				->join('karyawan', 'karyawan.karyawan_id = documentmasuk.karyawan_id')
				->join('vendor', 'vendor.vendor_id = documentmasuk.vendor_id')
				->join('drawingtype', 'drawingtype.drawingtype_id = documentmasuk.drawingtype_id')
				->join('drawingkode', 'drawingkode.drawingkode_id = documentmasuk.drawingkode_id')
				->join('rak', 'rak.rak_id = documentmasuk.rak_id')
				->join('bahasa', 'bahasa.bahasa_id = documentmasuk.bahasa_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('documentmasuk')
				->join('karyawan', 'karyawan.karyawan_id = documentmasuk.karyawan_id')
				->join('vendor', 'vendor.vendor_id = documentmasuk.vendor_id')
				->join('drawingtype', 'drawingtype.drawingtype_id = documentmasuk.drawingtype_id')
				->join('drawingkode', 'drawingkode.drawingkode_id = documentmasuk.drawingkode_id')
				->join('rak', 'rak.rak_id = documentmasuk.rak_id')
				->join('bahasa', 'bahasa.bahasa_id = documentmasuk.bahasa_id')
				->where('documentmasuk.documentmasuk_id', $id)
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
		return $this->db->table($this->table)->update($data, ['documentmasuk_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['documentmasuk_id' => $id]);
	}
}

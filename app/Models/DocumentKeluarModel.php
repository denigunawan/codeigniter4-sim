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
				->join('karyawan', 'karyawan.karyawan_id = documentkeluar.karyawan_id')
				->join('vendor', 'vendor.vendor_id = documentkeluar.vendor_id')
				->join('drawingtype', 'drawingtype.drawingtype_id = documentkeluar.drawingtype_id')
				->join('drawingkode', 'drawingkode.drawingkode_id = documentkeluar.drawingkode_id')
				->join('bahasa', 'bahasa.bahasa_id = documentkeluar.bahasa_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('documentkeluar')
				->join('karyawan', 'karyawan.karyawan_id = documentkeluar.karyawan_id')
				->join('vendor', 'vendor.vendor_id = documentkeluar.vendor_id')
				->join('drawingtype', 'drawingtype.drawingtype_id = documentkeluar.drawingtype_id')
				->join('drawingkode', 'drawingkode.drawingkode_id = documentkeluar.drawingkode_id')
				->join('bahasa', 'bahasa.bahasa_id = documentkeluar.bahasa_id')->where('documentkeluar.document_keluar_id', $id)
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
		return $this->db->table($this->table)->update($data, ['document_keluar_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['document_keluar_id' => $id]);
	}
}

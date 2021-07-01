<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
	protected $table = 'user';

	public function getCountUser()
	{
		return $this->db->table("user")->countAll();
	}

	public function getCountBahasa()
	{
		return $this->db->table("bahasa")->countAll();
	}

	public function getCountVendor()
	{
		return $this->db->table("vendor")->countAll();
	}


	public function getCountRak()
	{
		return $this->db->table("rak")->countAll();
	}

	public function getCountDocumentMasuk()
	{
		return $this->db->table("documentmasuk")->countAll();
	}

	public function getCounDocumentKeluar()
	{
		return $this->db->table("documentkeluar")->countAll();
	}

	public function getCountNotaMasuk()
	{
		return $this->db->table("notamasuk")->countAll();
	}

	public function getCountNotaKeluar()
	{
		return $this->db->table("notakeluar")->countAll();
	}
	public function getCountDrawingKode()
	{
		return $this->db->table("drawingkode")->countAll();
	}
	public function getCountDrawingType()
	{
		return $this->db->table("drawingtype")->countAll();
	}
	public function getCountJabatan()
	{
		return $this->db->table("jabatan")->countAll();
	}
}

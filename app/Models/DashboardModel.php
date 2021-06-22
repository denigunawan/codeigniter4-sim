<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
	protected $table = 'user';

	// hitung total data pada transaction
	public function getCountUser()
	{
		return $this->db->table("user")->countAll();
	}

	// hitung total data pada  Imam
	public function getCountBahasa()
	{
		return $this->db->table("bahasa")->countAll();
	}

	// hitung total data pada Bilal
	public function getCountRak()
	{
		return $this->db->table("rak")->countAll();
	}

	// hitung total data pada user
	public function getCountDocumentMasuk()
	{
		return $this->db->table("documentmasuk")->countAll();
	}

	// hitung total data pada Marbot
	public function getCounDocumentKeluar()
	{
		return $this->db->table("documentkeluar")->countAll();
	}

	// hitung total data pada Muazin
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

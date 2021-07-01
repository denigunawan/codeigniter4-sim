<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Home extends BaseController
{
	public function __construct()
	{
		$this->dashboard_model = new DashboardModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}


		$data['total_user']       		= $this->dashboard_model->getCountUser();
		$data['total_bahasa']           = $this->dashboard_model->getCountBahasa();
		$data['total_rak']          	= $this->dashboard_model->getCountRak();
		$data['total_documentmasuk']    = $this->dashboard_model->getCountDocumentMasuk();
		$data['total_documentkeluar']   = $this->dashboard_model->getCounDocumentKeluar();
		$data['total_notamasuk']        = $this->dashboard_model->getCountNotaMasuk();
		$data['total_notakeluar']       = $this->dashboard_model->getCountNotaKeluar();
		$data['total_drawingkode']      = $this->dashboard_model->getCountDrawingKode();
		$data['total_drawingtype']      = $this->dashboard_model->getCountDrawingType();
		$data['total_jabatan']          = $this->dashboard_model->getCountJabatan();
		$data['total_vendor']           = $this->dashboard_model->getCountVendor();



		return view('dashboard',  $data);
	}
}

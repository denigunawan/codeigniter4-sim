<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarBahasaModel;
use App\Models\DaftarDrawingKodeModel;
use App\Models\DaftarDrawingTypeModel;
use App\Models\DaftarRakModel;
use App\Models\DaftarUsersModel;
use App\Models\DaftarVendorModel;
use App\Models\DocumentMasukModel;

class DocumentMasukController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->user_model 			= new DaftarUsersModel();
		$this->documentmasuk_model  = new DocumentMasukModel();
		$this->vendor_model 		= new DaftarVendorModel();
		$this->drawingtype_model 	= new DaftarDrawingTypeModel();
		$this->drawingkode_model 	= new DaftarDrawingKodeModel();
		$this->rak_model 			= new DaftarRakModel();
		$this->bahasa_model 		= new DaftarBahasaModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_documentmasuk') ? $this->request->getVar('page_documentmasuk') : 1;

		// paginate
		$paginate = 5;
		$data['documentmasuk']   = $this->documentmasuk_model->join('user', 'user.user_id = documentmasuk.user_id')->paginate($paginate, 'documentmasuk');
		$data['documentmasuk']   = $this->documentmasuk_model->join('vendor', 'vendor.vendor_id = documentmasuk.vendor_id')->paginate($paginate, 'documentmasuk');
		$data['documentmasuk']   = $this->documentmasuk_model->join('drawingtype', 'drawingtype.drawingtype_id = documentmasuk.drawingtype_id')->paginate($paginate, 'documentmasuk');
		$data['documentmasuk']   = $this->documentmasuk_model->join('drawingkode', 'drawingkode.drawingkode_id = documentmasuk.drawingkode_id')->paginate($paginate, 'documentmasuk');
		$data['documentmasuk']   = $this->documentmasuk_model->join('rak', 'rak.rak_id = documentmasuk.rak_id')->paginate($paginate, 'documentmasuk');
		$data['documentmasuk']   = $this->documentmasuk_model->join('bahasa', 'bahasa.bahasa_id = documentmasuk.bahasa_id')->paginate($paginate, 'documentmasuk');
		$data['pager']        = $this->documentmasuk_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('documentmasuk/index', $data);
	}


	public function create()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$user = $this->user_model->where('status', 'AKTIF')->findAll();
		$vendor = $this->vendor_model->where('nama_vendor')->findAll();
		$drawingtype = $this->drawingtype_model->where('drawing_type')->findAll();
		$drawingkode = $this->drawingkode_model->where('drawing_kode')->findAll();
		$rak = $this->rak_model->where('kode_rak')->findAll();
		$bahasa = $this->bahasa_model->where('bahasa_document')->findAll();

		$data['user'] = ['' => 'user'] + array_column($user, 'nama_user', 'user_id');
		$data['vendor'] = ['' => 'vendor'] + array_column($vendor, 'nama_vendor', 'vendor_id');
		$data['drawingtype'] = ['' => 'drawingtype'] + array_column($drawingtype, 'drawing_type', 'drawingtype_id');
		$data['drawingkode'] = ['' => 'drawingkode'] + array_column($drawingkode, 'drawing_kode', 'drawingkode_id');
		$data['rak'] = ['' => 'rak'] + array_column($rak, 'kode_rak', 'rak_id');
		$data['bahasa'] = ['' => 'bahasa'] + array_column($bahasa, 'bahasa_document', 'bahasa_id');

		return view('documentmasuk/create', $data);
	}

	public function store()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$validation =  \Config\Services::validation();
		$data = array(
			'user_id'        		=> $this->request->getPost('user_id'),
			'vendor_id'        		=> $this->request->getPost('vendor_id'),
			'drawingtype_id'        => $this->request->getPost('drawingtype_id'),
			'drawingkode_id'        => $this->request->getPost('drawingkode_id'),
			'rak_id'        		=> $this->request->getPost('rak_id'),
			'bahasa_id'        		=> $this->request->getPost('bahasa_id'),
			'kode_dokumen'    		=> $this->request->getPost('kode_dokumen'),
			'judul_dokumen'         => $this->request->getPost('judul_dokumen'),
			'status'        		=> $this->request->getPost('status'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'created_at'            => $this->request->getPost('created_at'),
			'updated_at'            => $this->request->getPost('updated_at'),

		);

		if ($validation->run($data, 'documentmasuk') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('documentmasuk/create'));
		} else {
			// insert
			$simpan = $this->documentmasuk_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Created Daftar successfully');
				return redirect()->to(base_url('documentmasuk'));
			}
		}
	}



	public function show($id)
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$data['documentmasuk'] = $this->documentmasuk_model->getData($id);
		echo view('documentmasuk/show', $data);
	}

	public function edit($id)
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$data['documentmasuk'] = $this->documentmasuk_model->getData($id);
		echo view('documentmasuk/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('documentmasuk_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'user_id'        		=> $this->request->getPost('user_id'),
			'vendor_id'        		=> $this->request->getPost('vendor_id'),
			'drawingtype_id'        => $this->request->getPost('drawingtype_id'),
			'drawingkode_id'        => $this->request->getPost('drawingkode_id'),
			'rak_id'        		=> $this->request->getPost('rak_id'),
			'bahasa_id'        		=> $this->request->getPost('bahasa_id'),
			'kode_dokumen'    		=> $this->request->getPost('kode_dokumen'),
			'judul_dokumen'         => $this->request->getPost('judul_dokumen'),
			'status'        		=> $this->request->getPost('status'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'created_at'            => $this->request->getPost('created_at'),
			'updated_at'            => $this->request->getPost('updated_at'),

		);
		if ($validation->run($data, 'documentmasuk') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('documentmasuk/edit/' . $id));
		} else {
			$ubah = $this->documentmasuk_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Updated Data documentmasuk Berhasil');
				return redirect()->to(base_url('documentmasuk'));
			}
		}
	}
	public function delete($id)
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$hapus = $this->documentmasuk_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Daftar documentmasuk Berhasil');
			return redirect()->to(base_url('documentmasuk'));
		}
	}
}

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
use App\Models\KaryawanModel;

class DocumentMasukController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->karyawan_model 		= new KaryawanModel();
		$this->documentmasuk_model  = new DocumentMasukModel();
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
		$paginate = 1000000;
		$data['documentmasuk']   = $this->documentmasuk_model->join('karyawan', 'karyawan.karyawan_id = documentmasuk.karyawan_id')->paginate($paginate, 'documentmasuk');
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
		$user = $this->karyawan_model->findAll();
		$data['karyawan'] = ['' => 'karyawan'] + array_column($user, 'nama_karyawan', 'karyawan_id');
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
			'kode_dokumen'        	=> $this->request->getPost('kode_dokumen'),
			'document_type'        	=> $this->request->getPost('document_type'),
			'document_number'       => $this->request->getPost('document_number'),
			'judul_dokumen'        	=> $this->request->getPost('judul_dokumen'),
			'vendor'        		=> $this->request->getPost('vendor'),
			'bahasa'        		=> $this->request->getPost('bahasa'),
			'status_document'    	=> $this->request->getPost('status_document'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),
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
			'kode_dokumen'        	=> $this->request->getPost('kode_dokumen'),
			'document_type'        	=> $this->request->getPost('document_type'),
			'document_number'       => $this->request->getPost('document_number'),
			'judul_dokumen'        	=> $this->request->getPost('judul_dokumen'),
			'vendor'        		=> $this->request->getPost('vendor'),
			'bahasa'        		=> $this->request->getPost('bahasa'),
			'status_document'    	=> $this->request->getPost('status_document'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

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

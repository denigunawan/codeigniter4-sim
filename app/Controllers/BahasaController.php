<?php

namespace App\Controllers;

use App\Models\DaftarBahasaModel;
use App\Models\KaryawanModel;

class BahasaController extends BaseController
{


	protected $helpers = [];

	public function __construct()
	{
		helper(['form']);
		$this->karyawan_model = new KaryawanModel();
		$this->bahasa_model = new DaftarBahasaModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_bahasa') ? $this->request->getVar('page_bahasa') : 1;
		// paginate
		$paginate = 5;
		$data['bahasa']   = $this->bahasa_model->join('karyawan', 'karyawan.karyawan_id = bahasa.karyawan_id')->paginate($paginate, 'bahasa');
		$data['pager']        = $this->bahasa_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('bahasa/index', $data);
	}


	public function create()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$karyawan = $this->karyawan_model->findAll();
		$data['karyawan'] = ['' => 'karyawan'] + array_column($karyawan, 'nama_karyawan', 'karyawan_id');
		return view('bahasa/create', $data);
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
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),
			'bahasa_document'       => $this->request->getPost('bahasa_document'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
		);

		if ($validation->run($data, 'bahasa') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('bahasa/create'));
		} else {
			$simpan = $this->bahasa_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Created  successfully');
				return redirect()->to(base_url('bahasa'));
			}
		}
	}

	public function edit($id)
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$karyawan = $this->karyawan_model->findAll();
		$data['karyawan'] = ['' => 'Pilih karyawan'] + array_column($karyawan, 'nama_karyawan', 'karyawan_id');

		$data['bahasa'] = $this->bahasa_model->getData($id);
		echo view('bahasa/edit', $data);
	}
	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('bahasa_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'karyawan_id'        		=> $this->request->getPost('karyawan_id'),
			'bahasa_document'       => $this->request->getPost('bahasa_document'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
		);

		if ($validation->run($data, 'bahasa') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('bahasa/edit/' . $id));
		} else {
			$model = new DaftarBahasaModel();
			$ubah = $model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Updated Data Berhasil');
				return redirect()->to(base_url('bahasa'));
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
		$hapus = $this->bahasa_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete  bahasa Berhasil');
			return redirect()->to(base_url('bahasa'));
		}
	}
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarJabatanModel;

class JabatanController extends BaseController
{

	protected $helpers = [];

	public function __construct()
	{
		helper(['form']);
		$this->jabatan_model = new DaftarJabatanModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_jabatan') ? $this->request->getVar('page_jabatan') : 1;

		// paginate
		$paginate = 5;
		$data['jabatan'] = $this->jabatan_model->paginate($paginate, 'jabatan');
		$data['pager']          = $this->jabatan_model->pager;
		$data['currentPage']    = $currentPage;


		echo view('jabatan/index', $data);
	}

	public function create()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		return view('jabatan/create');
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
			'nama_jabatan'       	=> $this->request->getPost('nama_jabatan'),
			'jenis_jabatan'       	=> $this->request->getPost('jenis_jabatan'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),



		);

		if ($validation->run($data, 'jabatan') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('jabatan/create'));
		} else {
			$model = new DaftarJabatanModel();
			$simpan = $model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
				return redirect()->to(base_url('jabatan'));
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
		$model = new DaftarJabatanModel();
		$data['jabatan'] = $model->getData($id)->getRowArray();
		echo view('jabatan/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('jabatan_id');

		$validation =  \Config\Services::validation();

		$data = array(


			'nama_jabatan'       	=> $this->request->getPost('nama_jabatan'),
			'jenis_jabatan'       	=> $this->request->getPost('jenis_jabatan'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),

		);

		if ($validation->run($data, 'jabatan') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('jabatan/edit/' . $id));
		} else {
			$model = new DaftarJabatanModel();
			$ubah = $model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Updated Data Berhasil');
				return redirect()->to(base_url('jabatan'));
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
		$model = new DaftarJabatanModel();
		$hapus = $model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Berhasil');
			return redirect()->to(base_url('jabatan'));
		}
	}
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarBahasaModel;
use App\Models\DaftarUsersModel;

class BahasaController extends BaseController
{

	public function __construct()
	{
		helper(['form']);
		$this->user_model = new DaftarUsersModel();
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
		$data['bahasa']   = $this->bahasa_model->join('user', 'user.user_id = bahasa.user_id')->paginate($paginate, 'bahasa');
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
		$user = $this->user_model->where('status', 'AKTIF')->findAll();
		$data['user'] = ['' => 'user'] + array_column($user, 'nama_user', 'user_id');
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
			'user_id'        		=> $this->request->getPost('user_id'),
			'bahasa_document'       => $this->request->getPost('bahasa_document'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),

		);

		if ($validation->run($data, 'bahasa') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('bahasa/create'));
		} else {
			// insert
			$simpan = $this->bahasa_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Created Daftar successfully');
				return redirect()->to(base_url('bahasa'));
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
		$data['bahasa'] = $this->bahasa_model->getData($id);
		echo view('bahasa/show', $data);
	}

	public function edit($id)
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
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
			'user_id'        		=> $this->request->getPost('user_id'),
			'bahasa_document'       => $this->request->getPost('bahasa_document'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
		);
		if ($validation->run($data, 'bahasa') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('bahasa/edit/' . $id));
		} else {
			$ubah = $this->bahasa_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Updated Data bahasa Berhasil');
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
			session()->setFlashdata('warning', 'Delete Daftar bahasa Berhasil');
			return redirect()->to(base_url('bahasa'));
		}
	}
}

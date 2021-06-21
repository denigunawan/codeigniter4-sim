<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftaruserModel;
use App\Models\DaftarUsersModel;
use App\Models\userModel;

class UsersController extends BaseController
{

	public function __construct()
	{
		helper(['form']);
		$this->user_model = new DaftarUsersModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;

		// paginate
		$paginate = 5;
		$data['user'] = $this->user_model->paginate($paginate, 'user');
		$data['pager']          = $this->user_model->pager;
		$data['currentPage']    = $currentPage;


		echo view('user/index', $data);
	}

	public function create()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		return view('user/create');
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
			'nama_user'     => $this->request->getPost('nama_user'),
			'username'   => $this->request->getPost('username'),
			'password'   => $this->request->getPost('password'),
			'level'   => $this->request->getPost('level'),
			'created_at'   => $this->request->getPost('created_at'),
			'updated_at'   => $this->request->getPost('updated_at'),

		);

		if ($validation->run($data, 'user') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('user/create'));
		} else {
			$model = new DaftarUsersModel();
			$simpan = $model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Selamat Anda Berhasil Membuat Data user ');
				return redirect()->to(base_url('user'));
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
		$model = new DaftarUsersModel();
		$data['user'] = $model->getData($id)->getRowArray();
		echo view('user/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('idpengurus');

		$validation =  \Config\Services::validation();

		$data = array(
			'nama_user'     => $this->request->getPost('nama_user'),
			'username'   => $this->request->getPost('username'),
			'password'   => $this->request->getPost('password'),
			'level'   => $this->request->getPost('level'),
			'created_at'   => $this->request->getPost('created_at'),
			'updated_at'   => $this->request->getPost('updated_at'),
		);

		if ($validation->run($data, 'user') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('user/edit/' . $id));
		} else {
			$model = new DaftarUsersModel();
			$ubah = $model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Updated user Berhasil');
				return redirect()->to(base_url('user'));
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
		$model = new DaftarUsersModel();
		$hapus = $model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Deleted user successfully');
			return redirect()->to(base_url('user'));
		}
	}
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModels;

class UsersController extends BaseController
{
	protected $helpers = [];

	public function __construct()
	{
		helper(['form']);
		$this->user_model = new UsersModels();
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
		$data['user']   = $this->user_model->paginate($paginate, 'user');
		$data['pager']        = $this->user_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('user/index', $data);
	}


	public function create()
	{
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
			'nama_user'             => $this->request->getPost('nama_user'),
			'username'              => $this->request->getPost('username'),
			'password'              => $this->request->getPost('password'),
			'level'                 => $this->request->getPost('level'),

		);

		if ($validation->run($data, 'user') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('user/create'));
		} else {

			$simpan = $this->user_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Created Daftar successfully');
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
		$data['user'] = $this->user_model->getData($id);
		echo view('user/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('id');

		$validation =  \Config\Services::validation();


		$data = array(
			'nama_user'             => $this->request->getPost('nama_user'),
			'username'              => $this->request->getPost('username'),
			'password'              => $this->request->getPost('password'),
			'level'                 => $this->request->getPost('level'),

		);

		if ($validation->run($data, 'user') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('user/edit/' . $id));
		} else {

			$ubah = $this->user_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Updated Data user Berhasil');
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
		$hapus = $this->user_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Daftar user Berhasil');
			return redirect()->to(base_url('user'));
		}
	}
}

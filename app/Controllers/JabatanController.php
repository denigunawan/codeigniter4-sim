<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarJabatanModel;
use App\Models\DaftarUsersModel;

class JabatanController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->user_model = new DaftarUsersModel();
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
		$data['jabatan']   = $this->jabatan_model->join('user', 'user.user_id = jabatan.user_id')->paginate($paginate, 'jabatan');
		$data['pager']        = $this->jabatan_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('jabatan/index', $data);
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
		return view('jabatan/create', $data);
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
			'nama_jabatan'       	=> $this->request->getPost('nama_jabatan'),
			'jenis_jabatan'       	=> $this->request->getPost('jenis_jabatan'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'created_at'            => $this->request->getPost('created_at'),
			'updated_at'            => $this->request->getPost('updated_at'),



		);

		if ($validation->run($data, 'jabatan') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('jabatan/create'));
		} else {
			// insert
			$simpan = $this->jabatan_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Created Daftar successfully');
				return redirect()->to(base_url('jabatan'));
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
		$data['jabatan'] = $this->jabatan_model->getData($id);
		echo view('jabatan/show', $data);
	}

	public function edit($id)
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$data['jabatan'] = $this->jabatan_model->getData($id);
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
			'user_id'        		=> $this->request->getPost('user_id'),
			'nama_jabatan'       	=> $this->request->getPost('nama_jabatan'),
			'jenis_jabatan'       	=> $this->request->getPost('jenis_jabatan'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'created_at'            => $this->request->getPost('created_at'),
			'updated_at'            => $this->request->getPost('updated_at'),

		);
		if ($validation->run($data, 'jabatan') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('jabatan/edit/' . $id));
		} else {
			$ubah = $this->jabatan_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Updated Data jabatan Berhasil');
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
		$hapus = $this->jabatan_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Daftar jabatan Berhasil');
			return redirect()->to(base_url('jabatan'));
		}
	}
}

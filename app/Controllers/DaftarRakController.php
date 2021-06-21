<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarRakModel;
use App\Models\DaftarUsersModel;

class DaftarRakController extends BaseController
{

	public function __construct()
	{
		helper(['form']);
		$this->user_model = new DaftarUsersModel();
		$this->rak_model = new DaftarRakModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_rak') ? $this->request->getVar('page_rak') : 1;

		// paginate
		$paginate = 5;
		$data['rak']   = $this->rak_model->join('user', 'user.user_id = rak.user_id')->paginate($paginate, 'rak');
		$data['pager']        = $this->rak_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('rak/index', $data);
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
		return view('rak/create', $data);
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
			'nama_rak'      	 	=> $this->request->getPost('nama_rak'),
			'kode_rak'       		=> $this->request->getPost('kode_rak'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'created_at'            => $this->request->getPost('created_at'),
			'updated_at'            => $this->request->getPost('updated_at'),



		);

		if ($validation->run($data, 'rak') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('rak/create'));
		} else {
			// insert
			$simpan = $this->rak_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Created Daftar successfully');
				return redirect()->to(base_url('rak'));
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
		$data['rak'] = $this->rak_model->getData($id);
		echo view('rak/show', $data);
	}

	public function edit($id)
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$data['rak'] = $this->rak_model->getData($id);
		echo view('rak/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('rak_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'user_id'        		=> $this->request->getPost('user_id'),
			'nama_rak'      	 	=> $this->request->getPost('nama_rak'),
			'kode_rak'       		=> $this->request->getPost('kode_rak'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'created_at'            => $this->request->getPost('created_at'),
			'updated_at'            => $this->request->getPost('updated_at'),

		);
		if ($validation->run($data, 'rak') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('rak/edit/' . $id));
		} else {
			$ubah = $this->rak_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Updated Data rak Berhasil');
				return redirect()->to(base_url('rak'));
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
		$hapus = $this->rak_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Daftar rak Berhasil');
			return redirect()->to(base_url('rak'));
		}
	}
}

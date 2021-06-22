<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarUsersModel;
use App\Models\DaftarVendorModel;

class VendorController extends BaseController
{

	public function __construct()
	{
		helper(['form']);
		$this->user_model = new DaftarUsersModel();
		$this->vendor_model = new DaftarVendorModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_vendor') ? $this->request->getVar('page_vendor') : 1;

		// paginate
		$paginate = 5;
		$data['vendor']   = $this->vendor_model->join('user', 'user.user_id = vendor.user_id')->paginate($paginate, 'vendor');
		$data['pager']        = $this->vendor_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('vendor/index', $data);
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
		return view('vendor/create', $data);
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
			'nama_vendor'       => $this->request->getPost('nama_vendor'),
			'jenis_vendor'       => $this->request->getPost('jenis_vendor'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'created_at'            => $this->request->getPost('created_at'),
			'updated_at'            => $this->request->getPost('updated_at'),


		);

		if ($validation->run($data, 'vendor') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('vendor/create'));
		} else {
			// insert
			$simpan = $this->vendor_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Created Daftar successfully');
				return redirect()->to(base_url('vendor'));
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
		$data['vendor'] = $this->vendor_model->getData($id);
		echo view('vendor/show', $data);
	}

	public function edit($id)
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$data['vendor'] = $this->vendor_model->getData($id);
		echo view('vendor/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('vendor_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'user_id'        		=> $this->request->getPost('user_id'),
			'nama_vendor'       => $this->request->getPost('nama_vendor'),
			'jenis_vendor'       => $this->request->getPost('jenis_vendor'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'created_at'            => $this->request->getPost('created_at'),
			'updated_at'            => $this->request->getPost('updated_at'),

		);
		if ($validation->run($data, 'vendor') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('vendor/edit/' . $id));
		} else {
			$ubah = $this->vendor_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Updated Data vendor Berhasil');
				return redirect()->to(base_url('vendor'));
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
		$hapus = $this->vendor_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Daftar vendor Berhasil');
			return redirect()->to(base_url('vendor'));
		}
	}
}

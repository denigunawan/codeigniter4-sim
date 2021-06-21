<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarDrawingKodeModel;
use App\Models\DaftarUsersModel;

class DrawingKodeController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->user_model = new DaftarUsersModel();
		$this->drawingkode_model = new DaftarDrawingKodeModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_drawingkode') ? $this->request->getVar('page_drawingkode') : 1;

		// paginate
		$paginate = 5;
		$data['drawingkode']   = $this->drawingkode_model->join('user', 'user.user_id = drawingkode.user_id')->paginate($paginate, 'drawingkode');
		$data['pager']        = $this->drawingkode_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('drawingkode/index', $data);
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
		return view('drawingkode/create', $data);
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
			'drawing_kode'      	 => $this->request->getPost('drawing_kode'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'created_at'            => $this->request->getPost('created_at'),
			'updated_at'            => $this->request->getPost('updated_at'),



		);

		if ($validation->run($data, 'drawingkode') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('drawingkode/create'));
		} else {
			// insert
			$simpan = $this->drawingkode_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Created Daftar successfully');
				return redirect()->to(base_url('drawingkode'));
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
		$data['drawingkode'] = $this->drawingkode_model->getData($id);
		echo view('drawingkode/show', $data);
	}

	public function edit($id)
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$data['drawingkode'] = $this->drawingkode_model->getData($id);
		echo view('drawingkode/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('drawingkode_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'user_id'        		=> $this->request->getPost('user_id'),
			'drawing_kode'       	=> $this->request->getPost('drawing_kode'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'created_at'            => $this->request->getPost('created_at'),
			'updated_at'            => $this->request->getPost('updated_at'),

		);
		if ($validation->run($data, 'drawingkode') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('drawingkode/edit/' . $id));
		} else {
			$ubah = $this->drawingkode_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Updated Data drawingkode Berhasil');
				return redirect()->to(base_url('drawingkode'));
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
		$hapus = $this->drawingkode_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Daftar drawingkode Berhasil');
			return redirect()->to(base_url('drawingkode'));
		}
	}
}

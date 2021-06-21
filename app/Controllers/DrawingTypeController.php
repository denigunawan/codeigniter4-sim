<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarDrawingTypeModel;
use App\Models\DaftarUsersModel;

class DrawingTypeController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->user_model = new DaftarUsersModel();
		$this->drawingtype_model = new DaftarDrawingTypeModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_drawingtype') ? $this->request->getVar('page_drawingtype') : 1;

		// paginate
		$paginate = 5;
		$data['drawingtype']   = $this->drawingtype_model->join('user', 'user.user_id = drawingtype.user_id')->paginate($paginate, 'drawingtype');
		$data['pager']        = $this->drawingtype_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('drawingtype/index', $data);
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
		return view('drawingtype/create', $data);
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
			'drawing_type'       	=> $this->request->getPost('drawing_type'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'created_at'            => $this->request->getPost('created_at'),
			'updated_at'            => $this->request->getPost('updated_at'),



		);

		if ($validation->run($data, 'drawingtype') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('drawingtype/create'));
		} else {
			// insert
			$simpan = $this->drawingtype_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Created Daftar successfully');
				return redirect()->to(base_url('drawingtype'));
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
		$data['drawingtype'] = $this->drawingtype_model->getData($id);
		echo view('drawingtype/show', $data);
	}

	public function edit($id)
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$data['drawingtype'] = $this->drawingtype_model->getData($id);
		echo view('drawingtype/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('drawingtype_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'user_id'        		=> $this->request->getPost('user_id'),
			'drawing_type'       	=> $this->request->getPost('drawing_type'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'created_at'            => $this->request->getPost('created_at'),
			'updated_at'            => $this->request->getPost('updated_at'),

		);
		if ($validation->run($data, 'drawingtype') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('drawingtype/edit/' . $id));
		} else {
			$ubah = $this->drawingtype_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Updated Data drawingtype Berhasil');
				return redirect()->to(base_url('drawingtype'));
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
		$hapus = $this->drawingtype_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Daftar drawingtype Berhasil');
			return redirect()->to(base_url('drawingtype'));
		}
	}
}

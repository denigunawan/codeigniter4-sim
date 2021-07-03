<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\DaftarVendorModel;
use App\Models\NotaKeluarModel;

class NotaKeluarController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->karyawan_model = new KaryawanModel();
		$this->notakeluar_model = new NotaKeluarModel();
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
		$currentPage = $this->request->getVar('page_notakeluar') ? $this->request->getVar('page_notakeluar') : 1;

		// paginate
		$paginate = 5;
		$data['notakeluar']   = $this->notakeluar_model->join('karyawan', 'karyawan.karyawan_id = notakeluar.karyawan_id')->paginate($paginate, 'notakeluar');
		$data['notakeluar']   = $this->notakeluar_model->join('vendor', 'vendor.vendor_id = notakeluar.vendor_id')->paginate($paginate, 'notakeluar');
		$data['pager']        = $this->notakeluar_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('notakeluar/index', $data);
	}


	public function create()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$user = $this->karyawan_model->findAll();
		$vendor = $this->vendor_model->where('nama_vendor')->findAll();
		$data['karyawan'] = ['' => 'karyawan'] + array_column($user, 'nama_karyawan', 'karyawan_id');
		$data['vendor'] = ['' => 'vendor'] + array_column($vendor, 'nama_vendor', 'vendor_id');

		return view('notakeluar/create', $data);
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
			'vendor_id'        		=> $this->request->getPost('vendor_id'),
			'kode_nota'    			=> $this->request->getPost('kode_nota'),
			'nama_barang'         	=> $this->request->getPost('nama_barang'),
			'jumlah_barang'         => $this->request->getPost('jumlah_barang'),
			'status'        		=> $this->request->getPost('status'),
			'tanggal_keluar'        => $this->request->getPost('tanggal_keluar'),
			'created_at'            => $this->request->getPost('created_at'),
			'updated_at'            => $this->request->getPost('updated_at'),

		);

		if ($validation->run($data, 'notakeluar') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('notakeluar/create'));
		} else {
			// insert
			$simpan = $this->notakeluar_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Created Daftar successfully');
				return redirect()->to(base_url('notakeluar'));
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
		$data['notakeluar'] = $this->notakeluar_model->getData($id);
		echo view('notakeluar/show', $data);
	}

	public function edit($id)
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$data['notakeluar'] = $this->notakeluar_model->getData($id);
		echo view('notakeluar/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('notakeluar_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),
			'vendor_id'        		=> $this->request->getPost('vendor_id'),
			'kode_nota'    			=> $this->request->getPost('kode_nota'),
			'nama_barang'         	=> $this->request->getPost('nama_barang'),
			'jumlah_barang'         => $this->request->getPost('jumlah_barang'),
			'status'        		=> $this->request->getPost('status'),
			'tanggal_keluar'        => $this->request->getPost('tanggal_keluar'),
			'created_at'            => $this->request->getPost('created_at'),
			'updated_at'            => $this->request->getPost('updated_at'),

		);
		if ($validation->run($data, 'notakeluar') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('notakeluar/edit/' . $id));
		} else {
			$ubah = $this->notakeluar_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Updated Data notakeluar Berhasil');
				return redirect()->to(base_url('notakeluar'));
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
		$hapus = $this->notakeluar_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Daftar notakeluar Berhasil');
			return redirect()->to(base_url('notakeluar'));
		}
	}
}

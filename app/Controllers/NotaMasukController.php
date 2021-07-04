<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarVendorModel;
use App\Models\KaryawanModel;
use App\Models\NotaMasukModel;

class NotaMasukController extends BaseController
{

	public function __construct()
	{
		helper(['form']);
		$this->karyawan_model 	= new KaryawanModel();
		$this->notamasuk_model  = new NotaMasukModel();
		$this->vendor_model 	= new DaftarVendorModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_notamasuk') ? $this->request->getVar('page_notamasuk') : 1;

		// paginate
		$paginate = 5;
		$data['notamasuk']   = $this->notamasuk_model->join('karyawan', 'karyawan.karyawan_id = notamasuk.karyawan_id')->paginate($paginate, 'notamasuk');
		$data['notamasuk']   = $this->notamasuk_model->join('vendor', 'vendor.vendor_id = notamasuk.vendor_id')->paginate($paginate, 'notamasuk');
		$data['pager']        = $this->notamasuk_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('notamasuk/index', $data);
	}


	public function create()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$karyawan 	= $this->karyawan_model->findAll();
		$vendor 	= $this->vendor_model->findAll();
		$data['karyawan'] = ['' => 'karyawan'] + array_column($karyawan, 'nama_karyawan', 'karyawan_id');
		$data['vendor']   = ['' => 'vendor'] + array_column($vendor, 'nama_vendor', 'vendor_id');

		return view('notamasuk/create', $data);
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
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),

		);

		if ($validation->run($data, 'notamasuk') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('notamasuk/create'));
		} else {
			// insert
			$simpan = $this->notamasuk_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Created Daftar successfully');
				return redirect()->to(base_url('notamasuk'));
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
		$karyawan = $this->karyawan_model->findAll();
		$vendor   = $this->vendor_model->findAll();
		$data['notamasuk'] = $this->notamasuk_model->getData($id);
		$data['karyawan'] = ['' => 'Pilih karyawan'] + array_column($karyawan, 'nama_karyawan', 'karyawan_id');
		$data['vendor'] = ['' => 'Pilih vendor'] + array_column($vendor, 'nama_vendor', 'vendor_id');
		echo view('notamasuk/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('notamasuk_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),
			'vendor_id'        		=> $this->request->getPost('vendor_id'),
			'kode_nota'    			=> $this->request->getPost('kode_nota'),
			'nama_barang'         	=> $this->request->getPost('nama_barang'),
			'jumlah_barang'         => $this->request->getPost('jumlah_barang'),
			'status'        		=> $this->request->getPost('status'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
		);
		if ($validation->run($data, 'notamasuk') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('notamasuk/edit/' . $id));
		} else {
			$ubah = $this->notamasuk_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Updated Data notamasuk Berhasil');
				return redirect()->to(base_url('notamasuk'));
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
		$hapus = $this->notamasuk_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Daftar notamasuk Berhasil');
			return redirect()->to(base_url('notamasuk'));
		}
	}
}

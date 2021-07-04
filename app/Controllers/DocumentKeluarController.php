<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarBahasaModel;
use App\Models\DaftarDrawingKodeModel;
use App\Models\DaftarDrawingTypeModel;
use App\Models\DaftarVendorModel;
use App\Models\DocumentKeluarModel;
use App\Models\KaryawanModel;

class DocumentKeluarController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->karyawan_model 		= new KaryawanModel();
		$this->documentkeluar_model = new DocumentKeluarModel();
		$this->vendor_model 		= new DaftarVendorModel();
		$this->drawingtype_model 	= new DaftarDrawingTypeModel();
		$this->drawingkode_model 	= new DaftarDrawingKodeModel();
		$this->bahasa_model 		= new DaftarBahasaModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_documentkeluar') ? $this->request->getVar('page_documentkeluar') : 1;

		// paginate
		$paginate = 5;
		$data['documentkeluar']   = $this->documentkeluar_model->join('karyawan', 'karyawan.karyawan_id = documentkeluar.karyawan_id')->paginate($paginate, 'documentkeluar');
		$data['documentkeluar']   = $this->documentkeluar_model->join('vendor', 'vendor.vendor_id = documentkeluar.vendor_id')->paginate($paginate, 'documentkeluar');
		$data['documentkeluar']   = $this->documentkeluar_model->join('drawingtype', 'drawingtype.drawingtype_id = documentkeluar.drawingtype_id')->paginate($paginate, 'documentkeluar');
		$data['documentkeluar']   = $this->documentkeluar_model->join('drawingkode', 'drawingkode.drawingkode_id = documentkeluar.drawingkode_id')->paginate($paginate, 'documentkeluar');
		$data['documentkeluar']   = $this->documentkeluar_model->join('bahasa', 'bahasa.bahasa_id = documentkeluar.bahasa_id')->paginate($paginate, 'documentkeluar');
		$data['pager']        = $this->documentkeluar_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('documentkeluar/index', $data);
	}


	public function create()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$karyawan = $this->karyawan_model->findAll();
		$vendor = $this->vendor_model->findAll();
		$drawingtype = $this->drawingtype_model->findAll();
		$drawingkode = $this->drawingkode_model->findAll();
		$bahasa = $this->bahasa_model->findAll();
		$data['karyawan'] = ['' => 'karyawan'] + array_column($karyawan, 'nama_karyawan', 'karyawan_id');
		$data['vendor'] = ['' => 'vendor'] + array_column($vendor, 'nama_vendor', 'vendor_id');
		$data['drawingtype'] = ['' => 'drawingtype'] + array_column($drawingtype, 'drawing_type', 'drawingtype_id');
		$data['drawingkode'] = ['' => 'drawingkode'] + array_column($drawingkode, 'drawing_kode', 'drawingkode_id');
		$data['bahasa'] = ['' => 'bahasa'] + array_column($bahasa, 'bahasa_document', 'bahasa_id');

		return view('documentkeluar/create', $data);
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
			'drawingtype_id'        => $this->request->getPost('drawingtype_id'),
			'drawingkode_id'        => $this->request->getPost('drawingkode_id'),
			'bahasa_id'        		=> $this->request->getPost('bahasa_id'),
			'kode_dokumen'    		=> $this->request->getPost('kode_dokumen'),
			'nomer_box'    			=> $this->request->getPost('nomer_box'),
			'isi_box'         		=> $this->request->getPost('isi_box'),
			'status'        		=> $this->request->getPost('status'),
			'tanggal_keluar'        => $this->request->getPost('tanggal_keluar'),
		);

		if ($validation->run($data, 'documentkeluar') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('documentkeluar/create'));
		} else {
			// insert
			$simpan = $this->documentkeluar_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Created Daftar successfully');
				return redirect()->to(base_url('documentkeluar'));
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
		$vendor = $this->vendor_model->findAll();
		$drawingtype = $this->drawingtype_model->findAll();
		$drawingkode = $this->drawingkode_model->findAll();
		$bahasa = $this->bahasa_model->findAll();
		$data['karyawan'] = ['' => 'karyawan'] + array_column($karyawan, 'nama_karyawan', 'karyawan_id');
		$data['vendor'] = ['' => 'vendor'] + array_column($vendor, 'nama_vendor', 'vendor_id');
		$data['drawingtype'] = ['' => 'drawingtype'] + array_column($drawingtype, 'drawing_type', 'drawingtype_id');
		$data['drawingkode'] = ['' => 'drawingkode'] + array_column($drawingkode, 'drawing_kode', 'drawingkode_id');
		$data['bahasa'] = ['' => 'bahasa'] + array_column($bahasa, 'bahasa_document', 'bahasa_id');
		$data['documentkeluar'] = $this->documentkeluar_model->getData($id);
		echo view('documentkeluar/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('document_keluar_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),
			'vendor_id'        		=> $this->request->getPost('vendor_id'),
			'drawingtype_id'        => $this->request->getPost('drawingtype_id'),
			'drawingkode_id'        => $this->request->getPost('drawingkode_id'),
			'bahasa_id'        		=> $this->request->getPost('bahasa_id'),
			'kode_dokumen'    		=> $this->request->getPost('kode_dokumen'),
			'nomer_box'    			=> $this->request->getPost('nomer_box'),
			'isi_box'         		=> $this->request->getPost('isi_box'),
			'status'        		=> $this->request->getPost('status'),
			'tanggal_keluar'        => $this->request->getPost('tanggal_keluar'),

		);
		if ($validation->run($data, 'documentkeluar') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('documentkeluar/edit/' . $id));
		} else {
			$ubah = $this->documentkeluar_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Updated Data documentkeluar Berhasil');
				return redirect()->to(base_url('documentkeluar'));
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
		$hapus = $this->documentkeluar_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Daftar documentkeluar Berhasil');
			return redirect()->to(base_url('documentkeluar'));
		}
	}
}

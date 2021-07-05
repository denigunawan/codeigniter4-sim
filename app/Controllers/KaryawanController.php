<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;

class karyawanController extends BaseController
{
    protected $helpers = [];

    public function __construct()
    {
        helper(['form']);
        $this->karyawan_model = new KaryawanModel();
    }


    public function index()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_karyawan') ? $this->request->getVar('page_karyawan') : 1;
        // paginate
        $paginate = 1000000;
        $data['karyawan']   = $this->karyawan_model->paginate($paginate, 'karyawan');
        $data['pager']        = $this->karyawan_model->pager;
        $data['currentPage']  = $currentPage;
        echo view('karyawan/index', $data);
    }


    public function create()
    {
        return view('karyawan/create');
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
            'nama_karyawan'             => $this->request->getPost('nama_karyawan'),
            'divisi'                      => $this->request->getPost('divisi'),
            'jabatan'                      => $this->request->getPost('jabatan'),
            'status'                      => $this->request->getPost('status'),
            'tanggalmasuk'               => $this->request->getPost('tanggalmasuk')
        );

        if ($validation->run($data, 'karyawan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('karyawan/create'));
        } else {

            $simpan = $this->karyawan_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Daftar successfully');
                return redirect()->to(base_url('karyawan'));
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
        $data['karyawan'] = $this->karyawan_model->getData($id);
        echo view('karyawan/edit', $data);
    }

    public function update()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $id = $this->request->getPost('karyawan_id');

        $validation =  \Config\Services::validation();


        $data = array(
            'nama_karyawan'             => $this->request->getPost('nama_karyawan'),
            'divisi'                      => $this->request->getPost('divisi'),
            'jabatan'                      => $this->request->getPost('jabatan'),
            'status'                      => $this->request->getPost('status'),
            'tanggalmasuk'               => $this->request->getPost('tanggalmasuk'),

        );

        if ($validation->run($data, 'karyawan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('karyawan/edit/' . $id));
        } else {

            $ubah = $this->karyawan_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Data karyawan Berhasil');
                return redirect()->to(base_url('karyawan'));
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
        $hapus = $this->karyawan_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete  karyawan Berhasil');
            return redirect()->to(base_url('karyawan'));
        }
    }
}

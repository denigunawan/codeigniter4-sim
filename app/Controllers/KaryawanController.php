<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KaryawanModel;

class KaryawanController extends BaseController
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
        $paginate = 5;
        $data['karyawan'] = $this->karyawan_model->paginate($paginate, 'karyawan');
        $data['pager']          = $this->karyawan_model->pager;
        $data['currentPage']    = $currentPage;


        echo view('karyawan/index', $data);
    }

    public function create()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
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
            'nama_karyawan'     => $this->request->getPost('nama_karyawan'),
            'jk'                => $this->request->getPost('jk'),
            'telephone'         => $this->request->getPost('telephone'),
            'alamat'            => $this->request->getPost('alamat'),
            'divisi'            => $this->request->getPost('divisi'),
            'jabatan_id'        => $this->request->getPost('jabatan_id'),
            'status'            => $this->request->getPost('status'),
            'tanggalmasuk'      => $this->request->getPost('tanggalmasuk'),


        );

        if ($validation->run($data, 'karyawan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('karyawan/create'));
        } else {
            $model = new KaryawanModel();
            $simpan = $model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
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
        $model = new KaryawanModel();
        $data['karyawan'] = $model->getData($id)->getRowArray();
        echo view('karyawan/edit', $data);
    }

    public function update()
    {
        // proteksi halaman
        if (session()->get('usekaryawan_Modelname') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $id = $this->request->getPost('idkaryawan');

        $validation =  \Config\Services::validation();

        $data = array(
            'nama_karyawan'     => $this->request->getPost('nama_karyawan'),
            'jk'                => $this->request->getPost('jk'),
            'telephone'         => $this->request->getPost('telephone'),
            'alamat'            => $this->request->getPost('alamat'),
            'divisi'            => $this->request->getPost('divisi'),
            'jabatan_id'        => $this->request->getPost('jabatan_id'),
            'status'            => $this->request->getPost('status'),
            'tanggalmasuk'      => $this->request->getPost('tanggalmasuk'),
        );

        if ($validation->run($data, 'karyawan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('karyawan/edit/' . $id));
        } else {
            $model = new KaryawanModel();
            $ubah = $model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Data Berhasil');
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
        $model = new KaryawanModel();
        $hapus = $model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Data Berhasil');
            return redirect()->to(base_url('karyawan'));
        }
    }
}

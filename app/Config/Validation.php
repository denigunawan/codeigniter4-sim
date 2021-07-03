<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------



	// validasi untuk  setiap field yang ada di Database 
	public $bahasa = [
		'karyawan_id'				=> 'required',
		'bahasa_document'     	=> 'required',
		'tanggal_masuk'     	=> 'required',
	];

	public $bahasa_errors = [

		'karyawan_id'     	=> [
			'required'		=> 'Data Karyawan Wajib Diisi'
		],

		'bahasa_document'   => [
			'required'		=> 'Bahasa Doukument Wajib Di isi'
		],
		'tanggal_masuk'   	=> [
			'required'		=> 'Tanggal Terdata Dokumen Wajib Di isi'
		],
	];



	// validasi untuk  setiap field yang ada di Database 
	public $rak = [
		'karyawan_id'			=> 'required',
		'nama_rak'     		=> 'required',
		'kode_rak'     		=> 'required',
		'tanggal_masuk'   	=> 'required',

	];

	public $rak_errors = [

		'karyawan_id'     	=> [
			'required'		=> 'Staff Penanggung Jawab Wajib Diisi'
		],

		'nama_rak'   => [
			'required'		=> 'Nama Rak Wajib Di isi'
		],
		'kode_rak'   => [
			'required'		=> 'Kode Rak Wajib Di isi'
		],
		'tanggal_masuk'   	=> [
			'required'		=> 'Tanggal Terdata  Wajib Di isi'
		],

	];




	// validasi untuk  setiap field yang ada di Database 
	public $vendor = [
		'karyawan_id'			=> 'required',
		'nama_vendor'     	=> 'required',
		'jenis_vendor'     	=> 'required',
		'tanggal_masuk'   	=> 'required',

	];

	public $vendor_errors = [

		'karyawan_id'     	=> [
			'required'		=> 'Staff Penanggung Jawab Wajib Diisi'
		],

		'nama_vendor'   => [
			'required'		=> 'Nama Vendor Wajib Di isi'
		],
		'jenis_vendor'   => [
			'required'		=> 'Jenis Vendor Wajib Di isi'
		],
		'tanggal_masuk'   	=> [
			'required'		=> 'Tanggal Terdata Dokumen Wajib Di isi'
		],

	];




	// validasi untuk  setiap field yang ada di Database 
	public $documentkeluar = [
		'kode_dokumen'     			=> 'required',
		'drawingtype_id'     		=> 'required',
		'drawingkode_id'   			=> 'required',
		'nomer_box'   				=> 'required',
		'isi_box'   				=> 'required',
		'vendor_id'   				=> 'required',
		'bahasa_id'   				=> 'required',
		'tanggal_keluar'   			=> 'required',
		'status'   					=> 'required',
		'karyawan_id'   				=> 'required',




	];

	public $documentkeluar_errors = [

		'kode_dokumen'     	=> [
			'required'		=> 'Kode Dokumen Wajib Di isi'
		],

		'drawingtype_id'    => [
			'required'		=> 'Data Drawing Type Wajib Di isi'
		],

		'drawingkode_id'   	=> [
			'required'		=> 'Data Drawing Kode Wajib Di isi'
		],
		'nomer_box'   		=>  [
			'required'		=> 'Data Nomer Box Wajib Di isi'
		],
		'vendor_id'   		=>  [
			'required'		=> 'Data Vendor Wajib Di isi'
		],
		'bahasa_id'   		=>  [
			'required'		=> 'Data Bahasa Wajib Di isi'
		],
		'tanggal_keluar'   	=>  [
			'required'		=> 'Data Tanggal Keluar Document Wajib Di isi'
		],
		'status'   	=>  [
			'required'		=> 'Data Status  Document Wajib Di isi'
		],
		'karyawan_id'   	=>  [
			'required'		=> 'Data Penanggung Jawab Document Wajib Di isi'
		],


	];





	// validasi untuk  setiap field yang ada di Database 
	public $documentmasuk = [
		'kode_dokumen'     			=> 'required',
		'drawingtype_id'     		=> 'required',
		'drawingkode_id'   			=> 'required',
		'judul_dokumen'   			=> 'required',
		'rak_id'   					=> 'required',
		'vendor_id'   				=> 'required',
		'bahasa_id'   				=> 'required',
		'tanggal_masuk'   			=> 'required',
		'status'   					=> 'required',
		'karyawan_id'   				=> 'required',

	];

	public $documentmasuk_errors = [

		'kode_dokumen'     	=> [
			'required'		=> 'Kode Dokumen Wajib Di isi'
		],

		'drawingtype_id'    => [
			'required'		=> 'Data Drawing Type Wajib Di isi'
		],

		'drawingkode_id'   	=> [
			'required'		=> 'Data Drawing Kode Wajib Di isi'
		],
		'judul_dokumen'   	=>  [
			'required'		=> 'Data Judul Dokumen Wajib Di isi'
		],
		'rak_id'   			=>  [
			'required'		=> 'Data Rak Tempat Dokumen Wajib Di isi'
		],
		'vendor_id'   		=>  [
			'required'		=> 'Data Vendor Wajib Di isi'
		],
		'bahasa_id'   		=>  [
			'required'		=> 'Data Bahasa Wajib Di isi'
		],
		'tanggal_masuk'   	=>  [
			'required'		=> 'Data Tanggal Masuk Document Wajib Di isi'
		],
		'status'   	=>  [
			'required'		=> 'Data Status  Document Wajib Di isi'
		],
		'karyawan_id'   	=>  [
			'required'		=> 'Data Penanggung Jawab Document Wajib Di isi'
		],

	];





	// validasi untuk  setiap field yang ada di Database 
	public $drawingkode = [
		'karyawan_id'		=> 'required',
		'drawing_kode'     	=> 'required',
		'tanggal_masuk'     => 'required',

	];

	public $drawingkode_errors = [

		'karyawan_id'     	=> [
			'required'		=> 'Karyawan Wajib Di isi'
		],

		'kode_drawing'     			=> [
			'required'		=> 'Data Drawing kode Wajib Di isi'
		],
		'tanggal_masuk'   		=> [
			'required'		=> 'Data Tanggal Masuk Wajib Di isi'
		],


	];





	// validasi untuk  setiap field yang ada di Database 
	public $drawingtype = [
		'karyawan_id'			=> 'required',
		'drawing_type'      => 'required',
		'tanggal_masuk'     => 'required',

	];

	public $drawingtype_errors = [

		'drawing_type'     	=> [
			'required'		=> 'Drawing Type  Wajib Di isi'
		],

		'tanggal_masuk'   	=>  [
			'required'		=> 'Data Tanggal Masuk  Wajib Di isi'
		],
		'karyawan_id'   	=>  [
			'required'		=> 'Data Penanggung Jawab Wajib Di isi'
		]
	];





	// validasi untuk  setiap field yang ada di Database 
	public $jabatan = [
		'nama_jabatan'     	=> 'required',
		'jenis_jabatan'     => 'required',
		'tanggal_masuk'   	=> 'required',

	];

	public $jabatan_errors = [

		'nama_jabatan'     	=> [
			'required'		=> 'Jabatan  Wajib Di isi'
		],
		'jenis_jabatan'   	=>  [
			'required'		=> 'Jenis Jabatan Wajib Di isi'
		],

		'tanggal_masuk'   	=>  [
			'required'		=> 'Data Tanggal Masuk Document Wajib Di isi'
		],

	];





	// validasi untuk  setiap field yang ada di Database 
	public $notamasuk = [
		'karyawan_id'			=> 'required',
		'vendor_id'     	=> 'required',
		'kode_nota'     	=> 'required',
		'nama_barang'   	=> 'required',
		'jumlah_barang'   	=> 'required',
		'status'   			=> 'required',
		'tanggal_masuk'   	=> 'required',

	];

	public $notamasuk_errors = [

		'kode_nota'     	=> [
			'required'		=> 'Kode Nota Wajib Di isi'
		],

		'nama_barang'    => [
			'required'		=> 'Nama Barang Wajib Di isi'
		],

		'jumlah_barang'   	=> [
			'required'		=> 'Jumlah Barang Wajib Di isi'
		],
		'vendor_id'   		=>  [
			'required'		=> 'Data Vendor Wajib Di isi'
		],
		'tanggal_masuk'   	=>  [
			'required'		=> 'Data Tanggal Masuk nota Wajib Di isi'
		],
		'status'   	=>  [
			'required'		=> 'Data Status nota Wajib Di isi'
		],
		'karyawan_id'   	=>  [
			'required'		=> 'Data Penanggung Jawab nota Wajib Di isi'
		]
	];



	// validasi untuk  setiap field yang ada di Database 
	public $notakeluar = [
		'karyawan_id'			=> 'required',
		'vendor_id'     	=> 'required',
		'kode_nota'     	=> 'required',
		'nama_barang'   	=> 'required',
		'jumlah_barang'   	=> 'required',
		'status'   			=> 'required',
		'tanggal_keluar'   	=> 'required',


	];

	public $notakeluar_errors = [

		'kode_nota'     	=> [
			'required'		=> 'Kode Nota Wajib Di isi'
		],

		'nama_barang'    => [
			'required'		=> 'Nama Barang Wajib Di isi'
		],

		'jumlah_barang'   	=> [
			'required'		=> 'Jumlah Barang Wajib Di isi'
		],
		'vendor_id'   		=>  [
			'required'		=> 'Data Vendor Wajib Di isi'
		],
		'tanggal_keluar'   	=>  [
			'required'		=> 'Data Tanggal keluar nota Wajib Di isi'
		],
		'status'   	=>  [
			'required'		=> 'Data Status nota Wajib Di isi'
		],
		'karyawan_id'   	=>  [
			'required'		=> 'Data Penanggung Jawab nota Wajib Di isi'
		]
	];



	public $karyawan = [
		'jabatan_id'			=> 'required',
		'nama_karyawan'     	=> 'required',
		'jk'     				=> 'required',
		'alamat'   				=> 'required',
		'divisi'   				=> 'required',
		'jabatan_id'   			=> 'required',
		'telephone'   			=> 'required',
		'status'   				=> 'required',
		'tanggalmasuk'   		=> 'required',



	];

	public $karyawan_errors = [

		'nama_karyawan'    => [
			'required'		=> 'Nama Barang Wajib Di isi'
		],
		'jk'     	=> [
			'required'		=> 'Jenis Kelamin  Wajib Di isi'
		],

		'alamat'    => [
			'required'		=> 'Nama Barang Wajib Di isi'
		],

		'divisi'   	=> [
			'required'		=> 'Jumlah Barang Wajib Di isi'
		],
		'jabatan_id'   		=>  [
			'required'		=> 'Data Vendor Wajib Di isi'
		],
		'telephone'   	=>  [
			'required'		=> 'Data Tanggal keluar nota Wajib Di isi'
		],
		'status'   	=>  [
			'required'		=> 'Data Status nota Wajib Di isi'
		],
		'tanggalmasuk'   	=>  [
			'required'		=> 'Data Penanggung Jawab nota Wajib Di isi'
		]
	];



	// validasi untuk  setiap field yang ada di Database 
	public $users = [
		'nama_user'			=> 'required',
		'username'     		=> 'required',
		'password'     		=> 'required',
		'level'   			=> 'required',

	];

	public $users_errors = [

		'nama_user'     	=> [
			'required'		=> 'Nama Users Wajib Di isi'
		],

		'username'     			=> [
			'required'		=> 'Username Wajib Di isi'
		],
		'password'   		=> [
			'required'		=> 'Password Wajib Di isi'
		],
		'level'   			=>  [
			'required'		=> ' Level Status Wajib Di isi'
		]
	];
}

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
		'user_id'				=> 'required',
		'bahasa_document'     	=> 'required',
		'tanggal_masuk'     	=> 'required',
		'created_at'   			=> 'required',
		'updated_at'   			=> 'required',
	];

	public $bahasa_errors = [

		'user_id'     	=> [
			'required'		=> 'Users Penanggung Jawab Wajib Diisi'
		],

		'bahasa_document'   => [
			'required'		=> 'Bahasa Doukument Wajib Di isi'
		],
		'tanggal_masuk'   	=> [
			'required'		=> 'Tanggal Terdata Dokumen Wajib Di isi'
		],
		'status'   			=>  [
			'required'		=> ' Status Data  Wajib Di isi'
		],
		'created_at'   		=>  [
			'required'		=> 'Created at Wajib Di isi'
		],
		'updated_at'   		=>  [
			'required'		=> 'updated_at Wajib Di isi'
		]

	];



	// validasi untuk  setiap field yang ada di Database 
	public $rak = [
		'user_id'			=> 'required',
		'nama_rak'     		=> 'required',
		'kode_rak'     		=> 'required',
		'tanggal_masuk'   	=> 'required',
		'created_at'   		=> 'required',
		'updated_at'   		=> 'required',
	];

	public $rak_errors = [

		'user_id'     	=> [
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
		'created_at'   		=>  [
			'required'		=> 'Created at Wajib Di isi'
		],
		'updated_at'   		=>  [
			'required'		=> 'updated_at Wajib Di isi'
		]
	];




	// validasi untuk  setiap field yang ada di Database 
	public $vendor = [
		'user_id'			=> 'required',
		'nama_vendor'     	=> 'required',
		'jenis_vendor'     	=> 'required',
		'tanggal_masuk'   	=> 'required',
		'created_at'   		=> 'required',
		'updated_at'   		=> 'required',
	];

	public $vendor_errors = [

		'user_id'     	=> [
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
		'created_at'   		=>  [
			'required'		=> 'Created at Wajib Di isi'
		],
		'updated_at'   		=>  [
			'required'		=> 'updated_at Wajib Di isi'
		]
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
		'user_id'   				=> 'required',
		'created_at'   				=> 'required',
		'updated_at'   				=> 'required',



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
		'user_id'   	=>  [
			'required'		=> 'Data Penanggung Jawab Document Wajib Di isi'
		],
		'created_at'   		=>  [
			'required'		=> 'Data Tanggal Pembuatan Document Wajib Di isi'
		],
		'updated_at'   		=>  [
			'required'		=> 'Data Update Wajib Di isi'
		]

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
		'user_id'   				=> 'required',
		'created_at'   				=> 'required',
		'updated_at'   				=> 'required',
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
		'user_id'   	=>  [
			'required'		=> 'Data Penanggung Jawab Document Wajib Di isi'
		],
		'created_at'   		=>  [
			'required'		=> 'Data Tanggal Pembuatan Document Wajib Di isi'
		],
		'updated_at'   		=>  [
			'required'		=> 'Data Update Wajib Di isi'
		]

	];





	// validasi untuk  setiap field yang ada di Database 
	public $drawingkode = [
		'idpengurus'		=> 'required',
		'foto'				=> 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1000]',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',
	];

	public $drawingkode_errors = [

		'idpengurus'     	=> [
			'required'		=> 'Pengurus Wajib Di isi'
		],

		'foto'     			=> [
			'mime_in'   => 'Gambar imam hanya boleh diisi dengan jpg, jpeg, png atau gif.',
			'max_size'  => 'Gambar imam maksimal 2mb',
			'uploaded'  => 'Gambar imam wajib diisi'
		],

		'nama'     			=> [
			'required'		=> 'Data nama Wajib Di isi'
		],
		'alamat'   		=> [
			'required'		=> 'Data Alamat Wajib Di isi'
		],
		'status'   			=>  [
			'required'		=> ' Data Status Wajib Di isi'
		],
		'handphone'   		=>  [
			'required'		=> 'Data Handphone  Wajib Di isi'
		],
		'tahun'   		=>  [
			'required'		=> 'Data Tahun Wajib Di isi'
		]

	];





	// validasi untuk  setiap field yang ada di Database 
	public $drawingtype = [
		'user_id'			=> 'required',
		'drawing_type'      => 'required',
		'tanggal_masuk'     => 'required',
		'created_at'   		=> 'required',
		'updated_at'   		=> 'required',
	];

	public $drawingtype_errors = [

		'drawing_type'     	=> [
			'required'		=> 'Drawing Type  Wajib Di isi'
		],

		'tanggal_masuk'   	=>  [
			'required'		=> 'Data Tanggal Masuk  Wajib Di isi'
		],
		'user_id'   	=>  [
			'required'		=> 'Data Penanggung Jawab Wajib Di isi'
		],
		'created_at'   		=>  [
			'required'		=> 'Data Tanggal Pembuatan Data Wajib Di isi'
		],
		'updated_at'   		=>  [
			'required'		=> 'Data Tanggal Update Data Wajib Di isi'
		]

	];





	// validasi untuk  setiap field yang ada di Database 
	public $jabatan = [
		'user_id'			=> 'required',
		'nama_jabatan'     	=> 'required',
		'jenis_jabatan'     => 'required',
		'tanggal_masuk'   	=> 'required',
		'created_at'   		=> 'required',
		'updated_at'   		=> 'required',
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
		'user_id'   	=>  [
			'required'		=> 'Data Penanggung Jawab Wajib Di isi'
		],
		'created_at'   		=>  [
			'required'		=> 'Data Tanggal Pembuatan Document Wajib Di isi'
		],
		'updated_at'   		=>  [
			'required'		=> 'Data Update Wajib Di isi'
		]


	];





	// validasi untuk  setiap field yang ada di Database 
	public $notamasuk = [
		'user_id'			=> 'required',
		'vendor_id'     	=> 'required',
		'kode_nota'     	=> 'required',
		'nama_barang'   	=> 'required',
		'jumlah_barang'   	=> 'required',
		'status'   			=> 'required',
		'tanggal_masuk'   	=> 'required',
		'created_at'   		=> 'required',
		'updated_at'   		=> 'required',
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
		'user_id'   	=>  [
			'required'		=> 'Data Penanggung Jawab nota Wajib Di isi'
		],
		'created_at'   		=>  [
			'required'		=> 'Data Tanggal Pembuatan nota Wajib Di isi'
		],
		'updated_at'   		=>  [
			'required'		=> 'Data Update Wajib Di isi'
		]

	];



	// validasi untuk  setiap field yang ada di Database 
	public $notakeluar = [
		'user_id'			=> 'required',
		'vendor_id'     	=> 'required',
		'kode_nota'     	=> 'required',
		'nama_barang'   	=> 'required',
		'jumlah_barang'   	=> 'required',
		'status'   			=> 'required',
		'tanggal_keluar'   	=> 'required',
		'created_at'   		=> 'required',
		'updated_at'   		=> 'required',

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
		'user_id'   	=>  [
			'required'		=> 'Data Penanggung Jawab nota Wajib Di isi'
		],
		'created_at'   		=>  [
			'required'		=> 'Data Tanggal Pembuatan nota Wajib Di isi'
		],
		'updated_at'   		=>  [
			'required'		=> 'Data Update Wajib Di isi'
		]

	];





	// validasi untuk  setiap field yang ada di Database 
	public $user = [
		'nama_user'			=> 'required',
		'username'     		=> 'required',
		'password'     		=> 'required',
		'level'   			=> 'required',
		'created_at'   		=> 'required',
		'updated_at'   		=> 'required',
	];

	public $user_errors = [

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
		],
		'created_at'   		=>  [
			'required'		=> 'Data Tanggal Pembuatan Wajib Di isi'
		],
		'updated_at'   		=>  [
			'required'		=> 'Data Update Wajib Di isi'
		]

	];
}

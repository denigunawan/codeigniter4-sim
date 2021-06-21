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



	// validasi untuk  Daftar Imam 
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



	// validasi untuk  Daftar Imam 
	public $rak = [
		'idpengurus'		=> 'required',
		'foto'				=> 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1000]',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',
	];

	public $rak_errors = [

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




	// validasi untuk  Daftar Imam 
	public $vendor = [
		'idpengurus'		=> 'required',
		'foto'				=> 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1000]',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',
	];

	public $vendor_errors = [

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




	// validasi untuk  Daftar Imam 
	public $documentkeluar = [
		'idpengurus'		=> 'required',
		'foto'				=> 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1000]',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',
	];

	public $documentkeluar_errors = [

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





	// validasi untuk  Daftar Imam 
	public $documentmasuk = [
		'idpengurus'		=> 'required',
		'foto'				=> 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1000]',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',
	];

	public $documentmasuk_errors = [

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





	// validasi untuk  Daftar Imam 
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





	// validasi untuk  Daftar Imam 
	public $drawingtype = [
		'idpengurus'		=> 'required',
		'foto'				=> 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1000]',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',
	];

	public $drawingtype_errors = [

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





	// validasi untuk  Daftar Imam 
	public $jabatan = [
		'idpengurus'		=> 'required',
		'foto'				=> 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1000]',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',
	];

	public $jabatan_errors = [

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





	// validasi untuk  Daftar Imam 
	public $notamasuk = [
		'idpengurus'		=> 'required',
		'foto'				=> 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1000]',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',
	];

	public $notamasuk_errors = [

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



	// validasi untuk  Daftar Imam 
	public $notakeluar = [
		'idpengurus'		=> 'required',
		'foto'				=> 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1000]',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',
	];

	public $notakeluar_errors = [

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





	// validasi untuk  Daftar Imam 
	public $user = [
		'idpengurus'		=> 'required',
		'foto'				=> 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1000]',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',
	];

	public $user_errors = [

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
}

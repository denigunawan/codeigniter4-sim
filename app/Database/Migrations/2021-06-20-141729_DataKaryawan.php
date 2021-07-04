<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataKaryawan extends Migration
{
	public function up()
	{

		//list field
		$this->forge->addField([
			'karyawan_id'          => [
				'type'           => 'INT',
				'constraint'     => 36,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'nama_karyawan'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'jk'				=> [
				'type'			=> 'ENUM',
				'constraint'	=> "'Pria','Wanita'",
				'default'		=> 'Pria'
			],
			'telephone'      	 => [
				'type'           => 'VARCHAR',
				'constraint'	 => '15'
			],
			'alamat'      		=> [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'divisi'      		  => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'jabatan_id'			    => [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'status'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'AKTIF','OFF'",
				'default'			=> 'AKTIF'
			],
			'tanggalmasuk'			=> [
				'type'				=> 'DATE',
			],

		]);
		//primary key
		$this->forge->addKey('karyawan_id', TRUE);
		$this->forge->createTable('karyawan', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('karyawan');
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarVendorSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'vendor_id'				=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'nama_vendor'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'jenis_vendor'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'tanggal_masuk'			=> [
				'type'				=> 'DATE',
			],

			'karyawan_id'			    => [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			]
		]);

		$this->forge->addKey('vendor_id', true);
		$this->forge->addForeignKey('karyawan_id', 'karyawan', 'karyawan_id', 'cascade', 'cascade');
		$this->forge->createTable('vendor', true);
	}

	public function down()
	{
		$this->forge->dropTable('vendor', true);
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarVendorSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'vendor_id'		=> [
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

			'userid'			    => [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
		]);

		$this->forge->addKey('vendor_id', true);
		$this->forge->addForeignKey('userid', 'users', 'userid', 'cascade', 'cascade');
		$this->forge->createTable('daftar_vendor', true);
	}

	public function down()
	{
		$this->forge->dropTable('daftar_vendor', true);
	}
}

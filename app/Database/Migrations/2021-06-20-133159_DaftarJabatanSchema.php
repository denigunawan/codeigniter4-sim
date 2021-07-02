<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarJabatanSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'jabatan_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'nama_jabatan'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'jenis_jabatan'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'tanggal_masuk'			=> [
				'type'				=> 'DATE',
			],
		]);

		$this->forge->addKey('jabatan_id', true);
		$this->forge->createTable('jabatan', true);
	}

	public function down()
	{
		$this->forge->dropTable('jabatan', true);
	}
}

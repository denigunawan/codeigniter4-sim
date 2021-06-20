<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarRakSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'rak_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'nama_rak'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'kode_rak'				=> [
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

		$this->forge->addKey('rak_id', true);
		$this->forge->addForeignKey('userid', 'users', 'userid', 'cascade', 'cascade');
		$this->forge->createTable('daftar_rak', true);
	}

	public function down()
	{
		$this->forge->dropTable('daftar_rak', true);
	}
}

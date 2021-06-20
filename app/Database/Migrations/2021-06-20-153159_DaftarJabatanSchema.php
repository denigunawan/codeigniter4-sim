<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarJabatanSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'daftar_jabatan_id'		=> [
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
			'userid'			    => [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],

		]);

		$this->forge->addKey('daftar_jabatan_id', true);
		$this->forge->addForeignKey('userid', 'users', 'userid', 'cascade', 'cascade');
		$this->forge->createTable('daftar_jabatan', true);
	}

	public function down()
	{
		$this->forge->dropTable('daftar_jabatan', true);
	}
}

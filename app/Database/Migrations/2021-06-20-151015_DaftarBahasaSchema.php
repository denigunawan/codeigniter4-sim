<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarBahasaSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'bahasa_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'bahasa_document'		=> [
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

		$this->forge->addKey('bahasa_id', true);
		$this->forge->addForeignKey('karyawan_id', 'karyawan', 'karyawan_id', 'cascade', 'cascade');
		$this->forge->createTable('bahasa', true);
	}

	public function down()
	{
		$this->forge->dropTable('bahasa', true);
	}
}

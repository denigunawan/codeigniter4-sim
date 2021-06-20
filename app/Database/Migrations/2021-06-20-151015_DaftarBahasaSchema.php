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
			'userid'			    => [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
		]);

		$this->forge->addKey('bahasa_id', true);
		$this->forge->addForeignKey('userid', 'users', 'userid', 'cascade', 'cascade');
		$this->forge->createTable('daftar_bahasa', true);
	}

	public function down()
	{
		$this->forge->dropTable('daftar_bahasa', true);
	}
}
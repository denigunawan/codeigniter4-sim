<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarDrawingKodeSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'drawing_kode_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'drawing_kode'			=> [
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

		$this->forge->addKey('drawing_kode_id', true);
		$this->forge->addForeignKey('userid', 'users', 'userid', 'cascade', 'cascade');
		$this->forge->createTable('drawing_kode', true);
	}

	public function down()
	{
		$this->forge->dropTable('drawing_kode', true);
	}
}

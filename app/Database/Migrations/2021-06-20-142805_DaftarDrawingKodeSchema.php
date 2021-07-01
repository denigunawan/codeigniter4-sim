<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarDrawingKodeSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'drawingkode_id'		=> [
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

			'user_id'			    => [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			]
		]);

		$this->forge->addKey('drawingkode_id', true);
		$this->forge->addForeignKey('user_id', 'user', 'user_id', 'cascade', 'cascade');
		$this->forge->createTable('drawingkode', true);
	}

	public function down()
	{
		$this->forge->dropTable('drawingkode', true);
	}
}

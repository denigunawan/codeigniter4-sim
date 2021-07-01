<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarDrawingTypeSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'drawingtype_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'drawing_type'			=> [
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

		$this->forge->addKey('drawingtype_id', true);
		$this->forge->addForeignKey('user_id', 'user', 'user_id', 'cascade', 'cascade');
		$this->forge->createTable('drawingtype', true);
	}

	public function down()
	{
		$this->forge->dropTable('drawingtype', true);
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarDrawingTypeSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'drawing_type_id'		=> [
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

			'userid'			    => [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
		]);

		$this->forge->addKey('drawing_type_id', true);
		$this->forge->addForeignKey('userid', 'users', 'userid', 'cascade', 'cascade');
		$this->forge->createTable('drawing_type', true);
	}

	public function down()
	{
		$this->forge->dropTable('drawing_type', true);
	}
}

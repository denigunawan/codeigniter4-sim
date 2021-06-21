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
			'user_id'			    => [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			]
		]);

		$this->forge->addKey('bahasa_id', true);
		$this->forge->addForeignKey('user_id', 'user', 'user_id', 'cascade', 'cascade');
		$this->forge->createTable('bahasa', true);
	}

	public function down()
	{
		$this->forge->dropTable('bahasa', true);
	}
}

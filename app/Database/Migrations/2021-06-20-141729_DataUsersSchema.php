<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftaUsersSchema extends Migration
{
	public function up()
	{

		//list field
		$this->forge->addField([
			'user_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'nama_user'              => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],

			'username'               => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'password'               => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'level'                 => [
				'type'          => 'INT',
				'constraint'    => 11
			]
		]);
		//primary key
		$this->forge->addKey('user_id', TRUE);
		//nama tabel
		$this->forge->createTable('user', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}

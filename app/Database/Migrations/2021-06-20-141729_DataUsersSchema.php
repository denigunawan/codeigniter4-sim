<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftaUsersSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
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
			'level'             => [
				'type'          => 'INT',
				'constraint'    => 11
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('users', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}

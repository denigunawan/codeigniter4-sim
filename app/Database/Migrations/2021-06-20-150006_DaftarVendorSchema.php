<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarVendorSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'vendor_id'				=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'nama_vendor'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'jenis_vendor'			=> [
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

		$this->forge->addKey('vendor_id', true);
		$this->forge->addForeignKey('user_id', 'user', 'user_id', 'cascade', 'cascade');
		$this->forge->createTable('vendor', true);
	}

	public function down()
	{
		$this->forge->dropTable('vendor', true);
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarNotaMasukSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'nota_masuk_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'kode_nota'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'nama_barang'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'jumlah_barang'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'status'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'Masuk','Proses','Keluar'",
				'default'			=> 'Masuk'
			],
			'vendor_id'			    => [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
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

		$this->forge->addKey('nota_masuk_id', true);
		$this->forge->addForeignKey('userid', 'users', 'userid', 'cascade', 'cascade');
		$this->forge->addForeignKey('vendor_id', 'daftar_vendor', 'vendor_id', 'cascade', 'cascade');
		$this->forge->createTable('nota_masuk', true);
	}

	public function down()
	{
		$this->forge->dropTable('nota_masuk', true);
	}
}

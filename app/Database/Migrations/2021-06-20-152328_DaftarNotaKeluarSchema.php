<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarNotaKeluarSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'notakeluar_id'		=> [
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
			'vendor_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'tanggal_keluar'		=> [
				'type'				=> 'DATE',
			],
			'karyawan_id'			    => [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			]

		]);

		$this->forge->addKey('notakeluar_id', true);
		$this->forge->addForeignKey('karyawan_id', 'karyawan', 'karyawan_id', 'cascade', 'cascade');
		$this->forge->addForeignKey('vendor_id', 'vendor', 'vendor_id', 'cascade', 'cascade');
		$this->forge->createTable('notakeluar', true);
	}

	public function down()
	{
		$this->forge->dropTable('notakeluar', true);
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarDocumentMasukSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'documentmasuk_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'kode_dokumen'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'drawingtype_id'			=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'drawingkode_id'			=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'judul_dokumen'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'rak_id'				=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'vendor_id'				=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'bahasa_id'			    => [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'tanggal_masuk'			=> [
				'type'				=> 'DATE',
			],
			'status'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'Masuk','Proses','Keluar'",
				'default'			=> 'Masuk'
			],
			'karyawan_id'			    => [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			]
		]);


		$this->forge->addKey('documentmasuk_id', true);
		$this->forge->addForeignKey('karyawan_id', 'karyawan', 'karyawan_id', 'cascade', 'cascade');
		$this->forge->addForeignKey('vendor_id', 'vendor', 'vendor_id', 'cascade', 'cascade');
		$this->forge->addForeignKey('drawingtype_id', 'drawingtype', 'drawingtype_id', 'cascade', 'cascade');
		$this->forge->addForeignKey('drawingkode_id', 'drawingkode', 'drawingkode_id', 'cascade', 'cascade');
		$this->forge->addForeignKey('rak_id', 'rak', 'rak_id', 'cascade', 'cascade');
		$this->forge->addForeignKey('bahasa_id', 'bahasa', 'bahasa_id', 'cascade', 'cascade');
		$this->forge->createTable('documentmasuk', true);
	}

	public function down()
	{
		$this->forge->dropTable('documentmasuk', true);
	}
}

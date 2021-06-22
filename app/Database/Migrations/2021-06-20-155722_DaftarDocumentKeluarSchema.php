<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarDocumentKeluarSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'document_keluar_id'	=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'kode_dokumen'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'drawingtype_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'drawingkode_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'nomer_box'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'isi_box'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'vendor_id'		=> [
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
			'tanggal_keluar'			=> [
				'type'				=> 'DATE',
			],
			'status'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'Masuk','Proses','Keluar'",
				'default'			=> 'Masuk'
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


		$this->forge->addKey('document_keluar_id', true);
		$this->forge->addForeignKey('user_id', 'user', 'user_id', 'cascade', 'cascade');
		$this->forge->addForeignKey('vendor_id', 'vendor', 'vendor_id', 'cascade', 'cascade');
		$this->forge->addForeignKey('drawingtype_id', 'drawingtype', 'drawingtype_id', 'cascade', 'cascade');
		$this->forge->addForeignKey('drawingkode_id', 'drawingkode', 'drawingkode_id', 'cascade', 'cascade');
		$this->forge->addForeignKey('bahasa_id', 'bahasa', 'bahasa_id', 'cascade', 'cascade');
		$this->forge->createTable('documentkeluar', true);
	}

	public function down()
	{
		$this->forge->dropTable('documentkeluar', true);
	}
}

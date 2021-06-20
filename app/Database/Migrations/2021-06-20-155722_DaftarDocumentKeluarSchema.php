<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarDocumentKeluarSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'document_keluar_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'kode_dokumen'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'drawing_type_id'			=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'drawing_kode_id'			=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'nomer_box'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'isi_box'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'vendor_id'			    => [
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
			'userid'			    => [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
		]);


		$this->forge->addKey('document_keluar_id', true);
		$this->forge->addForeignKey('userid', 'users', 'userid', 'cascade', 'cascade');
		$this->forge->addForeignKey('vendor_id', 'daftar_vendor', 'vendor_id', 'cascade', 'cascade');
		$this->forge->addForeignKey('drawing_type_id', 'drawing_type', 'drawing_type_id', 'cascade', 'cascade');
		$this->forge->addForeignKey('drawing_kode_id', 'drawing_kode', 'drawing_kode_id', 'cascade', 'cascade');
		$this->forge->addForeignKey('bahasa_id', 'daftar_bahasa', 'bahasa_id', 'cascade', 'cascade');
		$this->forge->createTable('document_keluar', true);
	}

	public function down()
	{
		$this->forge->dropTable('document_keluar', true);
	}
}

<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Books extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'name'       => [
					'type'           => 'VARCHAR',
					'unsigned'       => true,
					'constraint'     => '255',
			],
			'isbn'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '255',
			],
			'authors' => [
					'type'           => 'TEXT',
					'null'           => true,
			],
			'number_of_pages'       => [
				'type'           => 'INT',
				'constraint'     => '11',
			],
			'publisher'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '255',
			],
			'country'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '255',
			],
			'release_date'       => [
					'type'           => 'datetime',
					'null' => true,
			],
			'created_at' => [
					'type' => 'datetime',
					'null' => true,
			],
			'updated_at' => [
					'type' => 'datetime',
					'null' => true,
			],
			'deleted_at' => [
					'type' => 'datetime',
					'null' => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('books');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('books');
	}
}

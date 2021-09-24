<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangKeluar extends Migration
{
    protected $db;
    protected function __construct()
    {
        $this->db = \Config\Database::connect();
    }


    public function up()
    {
        $this->forge->addField([
            'id_barang_keluar' => [
                'type' => 'VARCHAR',
                'constraint' => '36'
            ],
            'id_user' => [
                'type' => 'VARCHAR',
                'constraint' => '36'
            ],
            'id_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '36'
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => '3'
            ],
            'id_barang_keluar' => [
                'type' => 'VARCHAR',
                'constraint' => '36'
            ],
            'tanggal_keluar' => [
                'type' => 'DATETIME'
            ],
            'create_date' => [
                'type' => 'DATETIME'
            ],
            'update_date' => [
                'type' => 'DATETIME'
            ],
            'delete_date' => [
                'type' => 'DATETIME'
            ],
            'create_by' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'update_by' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'delete_by' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ]
        ]);
        // Membuat primary key
        $this->forge->addKey('id_barang_keluar', true);
        $this->forge->addForeignKey('id_user', 'user', 'id_user');

        //membuat table
        $this->forge->createTable('barang_keluar', true);
    }

    public function down()
    {
        $this->forge->dropTable('barang_masuk');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangKeluar extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_barang_keluar' => [
                'type' => 'VARCHAR',
                'constraint' => '37'
            ],
            'id_pengguna' => [
                'type' => 'VARCHAR',
                'constraint' => '37'
            ],
            'id_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '37'
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => '3'
            ],
            'tanggal_keluar' => [
                'type' => 'DATETIME'
            ],
            'create_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'update_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'delete_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'create_by' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true
            ],
            'update_by' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true
            ],
            'delete_by' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true
            ]
        ]);

        // Membuat primary key
        $this->forge->addKey('id_barang_keluar', true);

        // menambah dan mengubah foreign key
        $this->forge->addForeignKey('id_barang','barang','id_barang','CASCADE','CASCADE');
        $this->forge->addForeignKey('id_pengguna','pengguna','id_pengguna','CASCADE','CASCADE');

        //membuat table
        $this->forge->createTable('barang_keluar', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('barang_keluar');
    }
}

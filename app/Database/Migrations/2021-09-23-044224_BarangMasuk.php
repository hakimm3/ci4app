<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangMasuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang_masuk' => [
                'type' => 'VARCHAR',
                'constraint' => '36',
            ],
            'id_user' => [
                'type' => 'VARCHAR',
                'constraint' => '36',
            ],
            'no_faktur' => [
                'type' => 'INT',
                'constraint' => '3',
            ],
            'barang_id' => [
                'type' => 'VARCHAR',
                'constraint' => '36',
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => 3,
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
        $this->forge->addKey('id_barang_masuk', true);
        $this->forge->addForeignKey('id_user', 'user', 'id_user');

        //membuat table
        $this->forge->createTable('barang_masuk', true);
        $this->db->enableForeignKeyChecks();
    }



    public function down()
    {
        $this->forge->dropTable('barang_masuk');
    }
}

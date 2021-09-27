<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangMasuk extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        
        $this->forge->addField([
            'id_barang_masuk' => [
                'type' => 'VARCHAR',
                'constraint' => '33',
            ],
            'id_pengguna' => [
                'type' => 'VARCHAR',
                'constraint' => '37',
            ],
            'no_faktur' => [
                'type' => 'INT',
                'constraint' => '8',
            ],
            'id_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '37',
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => '3',
            ],
            'create_at' => [
                'type' => 'DATETIME'
            ],
            'update_at' => [
                'type' => 'DATETIME'
            ],
            'delete_at' => [
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
            ],
            'id_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '37',
                'after' => 'no_faktur'
            ]
        ]);
        
        // Membuat primary key
        $this->forge->addKey('id_barang_masuk', true);

        // menambah foreign key
        $this->forge->addForeignKey('id_kategori','kategori','id_kategori','CASCADE','CASCADE');
        $this->forge->addForeignKey('id_pengguna', 'pengguna', 'id_pengguna','CASCADE','CASCADE');        
        $this->forge->addForeignKey('id_barang','barang','id_barang','CASCADE','CASCADE');

        //membuat table
        $this->forge->createTable('barang_masuk', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('barang_masuk');
    }
}

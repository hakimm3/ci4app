<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '37'
            ],
            'id_pengguna' => [
                'type' => 'VARCHAR',
                'constraint' => '37'
            ],
            'id_konsumen' => [
                'type' => 'VARCHAR',
                'constraint' => '37'
            ],
            'id_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '37'
            ],
            'id_pemasok' => [
                'type' => 'VARCHAR',
                'constraint' => '37'
            ],
            'produk' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'stok' => [
                'type' => 'int',
                'constraint' => '3'
            ],
            'min_stok' => [
                'type' => 'int',
                'constraint' => '1'
            ],
            'satuan' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'created_at' => [
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
        $this->forge->addKey('id_barang', true);
        
        // menambah dan mengubah foreign key
        $this->forge->addForeignKey('id_pengguna','pengguna','id_pengguna','CASCADE','CASCADE');
        $this->forge->addForeignKey('id_konsumen','konsumen','id_konsumen','CASCADE','CASCADE');
        $this->forge->addForeignKey('id_kategori','kategori','id_kategori','CASCADE','CASCADE');
        $this->forge->addForeignKey('id_pemasok','pemasok','id_pemasok','CASCADE','CASCADE');

        //membuat table
        $this->forge->createTable('barang', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}

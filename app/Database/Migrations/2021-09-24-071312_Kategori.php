<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '37',
            ],
            'nama_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
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
        $this->forge->addKey('id_kategori', true);

        //membuat table
        $this->forge->createTable('kategori', true);
    }

    public function down()
    {
        $this->forge->dropTable('kategori');
    }
}

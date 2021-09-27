<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Konsumen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_konsumen' => [
                'type' => 'VARCHAR',
                'constraint' => '37',
            ],
            'konsumen' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '14',
            ],
            'active' => [
                'type' => 'CHAR',
                'constraint' => '1',
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
        $this->forge->addKey('id_konsumen', true);

        //membuat table
        $this->forge->createTable('konsumen', true);
    }

    public function down()
    {
        $this->forge->dropTable('konsumen');
    }
}

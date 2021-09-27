<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengguna extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengguna' => [
                'type' => 'VARCHAR',
                'constraint' => '37'
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'alamat' => [
                'type' => 'text',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '13'
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'level' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
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
        $this->forge->addKey('id_pengguna', true);

        //membuat table
        $this->forge->createTable('pengguna', true);
    }

    public function down()
    {
        $this->forge->dropTable('pengguna');
    }
}

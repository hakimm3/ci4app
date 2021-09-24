<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type' => 'VARCHAR',
                'constraint' => '36'
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '15'
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'level' => [
                'type' => 'VARCHAR',
                'constraint' => '36'
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
        $this->forge->addKey('id_user', true);

        //membuat table
        $this->forge->createTable('user', true);
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}

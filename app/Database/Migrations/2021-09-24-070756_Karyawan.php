<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_karyawan' => [
                'type' => 'VARCHAR',
                'constraint' => '37',
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
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
            ]
        ]);
        
        // Membuat primary key
        $this->forge->addKey('id_karyawan', true);

        //membuat table
        $this->forge->createTable('karyawan', true);
    }

    public function down()
    {
        $this->forge->dropTable('karyawan');
    }
}

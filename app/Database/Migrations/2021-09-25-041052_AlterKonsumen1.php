<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterKonsumen1 extends Migration
{
    public function up()
    {
        // men-disable foreign key agar migrasi tidak error
        $this->db->disableForeignKeyChecks();

        $fields = [
            // field yang diubah
            'modFields' => [
                'delete_at' => [
                    'name' => 'deleted_at',
                    'type' => 'DATETIME'
                ],
                'create_at' => [
                    'name' => 'created_at',
                    'type' => 'DATETIME'
                ],
                'update_at' => [
                    'name' => 'updated_at',
                    'type' => 'DATETIME'
                ],
                'konsumen' => [
                    'name' => 'nama_konsumen',
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
            ],
            // field yang ditambah
            'addFields' => [
                'delete_flag' => [
                    'type' => 'TINYINT',
                    'constraint' => '1',
                    'default' => '1',
                    'after' => 'delete_by'
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'after' => 'phone'
                ]
            ]
        ];
        
        // menambah, menghapus dan mengubah field
        $this->forge->addColumn('konsumen', $fields['addFields']);
        $this->forge->modifyColumn('konsumen', $fields['modFields']);
        $this->forge->dropColumn('konsumen', 'active');

        // meng-enable foreign key
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        // men-disable foreign key agar migrasi tidak error
        $this->db->disableForeignKeyChecks();

        // mengembalikan field ke keadaan sebelummnya
        $this->forge->dropColumn('konsumen', 'delete_flag, email');

        $this->forge->addColumn('konsumen', [
            'active' => [
                'type' => 'CHAR',
                'constraint' => '1',
            ],
        ]);

        $this->forge->modifyColumn('konsumen', [
            'deleted_at' => [
                'name' => 'delete_at',
                'type' => 'DATETIME'
            ],
            'created_at' => [
                'name' => 'create_at',
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'name' => 'update_at',
                'type' => 'DATETIME'
            ],
            'nama_konsumen' => [
                'name' => 'konsumen',
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
        ]);
        
        // meng-enable foreign key
        $this->db->enableForeignKeyChecks();
    }
}

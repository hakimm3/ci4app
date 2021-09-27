<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterKategori1 extends Migration
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
            ],
            // field yang ditambah
            'addFields' => [
                'delete_flag' => [
                    'type' => 'TINYINT',
                    'constraint' => '1',
                    'default' => '1',
                    'after' => 'delete_by'
                ]
            ]
        ];
        
        // menambah dan mengubah field
        $this->forge->addColumn('kategori', $fields['addFields']);
        $this->forge->modifyColumn('kategori', $fields['modFields']);

        // meng-enable foreign key
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        // men-disable foreign key agar migrasi tidak error
        $this->db->disableForeignKeyChecks();

        // mengembalikan field ke keadaan sebelummnya
        $this->forge->dropColumn('kategori', 'delete_flag');

        $this->forge->modifyColumn('kategori', [
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
        ]);
        
        // meng-enable foreign key
        $this->db->enableForeignKeyChecks();
    }
}

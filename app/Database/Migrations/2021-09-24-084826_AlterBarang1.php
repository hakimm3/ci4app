<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterBarang1 extends Migration
{
    public function up()
    {
        // men-disable foreign key agar migrasi tidak error
        $this->db->disableForeignKeyChecks();

        $fields = [
            // field yang diubah
            'modFields' => [
                'produk' => [
                    'name' => 'nama_barang',
                    'type' => 'VARCHAR',
                    'constraint' => '50'
                ],
                'delete_at' => [
                    'name' => 'deleted_at',
                    'type' => 'DATETIME'
                ]
            ],
            // field yang ditambahkan
            'addFields' => [
                'delete_flag' => [
                    'type' => 'TINYINT',
                    'constraint' => '1',
                    'default' => '1',
                    'after' => 'delete_by'
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                    'after' => 'created_at',
                    'null' => true
                ],
                'kondisi' => [
                    'type' => 'ENUM',
                    'constraint' => ['baik', 'rusak'],
                    'default' => 'baik',
                    'after' => 'satuan'
                ]
            ]
        ];

        // menambah dan mengubah field
        $this->forge->addColumn('barang', $fields['addFields']);
        $this->forge->modifyColumn('barang', $fields['modFields']);

        // meng-enable foreign key
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        // men-disable foreign key agar migrasi tidak error
        $this->db->disableForeignKeyChecks();

        // mengembalikan field ke keadaan sebelummnya
        $this->forge->dropColumn('barang', 'delete_flag, updated_at, kondisi');
        $this->forge->modifyColumn('barang', [
            'nama_barang' => [
                'name' => 'produk',
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'deleted_at' => [
                'name' => 'delete_at',
                'type' => 'DATETIME'
            ]
        ]);

        $this->db->enableForeignKeyChecks();
    }
}

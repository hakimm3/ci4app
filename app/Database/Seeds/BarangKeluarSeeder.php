<?php

namespace App\Database\Seeds;

// require_once '..\vendor\autoload.php';

use CodeIgniter\Database\Seeder;

class BarangKeluarSeeder extends Seeder
{
    protected $db;

    public function run()
    {
        $this->db = \Config\Database::connect();
        // $this->faker = Faker\Factory::create('id_ID');

        for ($i = 0; $i < 15; $i++) {
            $id_konsumen = static::faker()->uuid();
            $id_kategori = static::faker()->uuid();
            $id_pemasok = static::faker()->uuid();
            $id_barang = static::faker()->uuid();

            $data = [
                'barang_keluar' => [
                    'id_barang_keluar' => static::faker()->uuid(),
                    'id_barang' => $id_barang,
                    'qty' => static::faker()->randomNumber(2, false),
                    'tanggal_keluar' => static::faker()->date(),
                    'created_at' => static::faker()->dateTimeBetween('-4 week')->format('Y-m-d H:i:s'),
                    'updated_at' => static::faker()->dateTimeBetween('-4 week')->format('Y-m-d H:i:s'),
                    'create_by' => static::faker()->name(),
                    'update_by' => static::faker()->name()
                ],
                'barang' => [
                    'id_barang' => $id_barang,
                    'id_konsumen' => $id_konsumen,
                    'id_kategori' => $id_kategori,
                    'id_pemasok' => $id_pemasok,
                    'nama_barang'    => static::faker()->word(),
                    'stok' => static::faker()->randomNumber(3, false),
                    'min_stok' => static::faker()->randomDigit(),
                    'satuan' => 'buah',
                    'created_at' => static::faker()->dateTimeBetween('-4 week')->format('Y-m-d H:i:s'),
                    'updated_at' => static::faker()->dateTimeBetween('-4 week')->format('Y-m-d H:i:s'),
                    'create_by' => static::faker()->name(),
                    'update_by' => static::faker()->name()
                ],
                'konsumen' => [
                    'id_konsumen' => $id_konsumen,
                    'nama_konsumen'    => static::faker()->name(),
                    'alamat' => static::faker()->address(),
                    'phone' => static::faker()->phoneNumber(),
                    'email' => static::faker()->email(),
                    'created_at' => static::faker()->dateTimeBetween('-4 week')->format('Y-m-d H:i:s'),
                    'updated_at' => static::faker()->dateTimeBetween('-4 week')->format('Y-m-d H:i:s'),
                    'create_by' => static::faker()->name(),
                    'update_by' => static::faker()->name()
                ],
                'kategori' => [
                    'id_kategori' => $id_kategori,
                    'nama_kategori' => static::faker()->word(),
                    'created_at' => static::faker()->dateTimeBetween('-4 week')->format('Y-m-d H:i:s'),
                    'updated_at' => static::faker()->dateTimeBetween('-4 week')->format('Y-m-d H:i:s'),
                    'create_by' => static::faker()->name(),
                    'update_by' => static::faker()->name()
                ],
                'pemasok' => [
                    'id_pemasok' => $id_pemasok,
                    'nama_pemasok'    => static::faker()->name(),
                    'alamat' => static::faker()->address(),
                    'phone' => static::faker()->phoneNumber(),
                    'email' => static::faker()->email(),
                    'created_at' => static::faker()->dateTimeBetween('-4 week')->format('Y-m-d H:i:s'),
                    'updated_at' => static::faker()->dateTimeBetween('-4 week')->format('Y-m-d H:i:s'),
                    'create_by' => static::faker()->name(),
                    'update_by' => static::faker()->name()
                ]
            ];

            // Using Query Builder
            $this->db->table('konsumen')->insert($data['konsumen']);
            $this->db->table('kategori')->insert($data['kategori']);
            $this->db->table('pemasok')->insert($data['pemasok']);

            $this->db->table('barang')->insert($data['barang']);
            $this->db->table('barang_keluar')->insert($data['barang_keluar']);
        }
    }
}

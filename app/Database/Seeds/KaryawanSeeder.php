<?php

namespace App\Database\Seeds;

require_once '..\vendor\autoload.php';

use CodeIgniter\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    protected $db;

    public function run()
    {
        $this->db = \Config\Database::connect();
        // $this->faker = Faker\Factory::create('id_ID');

        for ($i=0; $i < 100; $i++) { 
            $data = [
                'karyawan' => [
                    'id_karyawan' => static::faker()->uuid(),
                    'nama_karyawan'    => static::faker()->name(),
                    'alamat' => static::faker()->address(),
                    'phone' => static::faker()->phoneNumber(),
                    'email' => static::faker()->email(),
                    'jabatan' => static::faker()->jobTitle(),
                    // 'created_at' => static::faker()->dateTimeBetween('-4 week'),
                    // 'updated_at' => static::faker()->dateTimeBetween('-4 week'),
                    // 'create_by' => static::faker()->name(),
                    // 'update_by' => static::faker()->name()
                ]
            ];

            // Using Query Builder
            $this->db->table('karyawan')->insert($data['karyawan']);
        }
    }
}

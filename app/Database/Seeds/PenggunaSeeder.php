<?php

namespace App\Database\Seeds;

// require_once '..\vendor\autoload.php';

use CodeIgniter\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    protected $db;

    public function run()
    {
        $this->db = \Config\Database::connect();
        // $this->faker = Faker\Factory::create('id_ID');
        $data = [
            'pengguna' => [
                'id_pengguna' => "4052ba06-8916-4f68-a2b4-fa5f6452b2b2",
                'nama_pengguna'    => "Trisa Abdul Hakim",
                'alamat' => "Ds. Kejobong",
                'phone' => "082325150653",
                'email' => "hakimpbg@aa.com",
                'username' => "hakim",
                'password' => "$2y$10$16IwPlJlVVt/zEsRfS3HMOt7VaE4STKbnHy68alFWcpNBiT/Kt2iu",
                'level' => 'super_admin'
            ],
        ];

        // Using Query Builder
        $this->db->table('pengguna')->insert($data['pengguna']);
    }
}

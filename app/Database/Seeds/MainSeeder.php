<?php

namespace App\Database\Seeds;

require_once '..\vendor\autoload.php';

use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        // menjalankan semua seeder
        $this->call('BarangSeeder');
        $this->call('BarangKeluarSeeder');
        $this->call('BarangMasukSeeder');
        $this->call('KaryawanSeeder');
        // $this->call('KategoriSeeder');
        // $this->call('KonsumenSeeder');
        // $this->call('PemasokSeeder');
        // $this->call('PenggunaSeeder');
    }
}

<?php

namespace App\Controllers;

class Transaksi extends BaseController
{
    public function barangmasuk()
    {
        $data = [
            "title" => "Transaksi Barang Masuk"
        ];
        return view('Transaksi/barangmasuk', $data);
    }

    public function barangkeluar()
    {
        $data = [
            "title" => "Transaksi Barang Keluar"
        ];
        return view('Transaksi/barangkeluar', $data);
    }
}

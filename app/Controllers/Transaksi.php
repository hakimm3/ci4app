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

    public function tambahbarangkeluar()
    {
        $data = [
            "title" => "Tambah Barang Keluar"
        ];
        return view('Transaksi/tambahbarangkeluar', $data);
    }

    public function tambahbarangmasuk()
    {
        $data = [
            "title" => "Tambah Barang Masuk"
        ];
        return view('Transaksi/tambahbarangmasuk', $data);
    }
}

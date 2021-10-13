<?php

namespace App\Controllers;

class Laporan extends BaseController
{
    public function laporanbarangmasuk()
    {
        $data = [
            "title" => "Laporan barang Masuk"
        ];
        return view('Laporan/laporanbarangmasuk', $data);
    }

    public function laporanbarangkeluar()
    {
        $data = [
            "title" => "Laporan barang Keluar"
        ];
        return view('Laporan/laporanbarangkeluar', $data);
    }

    public function laporanpemasok()
    {
        $data = [
            "title" => "Laporan Pemasok"
        ];
        return view('Laporan/laporanpemasok', $data);
    }
    public function laporankonsumen()
    {
        $data = [
            "title" => "Laporan Konsumen"
        ];
        return view('Laporan/laporankonsumen', $data);
    }
}

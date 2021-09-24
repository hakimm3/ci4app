<?php

namespace App\Controllers;

class Manage extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function karyawan()
    {
        $query = $this->db->query("SELECT nama, alamat, phone FROM karyawan");
        $karyawan = $query->getResultArray();

        $data = [
            "title" => "Manajemen Karyawan",
            "karyawan" => $karyawan
        ];
        return view('Manage/karyawan', $data);
    }

    public function pemasok()
    {
        return view('Manage/pemasok');
    }

    public function konsumen()
    {
        return view('Manage/konsumen');
    }
}

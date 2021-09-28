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
        $query = $this->db->query("SELECT nama_karyawan, alamat, phone FROM karyawan");
        $karyawan = $query->getResultArray();

        $data = [
            "title" => "Manajemen Karyawan",
            "active" => "manage-karyawan",
            "karyawan" => $karyawan
        ];
        return view('Manage/karyawan', $data);
    }

    public function pemasok()
    {
        $query = $this->db->query("SELECT nama_pemasok, alamat, phone FROM pemasok");
        $pemasok = $query->getResultArray();

        $data = [
            "title" => "Manajemen Pemasok",
            "active" => "manage-pemasok",
            "pemasok" => $pemasok
        ];
        return view('Manage/pemasok', $data);
    }
    
    public function konsumen()
    {
        $query = $this->db->query("SELECT nama_konsumen, alamat, phone FROM konsumen");
        $konsumen = $query->getResultArray();
        
        $data = [
            "title" => "Manajemen Konsumen",
            "active" => "manage-konsumen",
            "konsumen" => $konsumen
        ];
        return view('Manage/konsumen', $data);
    }
}

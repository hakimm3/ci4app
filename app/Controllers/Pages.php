<?php

namespace App\Controllers;

use CodeIgniter\Database\Query;

class Pages extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $query = $this->db->query('SELECT count(stok) as stok_kosong FROM barang WHERE stok=0');
        $stok_kosonng = $query->getResultArray();
        $data = [
            'stok_kosong' => $stok_kosonng,
            "title" => "Beranda",
            "active" => "beranda"
        ];
        return view('Pages/index', $data);
    }


    public function stokmenipis()
    {
        $query = $this->db->query("SELECT barang.id_barang, 
                                    barang.nama_barang as barang,
                                    kategori.nama_kategori as kategori,
                                    barang.stok as stok, barang.min_stok as min_stok,
                                    barang.satuan as satuan 
                                    from barang join kategori
                                    on barang.id_kategori = kategori.id_kategori
                                    where barang.stok < barang.min_stok;
        ");
        $stok_menipis = $query->getResultArray();
        $data = [
            "title" => "Stok Menipis",
            "active" => "stok-menipis",
            'stok_menipis' => $stok_menipis
        ];
        return view('Pages/stokmenipis', $data);
    }

    // details Barang
    public function details_barang($id)
    {
        $query = $this->db->query("SELECT barang.nama_barang as barang, 
                                    kategori.nama_kategori as kategori,
                                    barang.stok as stok, barang.min_stok,
                                    barang.satuan as satuan, barang.kondisi as kondisi
                                    from barang join kategori
                                        on barang.id_kategori = kategori.id_kategori
                                        where barang.id_barang='$id';
        ");
        $details = $query->getResultArray();
        $data = [
            'title' => 'Detail Data Barang',
            'detail' => $details
        ];
        return view('Pages/detail_barang', $data);
    }

    // Edit Barang
    public function edit_barang($id)
    {
        $br = $this->db->query("SELECT *FROM barang WHERE id_barang='$id'");
        $brr = $br->getResultArray();
        $id_kategori = $brr[0]['id_kategori'];
        $kat = $this->db->query("SELECT *FROM kategori");
        $kateg = $kat->getResultArray();
        $data = [
            'title' => 'Edit Data Barang',
            'id_kategori' => $id_kategori,
            'barang' => $brr,
            'kategori' => $kateg
        ];

        return view('Pages/edit_barang', $data);
    }
}

<?php

namespace App\Controllers;

use App\Database\Migrations\Kategori;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use CodeIgniter\Database\Query;

class Pages extends BaseController
{
    protected $db;
    protected $barangmodel;
    protected $kategorimodel;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->barangmodel = new BarangModel();
        $this->kategorimodel = new KategoriModel();
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
                                    barang.nama_barang AS barang,
                                    kategori.nama_kategori AS kategori,
                                    barang.stok AS stok, barang.min_stok AS min_stok,
                                    barang.satuan as satuan 
                                    FROM barang JOIN kategori
                                    ON barang.id_kategori = kategori.id_kategori
                                    WHERE barang.stok < barang.min_stok AND barang.deleted_at is null;
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
        $barang = $this->barangmodel->where('id_barang', $id)->findAll();
        $kategori = $this->kategorimodel->findAll();
        $data = [
            'title' => 'Edit Data Barang',
            'barang' => $barang,
            'kategori' => $kategori
        ];

        return view('Pages/edit_barang', $data);
    }

    public function save_edit_barang()
    {
        $id_barang = $this->request->getVar('id_barang');
        $data = [
            'nama_barang' => $this->request->getVar('nama'),
            'id_kategori' => $this->request->getVar('kategori'),
            'stok' => $this->request->getVar('stok'),
            'min_stok' => $this->request->getVar('min_stok'),
            'satuan' => $this->request->getVar('satuan'),
            'kondisi' => $this->request->getVar('kondisi'),
        ];
        $this->barangmodel->update($id_barang, $data);
        return redirect()->to('/stokmenipis');
    }

    public function hapus_barang($id)
    {
        $this->barangmodel->delete($id);
        return redirect()->to('/stokmenipis');
    }
}

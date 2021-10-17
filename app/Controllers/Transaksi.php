<?php

namespace App\Controllers;

use App\Models\BarangKeluarModel;
use App\Models\BarangMasukModel;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\KonsumenModel;

class Transaksi extends BaseController
{
    protected $db;
    protected $kategorimodel;
    protected $barangmasukmodel;
    protected $barangkeluarmodel;
    protected $barangmodel;
    protected $konsumenmodel;
    public function __construct()
    {
        $this->db = $this->db = \Config\Database::connect();
        $this->barangmasukmodel = new BarangMasukModel();
        $this->barangmodel = new BarangModel();
        $this->kategorimodel = new KategoriModel();
        $this->barangkeluarmodel = new BarangKeluarModel();
        $this->konsumenmodel = new KonsumenModel();
    }
    public function barangmasuk()
    {

        $query = $this->db->query(' SELECT barang.nama_barang as barang,
                 barang.satuan as satuan,
                 barang_masuk.id_barang_masuk as id_barang_masuk,
                barang_masuk.created_at as tanggal_masuk,
                barang_masuk.no_faktur as no_faktur,
                barang_masuk.qty as qty,
                pemasok.nama_pemasok as pemasok
                FROM barang
                JOIN barang_masuk ON barang.id_barang = barang_masuk.id_barang
                JOIN pemasok On barang.id_pemasok = pemasok.id_pemasok
                WHERE barang_masuk.deleted_at is null;
    ');
        $barangmasuk = $query->getResultArray();
        $data = [
            "title" => "Transaksi Barang Masuk",
            'barang_masuk' => $barangmasuk,
        ];
        return view('Transaksi/barangmasuk', $data);
    }

    public function detail_barang_masuk($id)
    {
        $query = $this->db->query("SELECT barang.nama_barang as barang,
                 barang.satuan as satuan,
                 barang.kondisi as kondisi,
                 barang_masuk.id_barang_masuk as id_barang_masuk,
                barang_masuk.created_at as tanggal_masuk,
                barang_masuk.no_faktur as no_faktur,
                barang_masuk.qty as qty,
                kategori.nama_kategori as kategori,
                pemasok.nama_pemasok as pemasok
                FROM barang
                JOIN barang_masuk ON barang.id_barang = barang_masuk.id_barang
                join kategori on barang_masuk.id_kategori = kategori.id_kategori
                JOIN pemasok On barang.id_pemasok = pemasok.id_pemasok
                WHERE barang_masuk.id_barang_masuk = '$id';
    ");
        $detail = $query->getResultArray();
        $data = [
            'title' => 'Detail Barang Masuk',
            'detail' => $detail
        ];
        return view('Transaksi/detail_barang_masuk', $data);
    }
    public function edit_barang_masuk($id)
    {
        $kategori = $this->kategorimodel->findAll();
        $barang = $this->barangmodel->findAll();
        $query = $this->db->query("SELECT barang.nama_barang as barang,
                 barang.satuan as satuan,
                 barang.kondisi as kondisi,
                 barang_masuk.id_barang_masuk as id_barang_masuk,
                barang_masuk.created_at as tanggal_masuk,
                barang_masuk.no_faktur as no_faktur,
                barang_masuk.qty as qty,
                kategori.nama_kategori as kategori,
                pemasok.nama_pemasok as pemasok
                FROM barang
                JOIN barang_masuk ON barang.id_barang = barang_masuk.id_barang
                join kategori on barang_masuk.id_kategori = kategori.id_kategori
                JOIN pemasok On barang.id_pemasok = pemasok.id_pemasok
                WHERE barang_masuk.id_barang_masuk = '$id';
    ");
        $detail = $query->getResultArray();
        $data = [
            'title' => 'Edit Barang Masuk',
            'detail' => $detail,
            'kategori' => $kategori,
            'barang' => $barang
        ];
        return view('Transaksi/edit_barang_masuk', $data);
    }

    public function save_barang_masuk()
    {
        $id = $this->request->getVar('id_barang_masuk');
        $barang_masuk = [
            'id_barang' => $this->request->getVar('id_barang'),
            'no_faktur' => $this->request->getVar('no_faktur'),
            'qty' => $this->request->getVar('qty'),
            'id_kategori' => $this->request->getVar('id_kategori')
        ];
        $this->barangmasukmodel->update($id, $barang_masuk);
        return redirect()->to('/transaksimasuk');
    }

    public function hapus_barang_masuk($id)
    {
        $this->barangmasukmodel->delete($id);
        return redirect()->to('/transaksimasuk');
    }

    public function barangkeluar()
    {
        $query = $this->db->query("SELECT barang.nama_barang as barang,
        barang.kondisi as kondisi,
        kategori.nama_kategori as kategori,
        konsumen.nama_konsumen as konsumen,
        barang_keluar.qty as qty,
        barang_keluar.id_barang_keluar as id_barang_keluar,
        barang_keluar.tanggal_keluar as tanggal_keluar,
        barang.satuan as satuan,
        barang.kondisi as kondisi
    from barang
        join kategori on barang.id_kategori = kategori.id_kategori
        join konsumen on barang.id_konsumen = konsumen.id_konsumen
        join barang_keluar on barang.id_barang = barang_keluar.id_barang
        WHERE barang_keluar.deleted_at is null;");
        $barang_keluar = $query->getResultArray();
        $data = [
            "title" => "Transaksi Barang Keluar",
            'barang_keluar' => $barang_keluar
        ];
        return view('Transaksi/barangkeluar', $data);
    }
    public function detail_barang_keluar($id)
    {
        $query = $this->db->query("SELECT barang.nama_barang as barang,
        kategori.nama_kategori as kategori,
        konsumen.nama_konsumen as konsumen,
        barang_keluar.qty as qty,
        barang_keluar.id_barang_keluar as id_barang_keluar,
        barang_keluar.tanggal_keluar as tanggal_keluar,
        barang.satuan as satuan,
        barang.kondisi as kondisi
    from barang
        join kategori on barang.id_kategori = kategori.id_kategori
        join konsumen on barang.id_konsumen = konsumen.id_konsumen
        join barang_keluar on barang.id_barang = barang_keluar.id_barang
        WHERE barang_keluar.id_barang_keluar = '$id';");
        $barang_keluar = $query->getResultArray();
        $data = [
            'title' => "Detail Barang Keluar",
            'barang_keluar' => $barang_keluar
        ];
        return view('Transaksi/detail_barang_keluar', $data);
    }

    public function tambah_barang_keluar()
    {
        $barang = $this->barangmodel->findAll();
        $konsumen = $this->konsumenmodel->findAll();
        $data = [
            'title' => 'Tambah Barang Keluar',
            'barang' => $barang,
            'konsumen' => $konsumen
        ];
        return view('Transaksi/tambah_barang_keluar', $data);
    }

    public function edit_barang_keluar($id)
    {
        $query = $this->db->query("SELECT *FROM barang_keluar WHERE id_barang_keluar='$id' ");
        $barang_keluar = $query->getResultArray();
        $barang = $this->barangmodel->findAll();
        $konsumen = $this->konsumenmodel->findAll();
        $data = [
            'title' => 'Tambah Barang Keluar',
            'barang' => $barang,
            'konsumen' => $konsumen,
            'barang_keluar' => $barang_keluar
        ];
        return view('Transaksi/edit_barang_keluar', $data);
    }

    public function savebarangkeluar()
    {
        $id = $this->request->getVar('id_barang');

        //Mendapat nilai stok
        $querystok = $this->db->query("select stok from barang where id_barang= '$id'");
        $stok = $querystok->getResultArray();
        $qty = $this->request->getVar('qty');
        $stokk = $stok[0]['stok'];
        $intstok = (int)$stokk;
        $int = (int)$qty;
        $hasilstok = $intstok - $int;
        //Akhir 
        $barang_keluar = [
            'id_barang_keluar' => $this->uuid(),
            'id_barang' => $this->request->getVar('id_barang'),
            'qty' => $this->request->getVar('qty'),
            'tanggal_keluar' => $this->request->getVar('tanggal_keluar')
        ];

        $barang = [
            'stok' => $hasilstok,
            'id_konsumen' => $this->request->getVar('id_konsumen'),
        ];

        $this->barangkeluarmodel->insert($barang_keluar);
        $this->barangmodel->update($id, $barang);

        return redirect()->to('transaksikeluar');
    }

    public function saveeditbarangkeluar()
    {
        $id = $this->request->getVar('id_barang');


        //Mendapat nilai stok
        $querystok = $this->db->query("select stok from barang where id_barang= '$id'");
        $stok = $querystok->getResultArray();
        $qty = $this->request->getVar('qty');
        $stokk = $stok[0]['stok'];
        $intstok = (int)$stokk;
        $int = (int)$qty;
        $hasilstok = $intstok - $int;
        if ($hasilstok <= 0) {
            $hasilstok = 0;
        }
        //Akhir 
        $barang_keluar = [
            'id_barang' => $this->request->getVar('id_barang'),
            'qty' => $this->request->getVar('qty'),
            'tanggal_keluar' => $this->request->getVar('tanggal_keluar')
        ];

        $barang = [
            'stok' => $hasilstok,
            'id_konsumen' => $this->request->getVar('id_konsumen'),
        ];
        $id_barang_keluar = $this->request->getVar('id_barang_keluar');
        $this->barangkeluarmodel->update($id_barang_keluar, $barang_keluar);
        $this->barangmodel->update($id, $barang);

        return redirect()->to('transaksikeluar');
    }

    public function hapus_barang_keluar($id)
    {
        $this->barangkeluarmodel->delete($id);

        return redirect()->to('transaksikeluar');
    }
}

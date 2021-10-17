<?php

namespace App\Controllers;

use App\Models\KonsumenModel;
use App\Models\PemasokModel;
use CodeIgniter\Database\Config;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{

    protected $db;
    protected $konsumenmodel;
    protected $pemasokmodel;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->konsumenmodel = new KonsumenModel();
        $this->pemasokmodel = new PemasokModel();
    }

    public function laporanbarangmasuk()
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
     ;
");
        $barangmasuk = $query->getResultArray();
        $data = [
            "title" => "Laporan Barang Masuk",
            'barang_masuk' => $barangmasuk
        ];
        return view('Laporan/laporanbarangmasuk', $data);
    }

    public function laporanbarangkeluar()
    {
        $query = $this->db->query("SELECT barang.nama_barang as barang,
        kategori.nama_kategori as kategori,
        konsumen.nama_konsumen as konsumen,
        barang_keluar.qty as qty,
        barang_keluar.id_barang_keluar as id_barang_keluar,
        barang_keluar.tanggal_keluar as tanggal_keluar,
        barang.satuan as satuan
    from barang
        join kategori on barang.id_kategori = kategori.id_kategori
        join konsumen on barang.id_konsumen = konsumen.id_konsumen
        join barang_keluar on barang.id_barang = barang_keluar.id_barang;");
        $barangkeluar = $query->getResultArray();
        $data = [
            "title" => "Laporan barang Keluar",
            'barang_keluar' => $barangkeluar
        ];
        return view('Laporan/laporanbarangkeluar', $data);
    }

    public function laporanpemasok()
    {
        $pemasok = $this->pemasokmodel->findAll();
        $data = [
            "title" => "Laporan Pemasok",
            'pemasok' => $pemasok
        ];
        return view('Laporan/laporanpemasok', $data);
    }
    public function laporankonsumen()
    {
        $konsumen = $this->konsumenmodel->findAll();
        $data = [
            "title" => "Laporan Konsumen",
            'konsumen' => $konsumen
        ];
        return view('Laporan/laporankonsumen', $data);
    }


    public function exportexcelkonsumen()
    {
        $data_konsumen = $this->konsumenmodel->findAll();
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Id Konsumen')
            ->setCellValue('B1', 'Nama')
            ->setCellValue('C1', 'Alamat')
            ->setCellValue('D1', 'No HP')
            ->setCellValue('E1', 'Email');

        $column = 3;
        // tulis data mobil ke cell
        foreach ($data_konsumen as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['id_konsumen'])
                ->setCellValue('B' . $column, $data['nama_konsumen'])
                ->setCellValue('C' . $column, $data['alamat'])
                ->setCellValue('D' . $column, $data['phone'])
                ->setCellValue('E' . $column, $data['email']);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan Konsumen';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function exportexcelpemasok()
    {
        $data_pemasok = $this->pemasokmodel->findAll();
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Id pemasok')
            ->setCellValue('B1', 'Nama')
            ->setCellValue('C1', 'Alamat')
            ->setCellValue('D1', 'No HP')
            ->setCellValue('E1', 'Email');

        $column = 3;
        // tulis data mobil ke cell
        foreach ($data_pemasok as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['id_pemasok'])
                ->setCellValue('B' . $column, $data['nama_pemasok'])
                ->setCellValue('C' . $column, $data['alamat'])
                ->setCellValue('D' . $column, $data['phone'])
                ->setCellValue('E' . $column, $data['email']);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan pemasok';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function exportexcelbarangmasuk()
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
     ;
");
        $barangmasuk = $query->getResultArray();
        $data_barangmasuk = $barangmasuk;
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama Barang')
            ->setCellValue('B1', 'Kategori')
            ->setCellValue('C1', 'Supplier')
            ->setCellValue('D1', 'No Faktur')
            ->setCellValue('E1', 'Satuan')
            ->setCellValue('F1', 'QTY')
            ->setCellValue('G1', 'Tanggal Masuk');
        $column = 3;
        // tulis data mobil ke cell
        foreach ($data_barangmasuk as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['barang'])
                ->setCellValue('B' . $column, $data['kategori'])
                ->setCellValue('C' . $column, $data['pemasok'])
                ->setCellValue('D' . $column, $data['no_faktur'])
                ->setCellValue('E' . $column, $data['satuan'])
                ->setCellValue('F' . $column, $data['qty'])
                ->setCellValue('G' . $column, $data['tanggal_masuk']);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan Barang Masuk';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function exportexcelbarangkeluar()
    {
        $query = $this->db->query("SELECT barang.nama_barang as barang,
        kategori.nama_kategori as kategori,
        konsumen.nama_konsumen as konsumen,
        barang_keluar.qty as qty,
        barang_keluar.id_barang_keluar as id_barang_keluar,
        barang_keluar.tanggal_keluar as tanggal_keluar,
        barang.satuan as satuan
    from barang
        join kategori on barang.id_kategori = kategori.id_kategori
        join konsumen on barang.id_konsumen = konsumen.id_konsumen
        join barang_keluar on barang.id_barang = barang_keluar.id_barang;");
        $barangkeluar = $query->getResultArray();
        $data_barangmasuk = $barangkeluar;
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama Barang')
            ->setCellValue('B1', 'Kategori')
            ->setCellValue('C1', 'Konsumen')
            ->setCellValue('D1', 'QTY')
            ->setCellValue('E1', 'Satuan')
            ->setCellValue('F1', 'Tanggal Keluar');
        $column = 3;
        // tulis data mobil ke cell
        foreach ($data_barangmasuk as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['barang'])
                ->setCellValue('B' . $column, $data['kategori'])
                ->setCellValue('C' . $column, $data['konsumen'])
                ->setCellValue('D' . $column, $data['qty'])
                ->setCellValue('E' . $column, $data['satuan'])
                ->setCellValue('F' . $column, $data['tanggal_keluar']);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan Barang Keluar';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}

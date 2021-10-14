<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\PemasokModel;
use Faker\Provider\Uuid;

class Manage extends BaseController
{
    protected $db;
    protected $karyawanmodel;
    protected $pemasokmodel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->karyawanmodel = new KaryawanModel();
        $this->pemasokmodel = new PemasokModel();
    }

    // Start Karyawan
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

    public function tambah_karyawan()
    {
        $data = [
            'title' => 'Tambah Data Karyawan'
        ];
        return view('Manage/tambah_karyawan', $data);
    }

    public function save_karyawan()
    {
        $data = [
            'id_karyawan' => $this->uuid(),
            'nama_karyawan' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'phone' => $this->request->getVar('phone'),
            'email' => $this->request->getVar('email'),
            'jabatan' => $this->request->getVar('jabatan')
        ];

        $this->karyawanmodel->insert($data);
        return redirect()->to('/karyawan');
    }
    // End Karyawan


    // Start Pemasok
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
    public function tambah_pemasok()
    {
        $data = [
            'title' => 'Tambah Data Pemasok'
        ];
        return view('Manage/tambah_pemasok', $data);
    }

    public function save_pemasok()
    {
        // ]);
        $data = [
            'id_pemasok' => $this->uuid(),
            'nama_pemasok' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'phone' => $this->request->getVar('phone'),
            'email' => $this->request->getVar('email'),
        ];
        $this->pemasokmodel->insert($data);
        return redirect()->to('/pemasok');
    }

    // End Pemasok

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

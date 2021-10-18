<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\KonsumenModel;
use App\Models\PemasokModel;
use Faker\Provider\Uuid;

class Manage extends BaseController
{
    protected $db;
    protected $karyawanmodel;
    protected $pemasokmodel;
    protected $konsumenmodel;
    protected $logedUserData;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->karyawanmodel = new KaryawanModel();
        $this->pemasokmodel = new PemasokModel();
        $this->konsumenmodel = new KonsumenModel();
        session();
        $this->logedUserData = session()->get('level');
    }

    // Start Karyawan
    public function karyawan()
    {
        $query = $this->db->query("SELECT *FROM karyawan WHERE deleted_at is NUll");
        $karyawan = $query->getResultArray();


        $data = [
            "title" => "Manajemen Karyawan",
            "active" => "manage-karyawan",
            "karyawan" => $karyawan,
            'level' => $this->logedUserData
        ];
        return view('Manage/karyawan', $data);
    }

    public function tambah_karyawan()
    {
        $data = [
            'title' => 'Tambah Data Karyawan',
            'level' => $this->logedUserData
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

    public function hapus_karyawan($id)
    {
        $this->karyawanmodel->delete($id);
        return redirect()->to('/karyawan');
    }

    public function details_karyawan($id)
    {
        $query = $this->db->query("SELECT *FROM karyawan WHERE id_karyawan = '$id'");
        $karyawan = $query->getResultArray();
        $data = [
            'title' => "Detail Karyawan",
            'karyawan' => $karyawan,
            'level' => $this->logedUserData
        ];
        return view('Manage/detail_karyawan', $data);
    }

    public function edit_karyawan($id)
    {
        $query = $this->db->query("SELECT *FROM karyawan WHERE id_karyawan = '$id'");
        $karyawan = $query->getResultArray();
        $data = [
            'title' => 'Edit Data Karyawan',
            'karyawan' => $karyawan,
            'level' => $this->logedUserData
        ];
        return view('Manage/edit_karyawan', $data);
    }

    public function save_edit_karyawan()
    {
        $id_karyawan = $this->request->getVar('id_karyawan');
        $data = [
            'nama_karyawan' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'phone' => $this->request->getVar('phone'),
            'email' => $this->request->getVar('email'),
        ];

        $this->karyawanmodel->update($id_karyawan, $data);
        return redirect()->to('/karyawan');
    }
    // Start Pemasok
    public function pemasok()
    {
        $query = $this->db->query("SELECT *FROM pemasok WHERE deleted_at is NUll");
        $pemasok = $query->getResultArray();

        $data = [
            "title" => "Manajemen Pemasok",
            "active" => "manage-pemasok",
            'level' => $this->logedUserData,
            "pemasok" => $pemasok
        ];
        return view('Manage/pemasok', $data);
    }
    public function tambah_pemasok()
    {
        $data = [
            'title' => 'Tambah Data Pemasok',
            'level' => $this->logedUserData
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

    public function hapus_pemasok($id)
    {
        $this->pemasokmodel->delete($id);
        return redirect()->to('/pemasok');
    }

    public function details_pemasok($id)
    {
        $query = $this->db->query("SELECT *FROM pemasok WHERE id_pemasok = '$id'");
        $pemasok = $query->getResultArray();
        $data = [
            'title' => "Detail Pemasok",
            'level' => $this->logedUserData,
            'pemasok' => $pemasok
        ];
        return view('Manage/detail_pemasok', $data);
    }

    public function edit_pemasok($id)
    {
        $query = $this->db->query("SELECT *FROM pemasok WHERE id_pemasok = '$id'");
        $pemasok = $query->getResultArray();
        $data = [
            'title' => 'Edit Data Pemasok',
            'level' => $this->logedUserData,
            'pemasok' => $pemasok
        ];
        return view('Manage/edit_pemasok', $data);
    }

    public function save_edit_pemasok()
    {
        $id_pemasok = $this->request->getVar('id_pemasok');
        $data = [
            'nama_pemasok' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'phone' => $this->request->getVar('phone'),
            'email' => $this->request->getVar('email'),
        ];


        $this->pemasokmodel->update($id_pemasok, $data);
        return redirect()->to('/pemasok');
    }
    // End Pemasok

    // Start Konsumen
    public function konsumen()
    {
        $konsumen = $this->konsumenmodel->findAll();

        $data = [
            "title" => "Manajemen Konsumen",
            'level' => $this->logedUserData,
            "active" => "manage-konsumen",
            "konsumen" => $konsumen
        ];
        return view('Manage/konsumen', $data);
    }

    public function tambah_konsumen()
    {
        $data = [
            'title' => 'Tambah Data Konsumen',
            'level' => $this->logedUserData
        ];
        return view('Manage/tambah_konsumen', $data);
    }

    public function save_konsumen()
    {
        // ]);
        $data = [
            'id_konsumen' => $this->uuid(),
            'nama_konsumen' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'phone' => $this->request->getVar('phone'),
            'email' => $this->request->getVar('email'),
        ];
        $this->konsumenmodel->insert($data);
        return redirect()->to('/konsumen');
    }

    public function hapus_konsumen($id)
    {
        $this->konsumenmodel->delete($id);
        return redirect()->to('/konsumen');
    }

    public function details_konsumen($id)
    {
        $query = $this->db->query("SELECT *FROM konsumen WHERE id_konsumen = '$id'");
        $konsumen = $query->getResultArray();
        $data = [
            'title' => "Detail Konsumen",
            'level' => $this->logedUserData,
            'konsumen' => $konsumen
        ];
        return view('Manage/detail_konsumen', $data);
    }

    public function edit_konsumen($id)
    {
        $query = $this->db->query("SELECT *FROM konsumen WHERE id_konsumen = '$id'");
        $konsumen = $query->getResultArray();
        $data = [
            'title' => 'Edit Data Konsumen',
            'level' => $this->logedUserData,
            'konsumen' => $konsumen
        ];
        return view('Manage/edit_konsumen', $data);
    }

    public function save_edit_konsumen()
    {
        $id_konsumen = $this->request->getVar('id_konsumen');
        $data = [
            'nama_konsumen' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'phone' => $this->request->getVar('phone'),
            'email' => $this->request->getVar('email'),
        ];


        $this->konsumenmodel->update($id_konsumen, $data);
        return redirect()->to('/konsumen');
    }
}

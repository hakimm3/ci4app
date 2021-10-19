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
        helper('Form_helper');
        helper(['url', 'form']);
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

        $karyawan = $this->karyawanmodel->findAll();


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
            'level' => $this->logedUserData,
            'validation' => \Config\Services::validation()
        ];
        return view('Manage/tambah_karyawan', $data);
    }

    public function save_karyawan()
    {

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|max_length[50]|min_length[4]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Nama tidak boleh lebih dari 50 karakter',
                    'min_length' => 'Nama tidak boleh lebih kurang dari 3 karakter'
                ]
            ],
            'alamat' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                    'min_length' => 'Alamat tidak valid',
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[11]|max_length[15]',
                'errors' => [
                    'required' => 'No Handphone harus diisi',
                    'min_length' => 'No Handphone tidak boleh kurang dari 11 karakter',
                    'max_length' => 'No Handphone tidak boleh lebih dari 15 karakter'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[karyawan.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Email tidak valid',
                    'is_unique' => 'Email sudah terdaftar'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan harus diisi'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Manage/tambah_karyawan')->withInput()->with('validation', $validation);
        }

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
            'level' => $this->logedUserData,
            "active" => "manage-karyawan"
        ];
        return view('Manage/detail_karyawan', $data);
    }

    public function edit_karyawan($id)
    {

        $karyawan = $this->karyawanmodel->where('id_karyawan', $id)->findAll();
        $data = [
            'title' => 'Edit Data Karyawan',
            'karyawan' => $karyawan,
            'level' => $this->logedUserData,
            'validation' => \Config\Services::validation()
        ];
        return view('Manage/edit_karyawan', $data);
    }

    public function save_edit_karyawan()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|max_length[50]|min_length[4]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Nama tidak boleh lebih dari 50 karakter',
                    'min_length' => 'Nama tidak boleh lebih kurang dari 3 karakter'
                ]
            ],
            'alamat' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                    'min_length' => 'Alamat tidak valid',
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[11]|max_length[15]',
                'errors' => [
                    'required' => 'No Handphone harus diisi',
                    'min_length' => 'No Handphone tidak boleh kurang dari 11 karakter',
                    'max_length' => 'No Handphone tidak boleh lebih dari 15 karakter'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Email tidak valid'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan harus diisi'
                ]
            ]

        ])) {
            $id_karyawan = $this->request->getVar('id_karyawan');
            $validation = \Config\Services::validation();
            return redirect()->to('/Manage/edit_karyawan/' . $id_karyawan)->withInput()->with('validation', $validation);
        }

        $id_karyawan = $this->request->getVar('id_karyawan');
        $data = [
            'nama_karyawan' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'phone' => $this->request->getVar('phone'),
            'email' => $this->request->getVar('email'),
            'jabatan' => $this->request->getVar('jabatan')
        ];

        $this->karyawanmodel->update($id_karyawan, $data);
        return redirect()->to('/karyawan');
    }
    // Start Pemasok
    public function pemasok()
    {

        $pemasok = $this->pemasokmodel->findAll();
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
            'level' => $this->logedUserData,
            'validation' => \Config\Services::validation()
        ];
        return view('Manage/tambah_pemasok', $data);
    }

    public function save_pemasok()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|max_length[50]|min_length[4]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Nama tidak boleh lebih dari 50 karakter',
                    'min_length' => 'Nama tidak boleh lebih kurang dari 3 karakter',
                ]
            ],
            'alamat' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                    'min_length' => 'Alamat tidak valid',
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[11]|max_length[15]',
                'errors' => [
                    'required' => 'No Handphone harus diisi',
                    'min_length' => 'No Handphone tidak boleh kurang dari 11 karakter',
                    'max_length' => 'No Handphone tidak boleh lebih dari 15 karakter'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[karyawan.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Email tidak valid',
                    'is_unique' => 'Email sudah terdaftar'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Manage/tambah_pemasok')->withInput()->with('validation', $validation);
        }


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
            'pemasok' => $pemasok,
            'validation' => \Config\Services::validation()
        ];
        return view('Manage/edit_pemasok', $data);
    }

    public function save_edit_pemasok()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|max_length[50]|min_length[4]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Nama tidak boleh lebih dari 50 karakter',
                    'min_length' => 'Nama tidak boleh lebih kurang dari 3 karakter'
                ]
            ],
            'alamat' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                    'min_length' => 'Alamat tidak valid',
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[11]|max_length[15]',
                'errors' => [
                    'required' => 'No Handphone harus diisi',
                    'min_length' => 'No Handphone tidak boleh kurang dari 11 karakter',
                    'max_length' => 'No Handphone tidak boleh lebih dari 15 karakter'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Email tidak valid'
                ]
            ]

        ])) {

            $id_pemasok = $this->request->getVar('id_pemasok');
            $validation = \Config\Services::validation();
            return redirect()->to('/Manage/edit_pemasok/' . $id_pemasok)->withInput()->with('validation', $validation);
        }

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
            'level' => $this->logedUserData,
            'validation' => \Config\Services::validation()
        ];
        return view('Manage/tambah_konsumen', $data);
    }

    public function save_konsumen()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|max_length[50]|min_length[4]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Nama tidak boleh lebih dari 50 karakter',
                    'min_length' => 'Nama tidak boleh lebih kurang dari 3 karakter'
                ]
            ],
            'alamat' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                    'min_length' => 'Alamat tidak valid',
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[11]|max_length[15]',
                'errors' => [
                    'required' => 'No Handphone harus diisi',
                    'min_length' => 'No Handphone tidak boleh kurang dari 11 karakter',
                    'max_length' => 'No Handphone tidak boleh lebih dari 15 karakter'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[karyawan.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Email tidak valid',
                    'is_unique' => 'Email sudah terdaftar'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Manage/tambah_konsumen')->withInput()->with('validation', $validation);
        }

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
            'konsumen' => $konsumen,
            'validation' => \Config\Services::validation()
        ];
        return view('Manage/edit_konsumen', $data);
    }

    public function save_edit_konsumen()
    {

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|max_length[50]|min_length[4]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Nama tidak boleh lebih dari 50 karakter',
                    'min_length' => 'Nama tidak boleh lebih kurang dari 3 karakter'
                ]
            ],
            'alamat' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                    'min_length' => 'Alamat tidak valid',
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[11]|max_length[15]',
                'errors' => [
                    'required' => 'No Handphone harus diisi',
                    'min_length' => 'No Handphone tidak boleh kurang dari 11 karakter',
                    'max_length' => 'No Handphone tidak boleh lebih dari 15 karakter'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Email tidak valid'
                ]
            ]

        ])) {

            $id_konsumen = $this->request->getVar('id_konsumen');
            $validation = \Config\Services::validation();
            return redirect()->to('/Manage/edit_konsumen/' . $id_konsumen)->withInput()->with('validation', $validation);
        }

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

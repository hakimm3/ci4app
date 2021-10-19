<?php

namespace App\Controllers;

use App\Database\Migrations\Kategori;
use App\Database\Migrations\Pemasok;
use App\Database\Migrations\Pengguna;
use App\Models\BarangMasukModel;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\KonsumenModel;
use App\Models\PemasokModel;
use App\Models\PenggunaModel;
use CodeIgniter\Database\Config;
use CodeIgniter\Database\Query;

class Pages extends BaseController
{
    protected $db;
    protected $barangmodel;
    protected $kategorimodel;
    protected $barangmasukmodel;
    protected $konsumenmodel;
    protected $pemasokmodel;
    protected $penggunamodel;
    protected $logedUserData;
    protected $login;
    public function __construct()
    {
        helper('Form_helper');
        helper(['url', 'form']);
        $this->db = \Config\Database::connect();
        $this->barangmodel = new BarangModel();
        $this->kategorimodel = new KategoriModel();
        $this->barangmasukmodel = new BarangMasukModel();
        $this->konsumenmodel = new KonsumenModel();
        $this->pemasokmodel = new PemasokModel();
        $this->penggunamodel = new PenggunaModel();
        session();
        $this->logedUserData = session()->get('level');
        $this->login = session()->get('LogedUser');
    }

    public function dashboard()
    {

        $logedUserID = session()->get('LoggedUser');
        $level = $this->logedUserData;
        $logedUserData = $this->penggunamodel->where('id_pengguna', $logedUserID)->findAll();

        $querystokkosong = $this->db->query('SELECT count(stok) as stok_kosong FROM barang WHERE stok=0');
        $stok_kosonng = $querystokkosong->getResultArray();

        $querybarangbaru = $this->db->query("SELECT SUM(created_at BETWEEN NOW() - INTERVAL 604800 second AND NOW()) as barang_baru from barang;");
        $barang_baru = $querybarangbaru->getResultArray();

        $querybarangkeluar = $this->db->query("SELECT SUM(created_at BETWEEN NOW() - INTERVAL 604800 second AND NOW()) as barang_keluar from barang_keluar;");
        $barang_keluar = $querybarangkeluar->getResultArray();

        $querykonsumen = $this->db->query("SELECT SUM(created_at BETWEEN NOW() - INTERVAL 604800 second AND NOW()) as konsumen from konsumen;");
        $konsumen = $querykonsumen->getResultArray();

        $data = [
            'stok_kosong' => $stok_kosonng,
            'barang_baru' => $barang_baru,
            'barang_keluar' => $barang_keluar,
            'konsumen' => $konsumen,
            "title" => "Beranda",
            "active" => "beranda",
            'loged_data' => $logedUserData,
            'level' => $level,
            'LogedUser' => $this->login
        ];
        return view('Pages/dashboard', $data);
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
        $level = $this->logedUserData;
        $data = [
            "title" => "Stok Menipis",
            "active" => "stok-menipis",
            'stok_menipis' => $stok_menipis,
            'level' => $level,
            'LogedUser' => $this->login
        ];
        return view('Pages/stokmenipis', $data);
    }

    // details Barang
    public function details_barang($id)
    {
        $query = $this->db->query("SELECT barang.nama_barang as barang,
                                    barang.id_barang as id_barang, 
                                    kategori.nama_kategori as kategori,
                                    barang.stok as stok, barang.min_stok,
                                    barang.satuan as satuan, barang.kondisi as kondisi
                                    from barang join kategori
                                        on barang.id_kategori = kategori.id_kategori
                                        where barang.id_barang='$id';
        ");
        $details = $query->getResultArray();
        $level = $this->logedUserData;
        $data = [
            'title' => 'Detail Data Barang',
            'detail' => $details,
            'level' => $level
        ];
        return view('Pages/detail_barang', $data);
    }

    // details Barang Ke 2 (Manajemen Barang)
    public function details_barang2($id)
    {
        $query = $this->db->query("SELECT barang.nama_barang as barang,
        barang.id_barang as id_barang,
        kategori.nama_kategori as kategori,
        pemasok.nama_pemasok as pemasok,
        konsumen.nama_konsumen as konsumen,
        barang.stok as stok,
        barang.min_stok as min_stok,
        barang.created_at as tanggal_masuk,
        barang.satuan as satuan,
        barang.kondisi as kondisi
    from barang
        join kategori on barang.id_kategori = kategori.id_kategori
        join pemasok on barang.id_pemasok = pemasok.id_pemasok
        join konsumen on barang.id_konsumen = konsumen.id_konsumen
    where barang.id_barang ='$id';
        ");

        $level = $this->logedUserData;
        $details = $query->getResultArray();
        $data = [
            'title' => 'Detail Data Barang',
            'detail' => $details,
            'level' => $level
        ];
        return view('Pages/detail_barang2', $data);
    }

    // Edit Barang
    public function edit_barang($id)
    {
        $barang = $this->barangmodel->where('id_barang', $id)->findAll();
        $kategori = $this->kategorimodel->findAll();
        $level = $this->logedUserData;
        $data = [
            'title' => 'Edit Data Barang',
            'barang' => $barang,
            'kategori' => $kategori,
            'level' => $level,
            'validation' => \Config\Services::validation()
        ];

        session()->setFlashdata('edit_success', 'Data Berhasil di Ubah');

        return view('Pages/edit_barang', $data);
    }

    public function save_edit_barang()
    {
        if (!$this->validate([
            'stok' => [
                'rules' => 'required|max_length[3]',
                'errors' => [
                    'required' => 'Stok harus diisi',
                    'max_length' => 'Maksimal 3 digit'
                ]
            ],
            'min_stok' => [
                'rules' => 'required|max_length[1]',
                'errors' => [
                    'required' => 'Minimal Stok harus diisi',
                    'max_length' => 'Maksimal 1 digit'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $id = $id_barang = $this->request->getVar('id_barang');
            return redirect()->to('/Pages/edit_barang2/' . $id)->withInput()->with('validation', $validation);
        }


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

        return redirect()->to('Pages/edit_barang/' . $id_barang);
    }

    // Edit Barang 2
    public function edit_barang2($id)
    {
        $barang = $this->barangmodel->where('id_barang', $id)->findAll();
        $kategori = $this->kategorimodel->findAll();
        $level = $this->logedUserData;
        $data = [
            'title' => 'Edit Data Barang',
            'barang' => $barang,
            'kategori' => $kategori,
            'level' => $level,
            'validation' => \Config\Services::validation()
        ];

        return view('Pages/edit_barang2', $data);
    }

    public function save_edit_barang2()
    {
        if (!$this->validate([
            'stok' => [
                'rules' => 'required|max_length[3]',
                'errors' => [
                    'required' => 'Stok harus diisi',
                    'max_length' => 'Maksimal 3 digit'
                ]
            ],
            'min_stok' => [
                'rules' => 'required|max_length[1]',
                'errors' => [
                    'required' => 'Minimal Stok harus diisi',
                    'max_length' => 'Maksimal 1 digit'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $id = $id_barang = $this->request->getVar('id_barang');
            return redirect()->to('/Pages/edit_barang2/' . $id)->withInput()->with('validation', $validation);
        }


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
        return redirect()->to('/manajemenbarang');
    }

    public function hapus_barang($id)
    {
        $this->barangmodel->delete($id);
        return redirect()->to('/stokmenipis');
    }

    public function manajemenbarang()
    {
        $query = $this->db->query("SELECT barang.id_barang, 
                                        barang.nama_barang AS barang,
                                        kategori.nama_kategori AS kategori,
                                        barang.stok AS stok, barang.min_stok AS min_stok,
                                        barang.satuan as satuan 
                                        FROM barang JOIN kategori
                                        ON barang.id_kategori = kategori.id_kategori
                                        WHERE barang.deleted_at is null;
            ");
        $stok_menipis = $query->getResultArray();
        $level = $this->logedUserData;
        $data = [
            'level' => $level,
            "title" => "Manajemen Barang",
            'stok_menipis' => $stok_menipis
        ];
        return view('Pages/manajemen_barang', $data);
    }

    // Tambah Barang
    public function tambahbarang()
    {
        $kategori = $this->kategorimodel->findAll();
        $konsumen = $this->konsumenmodel->findAll();
        $pemasok = $this->pemasokmodel->findAll();
        $level = $this->logedUserData;

        $data = [
            'title' => 'Tambah Data Barang',
            'kategori' => $kategori,
            'konsumen' => $konsumen,
            'pemasok' => $pemasok,
            'level' => $level,
            'validation' => \Config\Services::validation()
        ];
        return view('Pages/tambah_barang', $data);
    }

    public function savebarang()
    {

        if (!$this->validate([
            'qty' => [
                'rules' => 'required|max_length[3]',
                'errors' => [
                    'required' => 'Jumlah harus diisi',
                    'max_length' => 'Maksimal 3 digit'
                ]
            ],
            'min_stok' => [
                'rules' => 'required|max_length[1]',
                'errors' => [
                    'required' => 'Minimal Stok harus diisi',
                    'max_length' => 'Maksimal 1 digit'
                ]
            ],
            'no_faktur' => [
                'rules' => 'required|max_length[8]|is_unique[barang_masuk.no_faktur]',
                'errors' => [
                    'required' => 'Nomor Faktur harus diisi',
                    'max_length' => 'Maksimal 8 digit',
                    'is_unique' => 'No Faktur Sudah di gunakan'
                ]
            ],
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Barang harus diisi'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Pages/tambahbarang')->withInput()->with('validation', $validation);
        }


        $barang = [
            'id_barang' => $this->uuid(),
            'id_pemasok' => $this->request->getVar('id_pemasok'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'stok' => $this->request->getVar('qty'),
            'min_stok' => $this->request->getVar('min_stok'),
            'satuan' => $this->request->getVar('satuan'),
            'kondisi' => $this->request->getVar('kondisi')
        ];

        $barangmasuk = [
            'id_barang_masuk' => $this->uuid(),
            'id_barang' => $barang['id_barang'],
            'qty' => $this->request->getVar('qty'),
            'no_faktur' => $this->request->getVar('no_faktur'),
            'id_kategori' => $this->request->getVar('id_kategori')
        ];

        $this->barangmasukmodel->insert($barangmasuk);
        $this->barangmodel->insert($barang);

        return redirect()->to('/manajemenbarang');
    }
    public function hapus_barang2($id)
    {
        $this->barangmodel->delete($id);
        return redirect()->to('/manajemenbarang');
    }


    // Pengguna
    public function pengguna()
    {
        $pengguna = $this->penggunamodel->findAll();
        $level = $this->logedUserData;
        $data = [
            'title' => 'Manage Pengguna',
            'pengguna' => $pengguna,
            'level' => $level
        ];
        return view('Pages/pengguna', $data);
    }

    public function details_pengguna($id)
    {
        $detail = $this->penggunamodel->where('id_pengguna', $id)->findAll();
        $level = $this->logedUserData;
        $data = [
            'level' => $level,
            'title' => 'Detail Pengguna',
            'detail' => $detail
        ];
        return view('Pages/detail_pengguna', $data);
    }

    public function edit_pengguna($id)
    {
        $detail = $this->penggunamodel->where('id_pengguna', $id)->findAll();
        $level = $this->logedUserData;
        $data = [
            'level' => $level,
            'title' => 'Edit Pengguna',
            'detail' => $detail,
            'validation' => \Config\Services::validation()
        ];
        return view('Pages/edit_pengguna', $data);
    }

    public function save_edit_pengguna()
    {
        $id_pengguna = $this->request->getVar('id_pengguna');
        if (!$this->validate([
            'nama_pengguna' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ]
            ],
            'phone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Handphone harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Email anda tidak valid'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level harus diisi'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Pages/edit_pengguna/' . $id_pengguna)->withInput()->with('validation', $validation);
        }


        $data = [
            'nama_pengguna' => $this->request->getVar('nama_pengguna'),
            'alamat' => $this->request->getVar('alamat'),
            'phone' => $this->request->getVar('phone'),
            'email' => $this->request->getVar('email'),
            'level' => $this->request->getVar('level'),
            'username' => $this->request->getVar('username'),
        ];
        $this->penggunamodel->update($id_pengguna, $data);

        // return redirect()->to('Auth/register')->with('success', 'Pengguna Berhasil di tambahkan');
        return redirect()->to('/pengguna');
    }


    public function hapus_pengguna($id)
    {
        $this->penggunamodel->delete($id);
        return redirect()->to('/pengguna');
    }

    public function manajemenkategori()
    {
        $kategori = $this->kategorimodel->findAll();
        $data = [
            'title' => 'Manajemen Kategori',
            'kategori' => $kategori,
            'level' => $this->logedUserData
        ];
        return view('Pages/manajemen_kategori', $data);
    }

    public function edit_kategori($id)
    {
        $kategori = $this->kategorimodel->where('id_kategori', $id)->findAll();
        $data = [
            'title' => 'Edit Kategori',
            'kategori' => $kategori,
            'level' => $this->logedUserData,
            'validation' => \Config\Services::validation()
        ];
        return view('Pages/edit_kategori', $data);
    }

    public function save_edit_kategori()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Harus diisi'
                ]
            ]
        ])) {
            $id = $this->request->getVar('id_kategori');
            $validation = \Config\Services::validation();
            return redirect()->to('/Pages/edit_kategori/' . $id)->withInput()->with('validation', $validation);
        }

        $id = $this->request->getVar('id_kategori');
        $kategori = [
            'nama_kategori' => $this->request->getVar('nama')
        ];
        $this->kategorimodel->update($id, $kategori);
        return redirect()->to('/kategori');
    }
    public function hapus_kategori($id)
    {
        $this->kategorimodel->delete($id);
        return redirect()->to('/kategori');
    }

    public function tambahkategori()
    {
        $data = [
            'title' => 'Tambah Kategori',
            'level' => $this->logedUserData,
            'validation' => \Config\Services::validation()
        ];
        return view('/Pages/tambah_kategori', $data);
    }

    public function save_tambah_kategori()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[kategori.nama_kategori]',
                'errors' => [
                    'required' => 'Kategori Harus diisi',
                    'is_unique' => 'Kategori Sudah Ada'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Pages/tambahkategori')->withInput()->with('validation', $validation);
        }

        $kategori = [
            'id_kategori' => $this->uuid(),
            'nama_kategori' => $this->request->getVar('nama')
        ];
        $this->kategorimodel->insert($kategori);
        return redirect()->to('/kategori');
    }
}

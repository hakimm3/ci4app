<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use App\Libraries\Hash;

class Auth extends BaseController
{
    protected $validation;
    protected $penggunamodel;
    protected $logedUserData;
    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        helper('Form_helper');
        helper(['url', 'form']);
        $this->penggunamodel = new PenggunaModel();
        $this->logedUserData = session()->get('level');
    }

    public function register()
    {
        session();
        $data = [
            'title' => 'Tambah Pengguna',
            'level' => $this->logedUserData,
            'validation' => \Config\Services::validation()
        ];
        return view('Auth/register', $data);
    }
    public function login()
    {
        return view('Auth/login');
    }

    public function save()
    {
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
                'rules' => 'required|valid_email|is_unique[pengguna.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Email anda tidak valid',
                    'is_unique' => 'Email sudah terdaftar'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level harus diisi'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[pengguna.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password harus diisi minimal 8 karakter'
                ]
            ],
            'cpassword' => [
                'rules' => 'required|min_length[8]|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi Password harus diisi',
                    'min_length' => 'Password harus diisi minimal 8 karakter',
                    'matches' => 'Password tidak sama'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Auth/register')->withInput()->with('validation', $validation);
        }


        $data = [
            'id_pengguna' => $this->uuid(),
            'nama_pengguna' => $this->request->getVar('nama_pengguna'),
            'alamat' => $this->request->getVar('alamat'),
            'phone' => $this->request->getVar('phone'),
            'email' => $this->request->getVar('email'),
            'level' => $this->request->getVar('level'),
            'username' => $this->request->getVar('username'),
            'password' => Hash::make($this->request->getVar('password')),
        ];

        $this->penggunamodel->insert($data);

        // return redirect()->to('Auth/register')->with('success', 'Pengguna Berhasil di tambahkan');
        return redirect()->to('/pengguna');
    }

    public function check()
    {
        $validation = $this->validate([
            'username' => [
                'rules' => 'required|is_not_unique[pengguna.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_not_unique' => 'Username salah'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password harus lebih dari 8 karakter'
                ]
            ]
        ]);

        if (!$validation) {
            return view('Auth/login', ['validation' => $this->validation]);
        } else {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $userinfo = $this->penggunamodel->where('username', $username)->first();
            $check_password = Hash::check($password, $userinfo['password']);

            if (!$check_password) {
                session()->setFlashdata('fail', 'Password Salah');
                return redirect()->to('/Auth/login')->withInput();
            } else {
                $user_id = $userinfo['id_pengguna'];
                $user_level = $userinfo['level'];
                $data = [
                    'level' => $userinfo['level'],
                    'LoggedUser' => $userinfo['id_pengguna']
                ];
                session()->set($data);
                return redirect()->to('/');
            }
        }
    }

    public function logout()
    {
        // return redirect()->to('/auth/login?access=out');
        if (!session()->has('LogedUser')) {
            return redirect()->to('/auth/login?access=out');
        }

        if (session()->has('LogedUser')) {
            session()->remove('LoggedUser');
            session()->remove('level');
            return redirect()->to('/auth/login?access=out');
        }
    }
}

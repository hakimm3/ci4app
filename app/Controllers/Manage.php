<?php

namespace App\Controllers;

class Manage extends BaseController
{
    public function karyawan()
    {
        return view('Manage/karyawan');
    }

    public function pemasok()
    {
        return view('Manage/pemasok');
    }

    public function konsumen()
    {
        return view('Manage/konsumen');
    }
}

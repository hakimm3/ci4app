<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Beranda",
            "active" => "beranda"
        ];
        return view('Pages/index', $data);
    }

    public function stokmenipis()
    {
        $data = [
            "title" => "Stok Menipis",
            "active" => "stok-menipis"
        ];
        return view('Pages/stokmenipis', $data);
    }
}

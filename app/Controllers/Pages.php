<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Dashboard"
        ];
        return view('Pages/index', $data);
    }

    public function stokmenipis()
    {
        $data = [
            "title" => "Stok Menipis"
        ];
        return view('Pages/stokmenipis', $data);
    }
}

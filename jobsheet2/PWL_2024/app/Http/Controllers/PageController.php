<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return "Selamat Datang";
    }

    public function about() {
        return "Nim: 2341720027 <br> Nama: Alvino Valerian";
    }

    public function articles($id){
        return "Halaman Artikel Dengan Id $id";
    }
}

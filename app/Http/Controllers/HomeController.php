<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data = Produk::where('status', 'y')->get();
        return view('home', [
            'title' => 'Toko Vard',
            'data' => $data
        ]);
    }
}

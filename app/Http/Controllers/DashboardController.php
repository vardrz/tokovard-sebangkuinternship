<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $produk = Produk::take(10)->get();

        $produkJml = Produk::all()->count();
        $produkAktif = Produk::where('status', 'y')->count();
        $user = User::where('level', 'user')->count();
        $userAktif = User::where('level', 'user')->where('status', 'y')->count();

        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'produk' => $produk,
            'produkJml' => $produkJml,
            'produkAktif' => $produkAktif,
            'user' => $user,
            'userAktif' => $userAktif,
        ]);
    }
}

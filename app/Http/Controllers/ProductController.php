<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $data = Produk::all();
        return view('admin.product', [
            'title' => 'Produk',
            'data' => $data
        ]);
    }

    public function add()
    {
        return view('admin.productAdd', [
            'title' => 'Add Produk',
        ]);
    }

    public function edit($id = null)
    {
        if ($id == null) {
            return redirect()->back();
        } else {
            $data = Produk::where('id', $id)->first();
            return view('admin.productEdit', [
                'title' => 'Edit Produk',
                'data' => $data
            ]);
        }
    }

    public function store(Request $request)
    {
        $last = Produk::all()->last()->id + 1;
        $request->file('gambar')->storeAs('public/produk', 'produk' . $last . '.' . $request->gambar->extension());

        $data = [
            'nama' => ucwords($request->nama),
            'harga' => 'Rp. ' . ucwords($request->harga),
            'gambar' => URL::to('/storage/produk/produk') . $last . '.' . $request->gambar->extension(),
            'status' => 'y',
        ];

        Produk::insert($data);
        return redirect('/admin/product')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        if ($request->gambar != null) {
            $request->file('gambar')->storeAs('public/produk', 'produk' . $request->id . '.' . $request->gambar->extension());

            $data = [
                'nama' => ucwords($request->nama),
                'harga' => ucwords($request->harga),
                'gambar' => URL::to('/storage/produk') . '/produk' . $request->id . '.' . $request->gambar->extension(),
                'status' => $request->status,
            ];

            Produk::where('id', $request->id)->update($data);
            return redirect('/admin/product')->with('success', 'Produk berhasil diupdate.');
        } else {
            $data = [
                'nama' => ucwords($request->nama),
                'harga' => ucwords($request->harga),
                'status' => $request->status,
            ];

            Produk::where('id', $request->id)->update($data);
            return redirect('/admin/product')->with('success', 'Produk berhasil diupdate.');
        }
    }

    public function drop($id = null)
    {
        $data = Produk::where('id', $id)->first();
        $img = str_replace([URL::to('/storage/produk') . '/produk'], ['produk'], $data->gambar);
        File::delete(public_path('storage/produk/' . $img));

        Produk::destroy($id);
        return redirect('/admin/product')->with('success', 'Produk berhasil dihapus.');
    }
}

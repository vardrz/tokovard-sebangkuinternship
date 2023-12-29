<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::where('level', 'user')->get();
        return view('admin.user', [
            'title' => 'Pengguna',
            'users' => $data
        ]);
    }

    public function approve($id = null)
    {
        if ($id != null) {
            User::where('id', $id)->update(['status' => 'y']);
            return back()->with('success', 'Akun berhasil di approve.');
        }

        return redirect()->back();
    }
}

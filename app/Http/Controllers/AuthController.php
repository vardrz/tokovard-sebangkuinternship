<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $cekApprove = User::where('email', $request->email)->first();
        if ($cekApprove->status == 'n') {
            return back()->with('error', 'Akun belum di approve!');
        }

        if (Auth::attempt($validation)) {
            $request->session()->regenerate();

            if (auth()->user()->level == 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function register()
    {
        return view('register', [
            'title' => 'Registrasi Pengguna'
        ]);
    }

    public function store(Request $req)
    {
        $validate = Validator::make($req->all(), [
            "nama" => "required",
            "telp" => "required",
            "email" => "required|unique:users",
            "password" => "min:4|required_with:password2|same:password2",
            "password2" => "min:4"
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('fail', '')->withErrors($validate)->withInput();
        } else {
            $data = [
                'name' => $req->nama,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'phone' => $req->telp,
                'status' => 'n',
                'level' => 'user',
            ];

            User::insert($data);
            return redirect('/')->with('success', 'Berhasil registrasi, namun status akun masih pending! tunggu sampai akun di approve.');
        }
    }
}

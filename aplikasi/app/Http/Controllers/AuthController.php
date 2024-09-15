<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('Halaman_depan.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'Username' => 'required',
            'Password' => 'required'
        ]);

        $username = $request->input('Username');
        $password = $request->input('Password');

        // Mengambil data dari Firebase
        $data = Http::get('https://haditech-4016a-default-rtdb.asia-southeast1.firebasedatabase.app/datadiri.json')->json();

        if ($data['username'] == $username && $data['password'] === $password) {
            Session::put('user', $data);

            $user = Session::get('user');
            return redirect('home');
        }

        return redirect('/')->withErrors(['loginError' => 'Username atau password salah']);
    }

    public function logout()
    {
        Session::forget('user');
        return redirect('/');
    }
}

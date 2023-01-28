<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $pengguna = Pengguna::where('username',$request->username)->first();

        if(!$pengguna){
            return redirect()->route('login')->with(['message'=>'Username atau password tidak ditemukan']);
        }

        if($pengguna->password != md5($request->password)){
            return redirect()->route('login')->with(['message'=>'Username atau password tidak ditemukan']);
        }

        Auth::login($pengguna,true);
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

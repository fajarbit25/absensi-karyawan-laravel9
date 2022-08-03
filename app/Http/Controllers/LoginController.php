<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function authenticate(request $request)
    {
        $credentials = $request->validate([
            'nik'       => 'required',
            'password'  => 'required'
        ]);

        if(Auth::attempt($credentials)){

            $nik = $request->input('nik');
            $image = DB::table('upersons')->where('nik', $nik)->get();
            $dataSessionImage = $image[0]->img;
            Session::put('imageSession', $dataSessionImage);
            
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('warning', 'Login failed..');
    }
    public function logout(request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
//$2y$10$LyU/aAXVgrKjo2pL.7V3BuElRwlBenRL7ntsLVnEUGmlLWbEGhFCC
//telkom123
//production/images/img.jpg

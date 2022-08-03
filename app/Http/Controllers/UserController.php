<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $title = "Data Users";
        $users = DB::table('users')
                ->orderBy('id', 'desc')
                ->get();
        return view('admin.datauser', compact('title', 'users'));
    }
    public function create()
    {
        $title = "Create Users";
        return view('admin.create_user', compact('title'));
    }
    public function store(request $request)
    {
        $validatedData = $request->validate([
            'nik'           => 'required|min:6|max:8|unique:users',
            'name'          => 'required|min:3|max:225',
            'email'         => 'required|email:dns|unique:users',
            'password'      => 'required|min:5|max:225'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('user')->with('success', 'User berhasil ditambahkan..');
    }
}

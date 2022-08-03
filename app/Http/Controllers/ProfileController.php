<?php

namespace App\Http\Controllers;
use App\Models\Upersons;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $title = "Profile";
        $nik = auth()->user()->nik;
        $user = DB::table('upersons')->where('nik', $nik)->get();
        return view('admin.profile', compact('title', 'user'));
    }
    public function update(request $request)
    {
        $id = auth()->user()->id;
        $request->validate([
            'name'      => ['required', 'min:3', 'max:255'],
            'email'     => ['required', 'email:dns'],
            'phone'     => ['required', 'min:10', 'max:16'],
            'address'   => ['required']
        ]);
        if($request->file('img')){
            $request->validate([
                'img'   => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'file', 'max:2048']
            ]);

            $imageName = $request->file('img')->store('production/images'); 

            $data = array(
                'name'      => $request->input('name'),
                'email'     => $request->input('email'),
                'phone'     => $request->input('phone'),
                'address'   => $request->input('address'),
                'img'       => $imageName
            ); 
        }else{
            $data = array(
                'name'      => $request->input('name'),
                'email'     => $request->input('email'),
                'phone'     => $request->input('phone'),
                'address'   => $request->input('address')
            ); 
        }
        DB::table('upersons')->where('id', $id)->update($data);
        return redirect('/profile')->with('success', 'Profile telah diupdate..');
    }
}

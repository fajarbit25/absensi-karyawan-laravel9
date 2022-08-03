<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        $title = "Level Settings";
        $level = Level::all();
        return view('admin.level', compact('title', 'level'));
    }
    public function delete(request $request)
    {
        $id = $request->input('id');
        DB::table('level')->where('id', $id)->delete();
        return redirect('level')->with('warning', 'Level deleted..');
    }
    public function store(request $request)
    {
        $valdatedData =  $request->validate([
            'level_code'        => ['required', 'min:2', 'max:8', 'unique:level'],
            'level_name'        => ['required', 'min:3', 'max:225', 'unique:level']
        ]);
        Level::create($valdatedData);
        return redirect('/level')->with('success', 'Level Added..');
    }
}

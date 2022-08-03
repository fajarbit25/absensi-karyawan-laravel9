<?php

namespace App\Http\Controllers;
use App\Models\Upersons;
use App\Models\Company;
use App\Models\Level;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpersonsController extends Controller
{
    public function index()
    {
        $title  = "Employee Information";
        $employee = Upersons::all();
        return view('admin.employee', compact('title', 'employee'));
    }
    public function create()
    {
        $title = "Create Employee";
        $company = Company::all();
        $level = Level::all();
        return view('admin.create_employee', compact('title', 'company', 'level'));
    }
    public function store(request $request)
    {
        $validatedData = $request->validate([
            'nik'           => ['required', 'unique:upersons', 'min:6', 'max:8'],
            'name'          => ['required', 'min:3'],
            'email'         => ['required', 'email:dns', 'unique:upersons'],
            'phone'         => ['required', 'min:9', 'max:13'],
            'img'           => ['required'],
            'address'       => ['required'],
            'token_validate'=> ['required'],
            'is_actived'    => ['required'],
            'idlevel'       => ['required', 'max:1'],
            'idcompany'     => ['required', 'max:1']
        ]);
        Upersons::create($validatedData);
        return redirect('employee')->with('success', 'Insert Employee data success...');
    }
    public function show($id)
    {
        $title = "Detail Employee Information";
        $data = DB::table('upersons')
                        ->rightJoin('company', 'company.id', '=', 'upersons.idcompany')
                        ->rightJoin('level', 'level.id', '=', 'upersons.idlevel')
                        ->where('upersons.id', $id)
                        ->get();
        return View('admin.detail_employee', compact('title', 'data'));
    }
    public function accept(request $request)
    {
        $nik = $request->input('nik');
        Upersons::where('nik', $nik)->update(['is_actived'=> 1]);
        return redirect('employee')->with('success', 'Accept Employee success...');
    }
    public function disable(request $request)
    {
        $nik = $request->input('nik');
        Upersons::where('nik', $nik)->update(['is_actived'=> 9]);
        return redirect('employee')->with('success', 'Disable Employee success...');
    }
    public function enable(request $request)
    {
        $nik = $request->input('nik');
        Upersons::where('nik', $nik)->update(['is_actived'=> 1]);
        return redirect('employee')->with('success', 'Enable Employee success...');
    }
}

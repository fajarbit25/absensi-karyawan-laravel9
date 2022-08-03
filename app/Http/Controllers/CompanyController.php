<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        $title = "Company";
        $company = Company::all();
        return view('admin.company', compact('title', 'company'));
    }
    public function create()
    {
        $title = "New Company";
        return view('admin.create_company', compact('title'));
    }
    public function store(request $request)
    {
        $validatedData = $request->validate([
            'company_code'      => ['required', 'max:10', 'unique:company'],
            'company_name'      => ['required', 'max:225', 'unique:company'],
            'company_address'   => ['required', 'max:225', 'unique:company'],
        ]);
        Company::create($validatedData);
        return redirect('company')->with('success', 'Create new company has ben successfully...');
    }
    public function show($id)
    {
        $title = "Company Information";
        $company = DB::table('company')->where('company_code', $id)->get();
        return view('admin.show_company', compact('title', 'company'));
    }
    public function update(request $request)
    {
        $request->validate([
            'id'                => ['required', 'max:1'],
            'company_code'      => ['required', 'max:10'],
            'company_name'      => ['required', 'max:225'],
            'company_address'   => ['required', 'max:225']
        ]);

        $id = $request->input('id');
        $company = Company::find($id);
        $company->update([
            'company_code'      => $request->input('company_code'),
            'company_name'      => $request->input('company_name'),
            'company_address'   => $request->input('company_address')
        ]);
        return redirect('company')->with('success', 'Company has ben update..');
    }
    public function delete(request $request)
    {
        $request->validate([
            'id'    => ['required', 'max:1']
        ]);
        $id = $request->input('id');
        DB::table('company')->where('id', $id)->delete();
        return redirect('company')->with('warning', 'Company has ben delete..');
    }
}

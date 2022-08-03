<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upersons;
use App\Models\Checklocks;
use App\Models\Level;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $title = "Attendance";
        return view('home', compact('title'));
    }
    public function check_nik(request $request)
    {
        $nik = $request->input('nik');
        $cekNik = Upersons::where('nik', $nik)->count();
        if($cekNik == 0){
            return redirect('/')->with('warning', 'Nik tidak terdaftar');
        }else{
            return redirect('view/'.$nik.'/information');
        }
    }
    public function data_information($id)
    {
        $title = "Data Information";
        $data = DB::table('upersons')
                        ->join('company', 'company.id', '=', 'upersons.idcompany')
                        ->join('level', 'level.id', '=', 'upersons.idlevel')
                        ->where('upersons.nik', $id)
                        ->get();
        return view('information', compact('title', 'data'));
    }
    public function check_in(request $request)
    {
        $request->validate([
            'nik'   => ['required']
        ]);
        $token = date('Y-m-d H:i');
        $nik = $request->input('nik');
        $cekNik = Upersons::where('nik', $nik)->count();
        if($cekNik == 0){
            return redirect('/')->with('warning', 'Nik tidak terdaftar');
        }
        
        $data = array(
            'idperson'  => $request->input('nik'),
            'tanggal'   => date('Y-m-d'),
            'check_in'  => date('H:i'),
            'check_out' => '-'
        );
        Checklocks::create($data);
        DB::table('upersons')->where('nik', $nik)->update(['token_validate' => $token]);
        return redirect('/')->with('success', 'Absensi Berhasil.');
    }
    public function outer_report()
    {
        $title = "Attendance Report";
        $tgl = date('Y-m-d');
        $report = DB::table('checklocks')
            ->leftJoin('upersons', 'upersons.nik', '=', 'checklocks.idperson')
            ->where('tanggal', $tgl)
            ->get();
        return view('outreport', compact('title', 'report'));
    }
    public function login()
    {
        return view('login');
    }
}

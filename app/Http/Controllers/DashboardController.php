<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Checklocks;
use App\Models\Upersons;
use App\Models\Company;
use App\Models\Level;

class DashboardController extends Controller
{
    public function index()
    {
        $tanggal = date('Y-m-d');
        $title = "Dashboard";

        $user = Upersons::count();
        $checkin = DB::table('checklocks')->where('tanggal', $tanggal)->count();
        $company = Company::count();
        $level = Level::count();

        return view('admin.dashboard', compact('title', 'user', 'checkin', 'company', 'level'));
    }
    public function report($id)
    {
        $tanggal = date('Y-m-d');
        $title = "Admin Report";
        $person = Upersons::all();
        return view('admin.in_report', compact('title', 'person', 'tanggal'));
    }
    public function allreport($id)
    {
        $tanggal = $id;
        $title = "Admin Report";
        $person = Upersons::all();
        return view('admin.in_report_all', compact('title', 'person', 'tanggal'));
    }
    public function allreportSearch(request $request)
    {
        $tanggal = $request->post('tanggal');
        $tanggalKey = $tanggal;
        $title = "Admin Report";
        $person = Upersons::all();
        return view('admin.in_report_all', compact('title', 'person', 'tanggal','tanggalKey'));
    }
}

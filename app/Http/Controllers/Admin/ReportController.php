<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function index(){
        $usersReports      = Report::where('supervisor','0')->with('User')->latest()->paginate(40);
        $supervisorReports = Report::where('supervisor','1')->with('User.Role')->latest()->paginate(40);
        return view('dashboard.reports.index', compact('usersReports',$usersReports,'supervisorReports',$supervisorReports));
    }

    public function delete() {
        Report::truncate();
        Session::flash('success', 'تم حذف التقارير');
        return back();
    }
}

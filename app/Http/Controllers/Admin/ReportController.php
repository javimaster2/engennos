<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CourseExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    //

    public function index()
    {
        return view('admin.reporte.index');

    }

    public function show(User $user)
    {
        return view('admin.reporte.show',compact('user'));
    }

    /* public function exportExcel(Request $request)
    {   

        return Excel::download(new CourseExport($request),'excelprueba.xlsx');
    } */
}

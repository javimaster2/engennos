<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    //
    public function index()
    {
        $courses=Course::where('status',3)->latest('id')->paginate(2);
        return view('admin.cupon.index',compact('courses'));

    }

    public function show(Course $course)
    {
        
        return view('admin.cupon.show',compact('course'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    public $students;
    public function __invoke()
    {
        $courses=Course::where('status','3')->latest('id')->get();

        $coursescount = Course::where('status','3')
        ->leftjoin('course_user','courses.id','=','course_user.course_id')
        ->groupBy('courses.id')
        ->orderBy(DB::raw('COUNT(course_user.user_id)'), 'DESC')
        ->take(5)->get();
        
        return view('welcome',compact('courses','coursescount'));
    }

    


    public function terms()
    {
        return view('terms');
    }
    public function contact()
    {
        return view('contact');
    }
    public function policy()
    {
        return view('policy');
    }

   
}

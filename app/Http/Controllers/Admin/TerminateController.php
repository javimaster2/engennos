<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TerminateController extends Controller
{
    public $cantidad=0;
    //
    public function index()
    {
        $user=Auth::user()->id;
        //$students=$course->students()->paginate(4);
        $courses=Course::where('user_id',$user)->paginate();
        
        return view('admin.terminate.index',compact('courses'));
    }

    public function recibe(Request $request)
    {
        $this->cantidad=$request->all();
        return $request->all();
    }
    
}

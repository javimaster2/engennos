<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //

    public function index()
    {
        return view('courses.index');
    }

    public function show(Course $course)
    {
        $this->authorize('published',$course);
        
        $similares=Course::where('category_id',$course->category_id)
                            ->where('id','!=',$course->id)
                            ->where('status',3)
                            ->latest('id')
                            ->take(5)
                            ->get();
        return view('courses.show',compact('course','similares'));
    }

    public function enrolled(Course $course)
    {
        $course->students()->attach(auth()->user()->id);
        return redirect()->route('courses.status',$course);
    }

    public function complete(Request $request,Course $course)
    {
        
        $var = DB::table('course_user')
            ->whereIn('course_id', [$course->id])
            ->get();
        
        foreach($var as $item)
        {
            if($request->valorc==$item->completado)
            {
                $course->students()->updateExistingPivot(auth()->user()->id,['state'=>'Wait']);
                
                return redirect()->route('courses.status',$course);

            }
            else{
                return "no completado";
            }
            
        }

        
            
            //$course->students()->updateExistingPivot(auth()->user()->id,['completado'=>$request->valorc]);
            //return redirect()->route('courses.status',$course);
            //$ids = DB::table('course_user')->where('course_id', '=', $course->id)->lists('user_id');
            //$var=DB::table('course_user')->get();
            
    
         
    }

   
}

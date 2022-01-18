<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;

class CourseController extends Controller
{
    
    public function index()
    {
        $courses=Course::where('status',2)->paginate(2);
        return view('admin.courses.index',compact('courses'));
    }

    public function show(Course $course)
    {
        $this->authorize('revision',$course);
        return view('admin.courses.show',compact('course'));
    }

    public function approved(Course $course)
    {
        if(!$course->lessons || !$course->goals || !$course->requirements || !$course->image)
        {
            $notification = array(
                'message' => 'No se puede publicar un curso que no este completo',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }

        $notification = array(
            'message' => 'El curso se publico con exito',
            'alert-type' => 'success'
        );
 
        $course->status=3;
        $course->save();

        //envio de correo electronico
        $correo=new ApprovedCourse($course);

        Mail::to($course->teacher->email)->queue($correo);

        return redirect()->route('admin.courses.index')->with($notification);
    }

    public function observation(Course $course)
    {
        return view('admin.courses.observation',compact('course'));
    }

    public function reject(Request $request,Course $course)
    {

        $request->validate([
            'body'=>'required'
        ]);
        $course->observation()->create($request->all());
        $course->status=1;
        $course->save();

        $correo=new RejectCourse($course);

        Mail::to($course->teacher->email)->queue($correo);
        $notification = array(
            'message' => 'El curso se rechazo con exito',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.courses.index')->with($notification);
    }

    

}

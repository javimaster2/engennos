<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AprobarResource extends Component
{

    public $course,$student;
    public function mount($student,Course $course)
    {
        $this->student=$student;
        $this->course=$course;
    }
    public function render()
    {
        $datos=DB::table('course_user')->whereIn('user_id',[$this->student->id])->get();
        return view('livewire.instructor.aprobar-resource',compact('datos'));
    }


    public function aprobar(Request $request,Course $course)
    {
        $notification = array(
            'message' => 'Se aprobo el recurso con exito',
            'alert-type' => 'success'
        );

        $var=DB::table('course_user')->whereIn('course_id',[$course->id])->get();

        foreach($var as $va)
        {
            if($va->state==$request->estado)
            {
                $course->students()->updateExistingPivot(auth()->user()->id,['state'=>"Active"]);
                return redirect()->route('instructor.courses.students',[$course])->with($notification);
            }
        }

    }
    




}

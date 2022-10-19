<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CourseController extends Controller
{
    //
    public $similar,$code;

    public function index()
    {
        return view('courses.index');
    }

    public function show(Course $course)
    {
        $this->authorize('published',$course);
        
        $this->similar=$similares=Course::where('category_id',$course->category_id)
                            ->where('id','!=',$course->id)
                            ->where('status',3)
                            ->latest('id')
                            ->take(2)
                            ->get();
        return view('courses.show',compact('course','similares'));
    }

    public function enrolled(Course $course)
    {
        // $course->students()->attach(auth()->user()->id);
        $course->students()->attach(auth()->user()->id,['value'=>0,'created_at'=>Carbon::now()]);
        
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

    /* public function applycupon(Request $request,Course $course)
        { 
            
            $messages=[
            'codigo.required'=>'Ingrese un codigo ',
            ];
            $rules=[
                'codigo'=>'required',
            ];
            $notification = array(
                'message' => 'La categoria se actualizo con exito',
                'alert-type' => 'success'
            );
            $this->validate($request,$rules,$messages);
        

       
        
        $cupon=Coupon::all();
        if(isset($request->codigo))
        {
            if($request->codigo=="")
            {
                echo "Codigo no valido";
            }else{
                
                
                $cupons=Coupon::where('codigo',$request->codigo)->where('course_id',$course->id)->get();
                foreach($cupons as $cupo)
                {
                    $this->code=$cupo->codigo;
                }

                if($this->code==$request->codigo)
                echo json_encode($cupons);
                else{
                    echo "cupon no valido";
                }
                
            }

            
        }else{
            echo "Error";
        }
       
    } */

    public function mecourse()
    {
        

        /* $users=Course::where('status','3')
                        ->where('user_id',Auth::user()->id)->latest('id')->get()->take(5); */

         $courses= Course::whereHas('users', function($q) {
            $q->where('course_user.user_id', Auth::user()->id);
                })->paginate(1);
                
        	
        //$users = Course::with('users')->where('status','3')->get();
        $users=Course::join('course_user','courses.id','=','course_user.course_id')
                                ->where('status','3')
                                ->latest('id')
                                ->take(5)->get();

        return view('courses.mecourses',compact('courses'));
    }

   
}

<?php

namespace App\Http\Livewire\Admin\Reporte;

use App\Models\Course;
use App\Models\User;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CourseExport;
use Illuminate\Support\Facades\DB;

class SubReporteComponent extends Component
{

    public $user;
    
    public $userid,$reportType,$datefrom,$dateto,$openmodal=false,$course_id,$datoscursos="nada",$suma,$idcourse;
    public $title,$d1=2,$d2=3,$da,$data =['title' => 'Hello World','template' => 'welcome'];

    /* public function mount(User $user)
    {
        $this->user=$user;
    } */
    public function render()
    {

        $datos = DB::table('course_user')
            ->join('users', 'course_user.user_id', '=', 'users.id')
            ->where("course_id",$this->course_id)
            ->whereBetween('course_user.created_at', [$this->datefrom, $this->dateto])
            ->select('course_user.*','users.name')
            ->get();
            $this->suma=0;
            foreach($datos as $item)
            {
               
                $this->suma+=$item->value;
            }

        $courses=Course::where('status',3)->where('user_id',$this->user->id)->get();
        return view('livewire.admin.reporte.sub-reporte-component',compact('courses','datos'));
    }

    public function mostrardatos($id)
    {
        $this->course_id=$id;
        $this->openmodal=true;

        $this->idcourse = Course::findOrFail($id);
        $this->title=$this->idcourse->title;

        /* $this->datoscursos = DB::table('course_user')
        ->where("course_id",$this->course_id)
        ->whereBetween('created_at', ["2022-03-01", "2022-03-25"])
        ->get(); */

        /* $this->datoscursos = DB::table('course_user as cp')
        ->join('users as u','cp.user_id','=','u.id')
        ->select('cp.*', 'u.name')    
        ->whereBetween('cp.created_at',["2022-03-22","2022-03-28"]) 
        ->orderBy('cp.id','desc')
        ->get(); */
        
        /* DB::table('course_user')
        ->where("course_id",$this->course_id)
        ->whereBetween('course_user.created_at', ["2022-03-01", "2022-03-28"])->sum('value'); */
    }

    /* public function download()
    {
        $title=$this->title;
        $datos = DB::table('course_user')
            ->join('users', 'course_user.user_id', '=', 'users.id')
            ->where("course_id",$this->course_id)
            ->whereBetween('course_user.created_at', ["2022-03-01", "2022-03-14"])
            ->select('course_user.*','users.name')
            ->get();
        $suma=$this->suma; 
         $pdf = PDF::loadView('livewire.admin.reporte.download',compact('datos','title','suma'))->output(); //

         $pdf->set_base_path('css/bootstrap.min.css');
         
        return response()->streamDownload(
            fn() => print($pdf), 'export_protocol.pdf'
        );

        /* $pdf = PDF::loadView('livewire.admin.reporte.download',compact('datos','title','suma'));
        return $pdf->download('invoice.pdf'); */
       
        
        /* redirect()->route('admin.reporte.download',compact('d1','d2','d3')); 
        
    } */
    public function export()
    {
        /* $this->dateto="2022-03-25";
        $this->datefrom="2022-03-31"; */
        return Excel::download(new CourseExport($this->course_id,$this->dateto,$this->datefrom,$this->suma),'excelprueba.xlsx');
    }
}

<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CourseExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id,$dateto,$datefrom,$suma;


    
    public function __construct($id,$dateto,$datefrom,$suma) 
    {
        $this->id = $id;
        $this->dateto=$dateto;
        $this->datefrom=$datefrom;
        $this->suma=$suma;
    }
    

    /* public function collection()
    {
    
         $datos = DB::table('course_user')
        ->join('users', 'course_user.user_id', '=', 'users.id')
        ->where("course_id",$this->data)
        ->whereBetween('course_user.created_at', ["2022-03-01", "2022-03-26"])
        ->select('course_user.*','users.name')
        ->get();
        return $datos;
        
    } */
    /* public function array(): array
    {
        dd($this->data);
        return $this->data;
    } */

    /* public function query()
    {
        
        return $datos = DB::table('course_user')
        ->join('users', 'course_user.user_id', '=', 'users.id')
        ->where("course_id",$this->data)
        ->whereBetween('course_user.created_at', ["2022-03-01", "2022-03-14"])
        ->select('course_user.*','users.name')
        ->get();
    
    } */

    public function view(): View
    {
        $suma=0;
        $datos = DB::table('course_user')
        ->join('users', 'course_user.user_id', '=', 'users.id')
        ->where("course_id",$this->id)
        ->whereBetween('course_user.created_at', [$this->datefrom,$this->dateto])
        ->select('course_user.*','users.name')
        ->get();
        
        
        
        return view('livewire.admin.reporte.download',[
            'datos' => $datos,'suma'=>$this->suma
        ]);
    }
}

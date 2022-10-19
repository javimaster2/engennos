<?php

namespace App\Http\Livewire\Admin\Reporte;

use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class ReporteComponent extends Component
{
    public $userid,$reportType,$datefrom,$dateto,$user_id,$search;
    public function render()
    {
        //$this->salesByDate();
        
        /* $users=User::where('name','LIKE','%'.$this->search.'%')->has('roles')->get(); */
        $users=User::where('name','LIKE','%'.$this->search.'%')->whereHas('roles', fn($query) => $query->where('name', 'instructor'))
        ->get();
        $data=Course::where('status',3)->user($this->user_id)->latest('id')->paginate(5);
        return view('livewire.admin.reporte.reporte-component',compact('users','data'));
    }

    public function resetFilters()
    {
        $this->reset(['user_id']);
    }

    public function salesByDate()
    {
        if($this->reportType==0)
        {
            $from=Carbon::parse(Carbon::now())->format('Y-m-d'). '00:00:00';
            $to=Carbon::parse(Carbon::now())->format('Y-m-d'). '23:59:59';
        }else
        {
            $from=Carbon::parse($this->datefrom)->format('Y-m-d'). '00:00:00';
            $to=Carbon::parse($this->dateto)->format('Y-m-d'). '23:59:59';
        }

        if($this->reportType==1 && ($this->datefrom=='' || $this->dateto==''))
        {
            return;
        }

        if($this->userid==0)
        {
            $this->data=Course::join('users as u','u.id','courses.user_id')
                        ->select('courses.*','u.name as user')
                        ->whereBetween('courses.created_at',[$from,$to]);
        }else{
            $this->data=Course::join('users as u','u.id','courses.user_id')
            ->select('courses.*','u.name as user')
            ->whereBetween('courses.created_at',[$from,$to])
            ->where('user_id',$this->userid)->get();
        }

    }
}

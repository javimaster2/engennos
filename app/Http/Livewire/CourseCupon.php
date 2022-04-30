<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use App\Models\Course;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class CourseCupon extends Component
{
    use LivewireAlert;

    public $course,$similares,$idcupon=" ",$codecupon,$valorcupon,$idvalor,$coupon="",$estado,$fecha,$fechaactual,$uso,$cantidad;
    public $pruebacount;
    
    public function mount($similar,Course $course)
    {
        $this->similares=$similar;
        $this->course=$course;
    }

    public function render()
    { 
        $students=$this->course->students()->get();
        $coursess=Course::where('status',3)->get();
        return view('livewire.course-cupon',compact('coursess'));
    }

    /* public function aler()
    {
        $this->alert('success', 'Hello!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'showCancelButton' => true,
            'onDismissed' => '',
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'showDenyButton' => false,
            'onDenied' => '',
           ]);
    } */

    
    public function getLessoncountProperty()
    {
        $suma=0;
        foreach ($this->course->sections as $section)
        {
            foreach ($section->lessons as $lesson)
            {
                $suma += $lesson->resource()->count();
            }
            
        }
               return $suma; 
                
        
    }

    public function aply()
    {
        
        /* if(isset($codecupon))
        {
            if($codecupon=="")
            {
                echo "Codigo no valido";
            }else{
                
                
                $cupons=Coupon::where('codigo',$codecupon)->where('course_id',$this->course->id)->get();
                foreach($cupons as $cupo)
                {
                    $this->idcupon=$cupo->codigo;
                }

                if($this->idcupon==$codecupon)
                {
                    session()->flash('message', 'Item Deleted Successfully');
                }
                    
                else{
                    session()->flash('message', 'Item Deleted Successfully');
                }
                
            }

            
        }else{  
            echo "Error";
        }
        
         */

         
        $this->validate([

            'codecupon' => 'required',

        ]);

         if($this->codecupon=="")
         {
            session()->flash('message', 'Cupon no valido');
         }
         else{
            $cupons=Coupon::where('codigo',$this->codecupon)->where('course_id',$this->course->id)->get();
            foreach($cupons as $cupo)
                {
                    $this->idcupon=$cupo->codigo;
                    $this->valorcupon=$cupo->valor;
                    $this->idvalor=$cupo->id;
                    $this->coupon=$cupo;
                    $this->estado=$cupo->status;
                    $this->uso=$cupo->uso;
                    $this->cantidad=$cupo->cantidad;
                    $this->fecha_vencimiento=$cupo->fecha_vencimiento;

                }

                if($this->idcupon==$this->codecupon && $this->estado=="activo"  && $this->uso<$this->cantidad && $this->fecha_vencimiento >= now()->toDateString() )
                {
                    $this->reset(['codecupon']);
                    session()->flash('message', 'Usted tiene un descuento de ');
                    

                }else{
                    $this->reset(['codecupon','idvalor','coupon']);
                    session()->flash('error', 'El cupon no es valido o no se encuentra registrado');
                }

                

         }
        
        

    }
    
}

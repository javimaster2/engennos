<?php

namespace App\Http\Livewire\Admin\Oferta;

use App\Models\Course;
use App\Models\Oferta;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OfertaComponent extends Component
{

    public $search,$oferta,$openmodal=false,$course_id,$ofert;

    public function render()
    {   
        $ofertas=Oferta::all();
        $courses=Course::where('title','LIKE','%'.$this->search.'%')->where('status',3)->latest('id')->paginate(5);
        return view('livewire.admin.oferta.oferta-component',compact('courses','ofertas'));
    }


    public function syncAll()
    {
        if($this->oferta=='Elegir')
        {
            $this->dispatchBrowserEvent('alert', 
        ['type' => 'success',  'message' => 'Selecciona una oferta valida']);
        return;
        }
        else{
            $oferta=Oferta::find($this->oferta);
            $courses=Course::where('status',3)->get();
            if($this->oferta!=null && $this->oferta!=1)
            {
                $course=DB::update(DB::raw("UPDATE courses SET oferta_id=$oferta->id"));
                $oferta->state="Active";
                $oferta->save();
                
                $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Se sincronizo la oferta a todos los cursos']);
            }else
            {
                $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Selecciona una oferta valida']);
                
            }
            
        }

       
    }

    public function removeAll()
    {
        if($this->oferta=='Elegir')
        {
            $this->dispatchBrowserEvent('alert', 
        ['type' => 'success',  'message' => 'Selecciona una oferta valido']);
        return;
        }
        else{
            $this->oferta=1;
            $oferta=Oferta::find($this->oferta);
            $course=DB::update(DB::raw("UPDATE courses SET oferta_id=$oferta->id"));
            
            $oferta->state="Disabled";
            $oferta->save();
            $this->oferta=null;
            $this->dispatchBrowserEvent('alert', 
            ['type' => 'success',  'message' => 'Las ofertas fueron revocadas']);
        }
    }

    public function Edit($id)
    {   
        $this->openmodal=true;
        $this->course_id=$id;
        $course=Course::find($id);
        $this->ofert=$course->oferta_id;


    }


    public function ActualizarOferta()
    {

        if($this->ofert=='Elegir')
        {
            $this->dispatchBrowserEvent('alert', 
        ['type' => 'success',  'message' => 'Selecciona una oferta valido']);
        return;
        }
        else
        {
            $oferta=Oferta::find($this->ofert);
            $course=Course::find($this->course_id);
            $course->oferta_id=$oferta->id;
            $course->update();
            $this->openmodal=false;
        }
        
    }

    public function borrarOferta()
    {
        if($this->ofert=='Elegir')
        {
            $this->dispatchBrowserEvent('alert', 
        ['type' => 'success',  'message' => 'Selecciona una oferta valido']);
        return;
        }
        else{
            
        }
    }

    public function cancelar()
    {
        $this->openmodal=false;
        
    }
}

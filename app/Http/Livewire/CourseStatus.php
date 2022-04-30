<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class CourseStatus extends Component
{
    use AuthorizesRequests;

    public $course;
    public $current;
    public $avance,$stat;
    protected $listeners = ['completed' => 'completed','changeLesson','refresh'=>'$refresh'];

    //recibe lo que estemos pasando por la url
    public function mount(Course $course)
    {
        $this->course=$course;

        foreach ($course->lessons as $lesson) {
            //encuentra la primera leccion que no se ha completado y asigna a current
            if(!$lesson->completed)
            {
                $this->current=$lesson;
                break;
            }
        }

        //en el caso que todo este marcado como culminado se le asigan el ultimo curso de lo contrario dario error
        if(!$this->current)
        {
            $this->current=$course->lessons->last();
        }

        $this->authorize('enrolled',$course);//protege la ruta si el usuario esta autentificado de lo cont.. error
        

    }

    public function render()
    { 
        
        return view('livewire.course-status');
    }

    //metodos
   //este metodo hara que reemplace el valor de la propiedad current
   public function changeLesson(Lesson $lesson)
   {
       $this->current=$lesson;
       
   }

   public function completed()
   {
       if($this->current->completed)
       {
           //eliminar registro
           $this->current->users()->detach(auth()->user()->id);//busca el registro en la tabla por su id y lo elimina

       }else
       {
           //agregar registro
           $this->current->users()->attach(auth()->user()->id); 
       }

       //que current se rellene, recuperamos la leccion que cumpla con este parametro
       //con esto estoy volviendo a recuperar el mismo   registro solo que que esta vez al recuperarlo ya va a reconocer que esta leccion a sido marcado como culminada
       $this->current=Lesson::find($this->current->id);
       $this->course=Course::find($this->course->id);
   }

   //propiedades computada
   public function getIndexProperty()
   {
       //indice //vamos a recuperar una coleccion con todas las lecciones que le corresponden a este curso
               // y luego determinar en que indice se encuentra el tema actual
       //me trae toda la coleccion de las lesiones  y pasamos la leccion actual
       // $this->index=$course->lessons->search($lesson);//este metodo search va a buscar dentro de la coleccion el registro que coicidan dentro de los parentesis y nos devuelme su indice
       //el metodo pluck me crea una coleccion a partir de una existente, solo que esta coleccion incluira el id de cadad uno de los registro
       return $this->course->lessons->pluck('id')->search($this->current->id);
      

   }
   public function getPreviousProperty()
   {
       if($this->index==0)
       {
          return null;
       }
       else{
           return $this->course->lessons[$this->index-1]; 
       }

   }
   public function getNextProperty()
   {
       if($this->index==$this->course->lessons->count()-1)//si index es igual a la cantidad de registro que tiene esa coleccion
       {
           return null;
           
       }
       else{
           return $this->course->lessons[$this->index+1];
          
       }
       
   }

   public function getAdvanceProperty()
   {
       $i=0;
       foreach ($this->course->lessons as $lesson) {
           if($lesson->completed)
           {
               $i++;
           }
       }

       $this->avance=$advance=($i*100)/($this->course->lessons->count());

       $this->course->students()->updateExistingPivot(auth()->user()->id,['completado'=>$advance]);
       return round($advance,2);
   }

   public function getStateProperty()
   {
        $this->state=$var = DB::table('course_user')
        ->whereIn('course_id', [$this->course->id])
        ->get();
        return $var;
   }


   public function download()
    {
        return response()->download(storage_path('app/public/'.$this->current->resource->url));
    }

    public function downloadcourse()
    {
        return response()->download(storage_path('app/public/'.$this->course->resource->url));
    }

    public function workfinal(Lesson $lesson)
    {
        if($this->avance==100)
        {
            $this->dispatchBrowserEvent('alert',['type'=>'success','message'=>'Puede enviar la tarea']);
        }else{
            $this->dispatchBrowserEvent('alert',['type'=>'error','message'=>'Aun no ha terminado el curso']);
        }   
    }

    public function refrescarcomponent()
    {
        if($this->index==$this->course->lessons->count()-1)//si index es igual a la cantidad de registro que tiene esa coleccion
       {
           return null;
       }
       else{
           return $this->course->lessons[$this->index+1];  
       }
    }

    

}

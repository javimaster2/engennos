<?php

namespace App\Http\Livewire\Admin\Cupon;

use App\Models\Coupon;
use App\Models\Course;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class SubCuponComponent extends Component
{
    use LivewireAlert;
    public $courses;
    

    public $fecha,$current;
    public $course,$id_cupon;
    public $codigo,$estado,$tipo,$cantidad,$value,$fechaven;
    public $openmodal=false; 
    public $accion="store";

    protected $listeners=['render','delete'];

    protected $rules=[
        'codigo'=>'required',
        'estado'=>'required',
        'tipo'=>'required',
        'cantidad'=>'required|integer|min:1|max:5',
        'value'=>'required|numeric',
        'fechaven'=>'required',
        
    ];
    protected $messages = [
        'codigo.required' => 'Ingrese un codigo valido',
        'estado.required' => 'Seleccione un estado',
        'tipo.required' => 'Seleccione un porcentaje',
        'cantidad.required' => 'Ingrese una cantidad valida',
        'cantidad.required|min:1' => 'Ingrese un valor mayor 0',
        'cantidad.required|max:5' => 'Ingrese un valor mayor 0',
        'value.required' => 'Seleccione un porcentaje',
        'fechaven.required' => 'Seleccione una fecha',

    ];


    public function mount(Course $course)
    {
        
        $this->courses=$course;
    }

    public function render()
    {
        $cupons=Coupon::where('course_id',$this->course->id)->get(); 
        return view('livewire.admin.cupon.sub-cupon-component',compact('cupons'));
    }

    public function limpiarcampos()
    {
        $this->reset(['openmodal','codigo','accion','estado','cantidad','fechaven',"value"]);
        $this->openmodal=false;
    }

    public function closemodal()
    {
        $this->reset(['openmodal','codigo','accion','estado','cantidad','fechaven',"value"]);

    }

    public function generador($length=10)
    {
        $this->codigo= substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
        
    }

    public function editar($id)
    {
        $cupones=Coupon::findOrFail($id);
        $this->id_cupon=$cupones->id;
        $this->codigo=$cupones->codigo;
        $this->estado=$cupones->status;
        $this->tipo=$cupones->tipo;
        $this->cantidad=$cupones->cantidad;
        $this->value=$cupones->valor;
        $this->fechaven=$cupones->fecha_vencimiento;
        $this->openmodal=true;
        $this->accion="update";
    }

    public function guardar()
    {
        
        $this->validate($this->rules,$this->messages);

        if($this->course->oferta->value==0)
        {
            if($this->value==10 || $this->value==20 )
                {
                    

                    Coupon::create([
                        'codigo'=>$this->codigo,
                        'status'=>$this->estado,
                        'uso'=>0,
                        'tipo'=>$this->tipo,
                        'cantidad'=>$this->cantidad,
                        'valor'=>$this->value,
                        'fecha_vencimiento'=>$this->fechaven,
                        'course_id'=>$this->course->id 
                    ]);
                    $this->alert('success', 'Hola', [
                        'position' => 'top-end',
                        'timer' => 3000,
                        'toast' => true,
                        'text' => 'El cupón se agrego con éxito',
                        'timerProgressBar' => true,
                    ]);
                }else{
                    $this->alert('error', 'Hello!', [
                        'position' => 'top-end',
                        'timer' => 3000,
                        'toast' => true,
                        'text' => 'El valor no esta dentro del rango',
                    ]);
                }
        }else{
            $this->alert('error', 'Sorry!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Lo sentimos no se puede crear un cupon, porque existe una oferta activa',
            ]);
        }
        
        
        

            /* $cupones=Coupon::findOrFail($this->id_cupon);
            $cupones->courses()->create([
                'codigo'=>$this->codigo,
                'status'=>$this->estado,
                'cantidad'=>$this->cantidad,
                'value'=>$this->value,
                'fecha_vencimiento'=>$this->fechaven,
                'course_id'=>$this->course->id
            ]); */
            
            $this->limpiarcampos();
    }

    public function update()
    {
        $this->validate();

        if($this->course->oferta->value==0)
        {
            if($this->value==10 || $this->value==20 || $this->value==30 || $this->value==40)
                {
                    $cupones = Coupon::find($this->id_cupon);

                    $cupones->update([
                        'codigo'=>$this->codigo,
                        'status'=>$this->estado,
                        'tipo'=>$this->tipo,
                        'cantidad'=>$this->cantidad,
                        'valor'=>$this->value,
                        'fecha_vencimiento'=>$this->fechaven,
                        'course_id'=>$this->course->id 
                    ]);
                    
                    $this->alert('success', 'Hola', [
                        'position' => 'top-end',
                        'timer' => 3000,
                        'toast' => true,
                        'text' => 'El cupón se actualizo con éxito',
                        'timerProgressBar' => true,
                    ]);
                }else{
                    $this->alert('error', 'Hola!', [
                        'position' => 'top-end',
                        'timer' => 3000,
                        'toast' => true,
                        'text' => 'El valor no esta dentro del rango',
                    ]);
                }
        }else{
            $this->alert('error', 'Lo sentimos!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Lo sentimos no se puede crear un cupon, porque existe una oferta activa',
            ]);
        }


        

        $this->limpiarcampos();
    }

    public function deletecupon($id)
    {
        
        Coupon::find($id)->delete();
    }
}

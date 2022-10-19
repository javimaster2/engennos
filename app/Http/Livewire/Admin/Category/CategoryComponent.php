<?php

namespace App\Http\Livewire\Admin\Category  ;

use App\Models\Category;
use App\Models\Course;
use Livewire\Component;

class CategoryComponent extends Component
{

    public $openmodal=false; 
    public $name,$id_category;
    public $accion="store",$valor=false;

    protected $listeners=['render','delete'];

    protected $rules=[
        'name'=>'required|max:50'
    ];

    public function render()
    {
        
        $categories=Category::all();
        return view('livewire.admin.category.category-component',compact('categories'));
    }

    public function limpiarcampos()
    {
        $this->name;
        $this->id_category; 
        $this->openmodal=false;
    }

    public function closemodal()
    {
        $this->reset(['openmodal','name','accion']);

    }
    public function save()
    {
        $this->validate();
        Category::create([
            'name'=>$this->name
        ]);
 
        $this->reset(['openmodal','name']);
        $this->emitTo('admin.category.category-component','render');
        $this->emit('alert','La categoria se creo exitosamente');
    }

    public function editar($id)
    {
        $category=Category::findOrFail($id);
        $this->id_category=$category->id;
        $this->name=$category->name;
        $this->openmodal=true;
        $this->accion="update";
    }
    public function delete(Category $category)
    {
        $courses=Course::all();
        if($category->courses)
        {
            $this->dispatchBrowserEvent('alert', 
            ['type' => 'error',  'message' => 'No se puede eliminar porque este campo esta asociado a otra tabla','valor'=>'true']);
            $this->valor=true;
        }
        else
        {
        //Category::find($id)->delete();
        $category->delete();
        }
        
    }

    public function guardar()
    {
        $this->validate();
        Category::updateOrCreate(['id'=>$this->id_category],
            [
                'name'=>$this->name
            ]);
            $this->limpiarcampos();
    }

}

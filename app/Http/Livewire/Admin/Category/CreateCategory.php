<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{

    public $open=false; 
    public $name;
    protected $rules=[
        'name'=>'required|50'
    ];

    public function render()
    {
        return view('livewire.admin.category.create-category');
    }

    public function save()
    {
        $this->validate();
        Category::create([
            'name'=>$this->name
        ]);
 
        $this->reset(['open','name']);
        $this->emitTo('admin.category.category-component','render');
        $this->emit('alert','La categoria se creo exitosamente');
    }
}

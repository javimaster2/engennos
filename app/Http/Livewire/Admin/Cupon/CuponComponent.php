<?php

namespace App\Http\Livewire\Admin\Cupon;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CuponComponent extends Component
{

    public $search,$course;
    use WithPagination;
    

    

    public function render()
    {
        $courses=Course::where('status',3)->where('title','LIKE','%'.$this->search.'%')->latest('id')->paginate(2);
        return view('livewire.admin.cupon.cupon-component',compact('courses'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    

    
}

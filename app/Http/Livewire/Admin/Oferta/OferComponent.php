<?php

namespace App\Http\Livewire\Admin\Oferta;

use App\Models\Course;
use Livewire\Component;

class OferComponent extends Component
{
    public $search;
    public function render()
    {
        $courses=Course::where('status',3)->latest('id')->paginate(5);
        
        return view('livewire.admin.oferta.ofer-component',compact('courses'));
    }
}

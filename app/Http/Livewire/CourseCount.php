<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CourseCount extends Component
{
    public $coursescount;
    public $coursesscount=[];

    public function loadPostt()
    {
        $this->coursesscount=$this->coursescount;
        $this->emit('gliderr');
    }

    public function render()
    {
        
        return view('livewire.course-count');
    }

    
}

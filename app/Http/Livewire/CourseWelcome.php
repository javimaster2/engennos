<?php

namespace App\Http\Livewire;


use Livewire\Component;

class CourseWelcome extends Component
{

    public $courses;
    public $coursess=[];
    public $cour,$cours;

    public $coursescount;
    public $coursesscount=[];

    public $readyToLoad = false;

    public function loadPost()
    {
        $this->coursess=$this->courses;
       // $this->emit('glider');
    }

    
 
    public function loadPosts()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        
        return view('livewire.course-welcome');
    }

}

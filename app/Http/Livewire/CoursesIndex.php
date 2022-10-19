<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;


class CoursesIndex extends Component
{
    use WithPagination;
    public $search='';
    public $category_id;
    public $page = 1;
    public $replycourses=[];
    public $loaddata=false;

   

    protected $queryString = ['search'=>['except'=>''],'page' => ['except' => 1]];

   
    public function render()
    {
        
        $categories=Category::all();
        $courses=Course::where('title','LIKE','%'.$this->search.'%')->where('status',3)
                        ->category($this->category_id)//utilizando queryScope
                        ->latest('id')
                        ->paginate(4);

        return view('livewire.courses-index',compact('courses','categories'));
    }

    public function loadCourse()
    {
       $this->loaddata=true;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['category_id']);
    }

        public function resetInput()
        {
            $this->reset('search');
        }

  
    
}

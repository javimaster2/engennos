<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;


class CoursesIndex extends Component
{
    use WithPagination;
    public $category_id;
    public function render()
    {
        $categories=Category::all();
        $courses=Course::where('status',3)
                        ->category($this->category_id)//utilizando queryScope
                        ->latest('id')
                        ->paginate(5);

        return view('livewire.courses-index',compact('courses','categories'));
    }

    public function resetFilters()
    {
        $this->reset(['category_id']);
    }

    
}

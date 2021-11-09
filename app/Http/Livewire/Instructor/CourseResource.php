<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CourseResource extends Component
{
    use WithFileUploads;
    public $course,$file,$prueba;
    public function mount(Course $course)
    {
        $this->course=$course;
    }
    public function render()
    {
        return view('livewire.instructor.course-resource')->layout('layouts.instructor',['course'=>$this->course]);
    }

    public function saved()
    {
        $this->validate([
            'file'=>'required'
        ]);

        $url=$this->file->store('resources');

        $this->course->resource()->create([
            'url'=>$url
        ]);

        $this->course=Course::find($this->course->id);

    }

    public function destroy()
    {
        Storage::delete($this->course->resource->url);
        $this->course->resource->delete();
        $this->course=Course::find($this->course->id);
    }
}

<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Lesson;
use App\Models\Platform;
use App\Models\Section;
use App\Observers\LessonObserver;
use Livewire\Component;

class CoursesLesson extends Component
{
    public $section,$lesson,$platforms,$name,$platform_id=2,$url,$iframe;

    protected $rules=[
        'lesson.name'=>'required',
        'lesson.platform_id'=>'required',
        'lesson.url'=>['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/']
    ];

    public function mount(Section $section)
    {
        $this->section=$section;
        $this->platforms=Platform::all();
        $this->lesson=new Lesson();
        
    }
    public function render()
    {
        return view('livewire.instructor.courses-lesson');
    }

    public function edit(Lesson $lesson)
    {
        $this->resetValidation();
        $this->lesson=$lesson;
    }

    public function store()
    {
        $rules=[
            'name'=>'required',
            'platform_id'=>'required',
            'url'=>['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/']
        ];

        /* if($this->platform_id==2)
        {
            //$rules['url']=['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'];
            $rules['url']=['required', 'regex:/https?:\/\/(www\.)?onedrive\.live\.com\/download[?+=&%a-zA-Z0-9]+/'];
        } */

        $this->validate($rules);

        Lesson::create([
            'name'=>$this->name,
            'url'=>$this->url,
            'platform_id'=>$this->platform_id,
            'section_id'=>$this->section->id
        ]);

        $this->reset(['name','platform_id','url']);
        $this->section=Section::find($this->section->id);
    }
    public function update()
    {

        $this->rules['lesson.url']=['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        /* if($this->lesson->platform_id==1)
        {
            $this->rules['lesson.url']=['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }
        else{
            $this->rules['lesson.url']=['required', 'regex:/https?:\/\/(www\.)?onedrive\.live\.com\/download[?+=&%a-zA-Z0-9]+/'];
        } */
        $this->validate();
        $this->lesson->save();
        $this->lesson=new Lesson();
        $this->section=Section::find($this->section->id);

    }
    public function cancel()
    {
        $this->lesson=new Lesson();
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        $this->section=Section::find($this->section->id);

    }
}

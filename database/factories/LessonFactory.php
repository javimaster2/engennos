<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->sentence(),
            'url'=>'https://vimeo.com/679177498',
            'iframe'=>'<source id="videoplay" width="560" height="315" src="https://vimeo.com/679177498" type="video/mp4></iframe>',
            'platform_id'=>1,
        ];
    }
}

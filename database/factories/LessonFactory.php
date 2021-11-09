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
            'url'=>'https://onedrive.live.com/download?cid=A22253AD553B9A9A&resid=A22253AD553B9A9A%213233&authkey=APvsAwjrlPwioUc',
            'iframe'=>'<source width="560" height="315" src="https://onedrive.live.com/download?cid=A22253AD553B9A9A&resid=A22253AD553B9A9A%213233&authkey=APvsAwjrlPwioUc" type="video/mp4></iframe>',
            'platform_id'=>2,
        ];
    }
}

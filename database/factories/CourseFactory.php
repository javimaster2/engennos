<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\Oferta;
use App\Models\Price;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title=$this->faker->sentence();
        return [
            //encargar de llenar datos de prueba
            'title'=>$title,
            'subtitle'=>$this->faker->sentence(),
            'description'=>$this->faker->paragraph(),
            'status'=>$this->faker->randomElement([Course::BORRADOR,Course::REVISION,Course::PUBLICADO]),
            'slug'=>Str::slug($title),
            //'user_id'=>1,
            'intro'=>'https://vimeo.com/679177498',
            'iframe'=>'<source width="100" height="300" src="https://vimeo.com/679177498" type="video/mp4></iframe>',
            'user_id'=>$this->faker->randomElement([1,2,3,4]),
            'category_id'=>Category::all()->random()->id,
            'price_id'=>Price::all()->random()->id,
            'oferta_id'=>Oferta::all()->random()->id,
        ];
    }
}

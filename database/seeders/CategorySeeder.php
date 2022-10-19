<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'Ingenieria hidraulica'
        ]);
        Category::create([
            'name'=>'Geologia y Topografia'
        ]);
        Category::create([  
            'name'=>'Autodesk Civil 3D'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create(); 
        Storage::deleteDirectory('courses');
        Storage::makeDirectory('courses');
        
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(OfertaSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(CourseSeeder::class);
        
    }
}

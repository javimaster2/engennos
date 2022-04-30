<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //crear el usuario
        $user=User::create([
            'name'=>'Hector Jarquin Gonzalez',
            'email'=>'jarquin@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>bcrypt('12345678'),
        ]); 
        $user->assignRole('Admin');

        User::factory(10)->create();

    }
}

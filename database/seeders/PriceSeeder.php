<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Price::create([
            'name'=>'34.99 US$',
            'value'=>34.99
        ]);
        Price::create([
            'name'=>'39.99 US$',
            'value'=>39.99
        ]);
        Price::create([
            'name'=>'44.99 US$',
            'value'=>44.99
        ]);
        Price::create([
            'name'=>'Gratis',
            'value'=>0
        ]);
    }
}

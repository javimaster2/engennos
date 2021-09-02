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
            'name'=>'19.99 US$',
            'value'=>19.99
        ]);
        Price::create([
            'name'=>'29.99 US$',
            'value'=>29.99
        ]);
        Price::create([
            'name'=>'39.99 US$',
            'value'=>39.99
        ]);
        Price::create([
            'name'=>'49.99 US$',
            'value'=>49.99
        ]);
    }
}

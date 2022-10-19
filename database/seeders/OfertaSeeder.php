<?php

namespace Database\Seeders;

use App\Models\Oferta;
use Illuminate\Database\Seeder;

class OfertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Oferta::create([
            'name'=>'No hay oferta',
            'value'=>0
        ]);
        Oferta::create([
            'name'=>'19.99 US$',
            'value'=>19.99
        ]);
        Oferta::create([
            'name'=>'24.99 US$',
            'value'=>24.99
        ]);
        Oferta::create([
            'name'=>'30.99 US$',
            'value'=>30.99
        ]);
        
    }
}

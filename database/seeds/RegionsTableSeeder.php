<?php

use Illuminate\Database\Seeder;
use App\Region;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::truncate();
        Region::create(['name'=>'Sekondi (Western)',
            'description'=>'Sekondi (Western)']);
        Region::create(['name'=>'Ho (Volta)',
            'description'=>'Ho (Volta)']);
        Region::create(['name'=>'Accra (Greater Accra)',
            'description'=>'Accra (Greater Accra)']);
        Region::create(['name'=>'Koforidua (Eastern)',
            'description'=>'Koforidua (Eastern)']);        
        Region::create(['name'=>'Kumasi (Ashanti)',
            'description'=>' Kumasi (Ashanti)']);
        Region::create(['name'=>'Cape Coast (Central) ',
            'description'=>'Cape Coast (Central) ']);
        Region::create(['name'=>'Sunyani (Bono)',
            'description'=>'Sunyani (Bono)']);
        Region::create(['name'=>'Tamale (Northern)',
            'description'=>'Tamale (Northern)']);
        Region::create(['name'=>'Bolgatanga (Upper East)',
            'description'=>'Bolgatanga (Upper East)']);
        Region::create(['name'=>'Wa (Upper West)',
            'description'=>'Wa (Upper West)']);
    }
}

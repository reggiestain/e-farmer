<?php

use Illuminate\Database\Seeder;
use App\District;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      District::truncate();
        District::create(['name'=>'Kwahu south',
            'description'=>'Kwahu south']);
        District::create(['name'=>'Twifo Ati Mokwa',
            'description'=>'Twifo Ati Mokwa']);
        District::create(['name'=>'Offinso Nort',
            'description'=>'Offinso Nort']);
        District::create(['name'=>'Adansi South',
            'description'=>'Adansi South']);
        District::create(['name'=>'East Mamprusi',
            'description'=>'East Mamprusi']);
    }
}

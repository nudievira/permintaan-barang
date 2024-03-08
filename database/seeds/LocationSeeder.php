<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'rak_number' => 'L1-R1A',
        ]);
        Location::create([
            'rak_number' => 'L2-Z1A',
        ]);
        Location::create([
            'rak_number' => 'L9-B6C',
        ]);

    }
}

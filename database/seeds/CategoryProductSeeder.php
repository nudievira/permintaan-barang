<?php

use App\CategoryProduct;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryProduct::create([
            'name' => 'ATK',
        ]);
        CategoryProduct::create([
            'name' => 'MTS',
        ]);
        CategoryProduct::create([
            'name' => 'MATRIAL',
        ]);


    }
}

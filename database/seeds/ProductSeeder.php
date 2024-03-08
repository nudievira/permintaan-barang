<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'ATK001 - AMPLOP A COKLAT JAWA',
            'uom' => 'Pack',
            'category_product_id' => '1',
            'qty' => '21',
            'location_id' => '1'
        ]);
        Product::create([
            'name' => 'ATK002 - AMPLOP B COKLAT SUNDA',
            'uom' => 'Pack',
            'category_product_id' => '1',
            'qty' => '0',
            'location_id' => '1'
        ]);
        Product::create([
            'name' => 'ATK003 - PEWARNA A MERAH MANGGA',
            'uom' => 'PCS',
            'category_product_id' => '1',
            'qty' => '50',
            'location_id' => '1'
        ]);
        Product::create([
            'name' => 'MTS001 - GERINDA',
            'uom' => 'PCS',
            'category_product_id' => '2',
            'qty' => '12',
            'location_id' => '2'
        ]);
        Product::create([
            'name' => 'MTS101 - GERGAJI',
            'uom' => 'PCS',
            'category_product_id' => '2',
            'qty' => '0',
            'location_id' => '2'
        ]);
        Product::create([
            'name' => 'MTS301 - PALU',
            'uom' => 'PCS',
            'category_product_id' => '2',
            'qty' => '10',
            'location_id' => '2'
        ]);
        Product::create([
            'name' => 'MATRIAL001 - SEMEN 4 RODA',
            'uom' => 'Shack',
            'category_product_id' => '3',
            'qty' => '2000',
            'location_id' => '3'
        ]);
        Product::create([
            'name' => 'MATRIAL055 - KUAS',
            'uom' => 'PCS',
            'category_product_id' => '3',
            'qty' => '5',
            'location_id' => '3'
        ]);
        Product::create([
            'name' => 'MATRIAL155 - PASIR',
            'uom' => 'KG',
            'category_product_id' => '3',
            'qty' => '1240',
            'location_id' => '3'
        ]);
        Product::create([
            'name' => 'MATRIAL255 - BATU METEOR',
            'uom' => 'KG',
            'category_product_id' => '3',
            'qty' => '1240',
            'location_id' => '3'
        ]);

    }
}

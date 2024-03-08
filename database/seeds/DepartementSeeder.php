<?php

use App\Departement;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departement::create([
            'name' => 'IT',
        ]);
        Departement::create([
            'name' => 'Marketing',
        ]);
        Departement::create([
            'name' => 'Sales',
        ]);
        Departement::create([
            'name' => 'PPIC',
        ]);
        Departement::create([
            'name' => 'Accounting',
        ]);
        Departement::create([
            'name' => 'QC',
        ]);
        Departement::create([
            'name' => 'HRGA',
        ]);
        Departement::create([
            'name' => 'Purchasing',
        ]);
        Departement::create([
            'name' => 'Auditor',
        ]);
        Departement::create([
            'name' => 'Engineering',
        ]);
    }
}

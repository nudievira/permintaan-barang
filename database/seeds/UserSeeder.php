<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Tambahkan pengguna baru
        User::create([
            'name' => 'admin produksi',
            'email' => 'amdin@gmail.com',
            'role' => '0',
            'status' => '10',
            'username' => 'admin',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'irfan',
            'email' => 'irfan@gmail.com',
            'username' => 'irfan',
            'role' => '1',
            'status' => '10',
            'NIK' => '001.001.0001',
            'departement_id' => '1',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'anton',
            'email' => 'anton@gmail.com',
            'username' => 'anton',
            'role' => '1',
            'status' => '10',
            'NIK' => '002.002.0021',
            'departement_id' => '2',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'marley',
            'email' => 'marley@gmail.com',
            'username' => 'marley',
            'role' => '1',
            'status' => '10',
            'NIK' => '003.003.0021',
            'departement_id' => '3',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'intan nudia',
            'email' => 'intan_nudia@gmail.com',
            'username' => 'intan_nudia',
            'role' => '1',
            'status' => '10',
            'NIK' => '013.003.0021',
            'departement_id' => '4',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'deska kipak',
            'email' => 'deska_kipak@gmail.com',
            'username' => 'deska_kipak',
            'role' => '1',
            'status' => '10',
            'NIK' => '103.003.0021',
            'departement_id' => '5',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'dinar anggia putri',
            'email' => 'dinar@gmail.com',
            'username' => 'dinar anggia putri',
            'role' => '1',
            'status' => '10',
            'NIK' => '123.023.0021',
            'departement_id' => '6',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'oban',
            'email' => 'oban@gmail.com',
            'username' => 'oban',
            'role' => '1',
            'status' => '10',
            'NIK' => '143.723.0221',
            'departement_id' => '7',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'lana',
            'email' => 'lana@gmail.com',
            'username' => 'lana',
            'role' => '1',
            'status' => '0',
            'NIK' => '133.723.1221',
            'departement_id' => '8',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'elang',
            'email' => 'elang@gmail.com',
            'username' => 'elang',
            'role' => '1',
            'status' => '0',
            'NIK' => '143.233.1221',
            'departement_id' => '9',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'diana',
            'email' => 'diana@gmail.com',
            'username' => 'diana',
            'role' => '1',
            'status' => '10',
            'NIK' => '133.263.1121',
            'departement_id' => '10',
            'password' => Hash::make('12345678'),
        ]);
    }
}

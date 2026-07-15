<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('admin')->insert([
        //     'username' => 'Faruq',
        //     'name' => 'Faruq Alfa',
        //     'email' => 'faruq@gmail.com',
        //     'password' => Hash::make('faruq123'),
        // ]);

        DB::table('admin')->insert([
            'username' => 'Alfa',
            'name' => 'Alfahmi',
            'email' => 'alfa@gmail.com',
            'password' => Hash::make('alfahmi123'),
        ]);
    }
}

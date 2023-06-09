<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff')->insert([

            'name' => 'StaffGudang',
            'nama_staff'=> 'Kholid Maulidi',
            'username' => 'Staff',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('staff123'),
            'no_telepon'=> '087750897177'

        ]);
    }
}

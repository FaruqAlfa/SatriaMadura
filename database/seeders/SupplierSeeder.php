<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplier')->insert([
            'name'=>'Supplier',
            'nama_supplier'=> 'Hanif Naufal',
            'username'=>'Hanif',
            'email'=>'hanif.naufal@gmail.com',
            'password'=>Hash::make('hanif123'),
            'no_telepon'=> '081249573646'
        ]);
    }
}

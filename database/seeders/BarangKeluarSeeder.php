<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang_keluar')->insert([
            'staff_id'=> '1',
            'barang_id'=> '1',
            'jumlah'=> 1,
            'harga'=> 50000,
            'tanggal_keluar'=> '2023-03-16'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang_masuk')->insert([
            'supplier_id'=> '1',
            'barang_id'=> '1',
            'jumlah'=> 3,
            'harga'=> 50000,
            'tanggal_masuk'=> '2023-02-12'
        ]);
    }
}

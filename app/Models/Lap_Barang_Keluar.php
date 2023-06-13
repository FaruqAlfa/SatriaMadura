<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang_Keluar;
use App\Models\Staff;

class Lap_Barang_Keluar extends Model
{
    use HasFactory;
    protected $table = 'lap_barang_keluar';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'staff_id',
        'jumlah',
        'total',
        'tanggal_keluar',
    ];

    public function barang_keluar()
    {
        return $this->belongsTo(Barang_Keluar::class, 'barang_keluar_id');
    }
}

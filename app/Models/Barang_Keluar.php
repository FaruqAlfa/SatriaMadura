<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Staff;
use App\Models\Lap_Barang_Keluar;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang_Keluar extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'barang_keluar';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'staff_id',
        'jumlah',
        'total',
        'tanggal_keluar',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function lap_barang_keluar()
    {
        return $this->hasMany(Lap_Barang_Keluar::class);
    }
}

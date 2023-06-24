<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Lap_Barang_Masuk;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\SoftDeletes;


class Barang_Masuk extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'barang_masuk';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'supplier_id',
        'barang_id',
        'jumlah',
        'harga',
        'total',
        'tanggal_masuk',
    ];

    public function supplier()
    {
        return $this->belongsTo(SupplierResource::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function lap_barang_masuk()
    {
        return $this->hasMany(Lap_Barang_Masuk::class);
    }
}

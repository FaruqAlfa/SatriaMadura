<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang_Masuk;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lap_Barang_Masuk extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'lap_barang_masuk';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'supplier_id',
        'jumlah',
        'total',
        'tanggal_masuk',
    ];

    public function barang_masuk()
    {
        return $this->belongsTo(Barang_Masuk::class, 'barang_masuk_id');
    }
}

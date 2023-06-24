<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang_Masuk;
use App\Models\Barang_Keluar;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="barang"; 
    public $timestamps= false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_barang',
        'stok',
        'harga',
    ];

    public function barang_masuk(){
        return $this->hasMany(Barang_Masuk::class);
    }

    public function barang_keluar(){
        return $this->hasMany(Barang_Keluar::class);
    }
}

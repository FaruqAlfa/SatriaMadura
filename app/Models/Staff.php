<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Barang_Keluar;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Model;

class Staff extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = "staff";
    public $timestamps = false;
    protected $primaryKey = 'id';


    protected $fillable = [
        'kategori',
        'nama_staff',
        'username',
        'email',
        'password',
        'no_telepon',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }


}

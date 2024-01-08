<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $table = 'instansi';

    protected $primaryKey = 'id_instansi';

    protected $fillable = ['nama_instansi'];

    public function user()
    {
        // return $this->hasOne('App\Models\Instansi', 'id', 'instansi_id');
        return $this->hasMany(User::class, 'instansi_id');
    }
}

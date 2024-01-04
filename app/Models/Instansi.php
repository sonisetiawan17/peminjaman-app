<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_organisasi',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User', 'instansi_id', 'id');
    }
}

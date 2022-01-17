<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa',
        'nit',
        'telefono',
        'direccion',
        'ciudad',
        'dian',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
    ];

    /**
     * Obtener el usuario que generó el informe.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


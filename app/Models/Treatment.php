<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cost',
    ];

    /**
     * Obtener las citas asociadas con el tratamiento.
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}


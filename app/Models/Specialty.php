<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Obtener los doctores asociados con la especialidad.
     */
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_specialties');
    }
}


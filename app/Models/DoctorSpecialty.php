<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSpecialty extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'doctor_id',
        'specialty_id',
    ];

    /**
     * Obtener el doctor asociado con la relación doctor-especialidad.
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Obtener la especialidad asociada con la relación doctor-especialidad.
     */
    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
}


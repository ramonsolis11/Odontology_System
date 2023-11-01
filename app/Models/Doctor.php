<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
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
     * Obtener el usuario asociado con el doctor.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtener las especialidades asociadas con el doctor.
     */
    public function specialties()
    {
        return $this->belongsToMany(Specialty::class, 'doctor_specialties');
    }

    /**
     * Obtener las citas asociadas con el doctor.
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}


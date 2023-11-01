<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    /**
     * Obtener el doctor asociado al usuario.
     */
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    /**
     * Obtener las citas asociadas al usuario (como paciente).
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    /**
     * Obtener los reportes generados por el usuario.
     */
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}


<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements AuthenticatableContract
{
    use HasFactory, Notifiable;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Los atributos que deberían ser ocultos para los arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deberían ser de tipo Carbon (fecha y hora).
     *
     * @var array
     */
    protected $dates = [
        'email_verified_at',
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



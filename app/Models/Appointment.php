<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'treatment_id',
        'date_time',
    ];

    /**
     * Obtener el doctor asociado con la cita.
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Obtener el paciente asociado con la cita.
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    /**
     * Obtener el tratamiento asociado con la cita.
     */
    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }

    /**
     * Obtener el pago asociado con la cita.
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}


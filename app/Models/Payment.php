<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'appointment_id',
        'amount',
        'date',
    ];

    /**
     * Obtener la cita asociada con el pago.
     */
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}


<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model{

    protected $table = 'appointments';

    protected $fillable = [
  		'doctor_id',
  		'patient_id',
      'cancel_id',
      'appointment_time',
      'appointment_date',
      'reason',
      'confirmed',
      'waiting_room',
      'completed',
  	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

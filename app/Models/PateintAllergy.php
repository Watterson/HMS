<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class PatientAllergy extends Model{

    protected $table = 'patient_allergies';

    protected $fillable = [
  		'patient_id',
      'doctor_id',
      'allergy_id',
  		'perscription_id',
      'severity',
      'notes',
  	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

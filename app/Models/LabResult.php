<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class LabResult extends Model{

    protected $table = 'lab_results';

    protected $fillable = [
  		'type',
  		'patient_id',
      'doctor_id',
      'notes',
      'completed',
  	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

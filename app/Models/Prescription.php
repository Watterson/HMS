<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model{

    protected $table = 'precriptions';

    protected $fillable = [
  		'patient_id',
      'doctor_id',
  		'medicine_id',
      'problem',
      'reason'
      'dose',
      'dose_duration',
      'quantity',
      'start_date',
      'end_date',
  	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

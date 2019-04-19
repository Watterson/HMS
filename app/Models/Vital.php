<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Vital extends Model{

    protected $table = 'vitals';

    protected $fillable = [
  		'patient_id',
  		'height',
      'weight',
      'body_temp',
      'pulse',
      'resp_rate',
      'blood_pressure'
  	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

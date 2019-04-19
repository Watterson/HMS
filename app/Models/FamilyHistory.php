<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class FamilyHistory extends Model{

    protected $table = 'family_history';

    protected $fillable = [
  		'patient_id',
      'contracted',
      'disease_id '
      'severity',
      'treatment_available',
  		'treatment_perscribed',
      'perscription_id',
  	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

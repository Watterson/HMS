<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Allergy extends Model{

    protected $table = 'allergies';

    protected $fillable = [
  		'type',
  		'agent',
      'reaction',
      'severity',
      'source',
  	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

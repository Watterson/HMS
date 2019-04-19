<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model{

    protected $table = 'diseases';

    protected $fillable = [
  		'name',
  		'description',
      'type',
  	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

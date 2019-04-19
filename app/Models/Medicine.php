<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model{

    protected $table = 'medicines';

    protected $fillable = [
  		'name',
  		'description',
      'dose',
      'duration',
      'quantity',
  	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

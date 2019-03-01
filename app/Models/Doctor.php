<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model{

    protected $table = 'doctors';

    protected $fillable = [
  		'first_name',
  		'last_name'
  	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

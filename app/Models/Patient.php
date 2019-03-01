<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model{

    protected $table = 'patients';

    protected $fillable = [
  		'first_name',
  		'last_name',
  		'address',
  		'mobile',
  		'gender',
  		'dob',
      'blood_type',
      'family_history',
      'medical_history',
      'post_surgical_history',
      'created_by'

  	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}

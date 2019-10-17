<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpousalDetail extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['farmer_id','s_firstname','s_surname','s_birth_date','mobile'];
}

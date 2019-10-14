<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['*'];
    public function region() {
        
        return $this->belongsTo(Region::class);
        
    }
}

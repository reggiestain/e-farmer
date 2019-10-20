<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FarmDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['farmer_id','crop_type','seedlings','size_of_land','year_extablished','district','longitude','latitude'];
    
    public function region() {

        return $this->belongsTo(Region::class, 'region_id', 'id');
    }
}

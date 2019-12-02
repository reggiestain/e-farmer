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
    protected $fillable = ['farmer_id','crop_id','seedlings','location','status','size_of_land','year_extablished','district_id','longitude','latitude'];
    
    public function region() {

        return $this->belongsTo(Region::class, 'region_id', 'id');
    }
    
    public function district() {

        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    
    public function crop() {

        return $this->belongsTo(Crop::class, 'crop_id', 'id');
    }
}

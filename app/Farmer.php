<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname','user_id','surname', 'gender', 'age', 'birth_date', 'birth_place', 'mobile', 'mobile2', 'marital_status',
        'age', 'number_of_children', 'number_of_dependencies', 'address', 'postal_address', 'email'];

    public function user() {

        return $this->belongsTo(User::class,'user_id','id');
    }
     
    public function region() {

        return $this->belongsTo(Region::class, 'region_id', 'id');
    }
    
    public function farmDetail() {
        
        return $this->hasMany(FarmDetail::class);
    }

    public function spousalDetail() {
        
        return $this->hasOne(SpousalDetail::class);
    }

    public function bankDetail() {
        return $this->hasOne(BankDetail::class);
    }

}

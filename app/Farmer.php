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

    public function region() {

        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function farmDetail() {
        return $this->belongsTo(FarmDetail::class);
    }

    public function spousalDetail() {
        return $this->belongsTo(SpousalDetail::class);
    }

    public function bankDetail() {
        return $this->belongsTo(BankDetail::class);
    }

}

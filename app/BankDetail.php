<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['farmer_id','bank_name','branch_name','account_no','branch_code','mobile_money'];
}

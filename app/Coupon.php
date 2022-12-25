<?php

namespace App;
use App\Constants\ApplicationConstant;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{

    protected $fillable = [
        'coupon_name',
        'status'
    ];


    public function getStatusAttribute($value)
    {
        if($value == ApplicationConstant::ACTIVE)
        {
            return "Active";
        }
        else{
            return "InActive";
        }
    }
}

<?php

namespace App;
use App\Constants\ApplicationConstant;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'brand_name',

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

<?php

namespace App;

use App\Constants\ApplicationConstant;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Category extends Model
{

    protected $fillable = [
        'category_name',
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

<?php

namespace App;
use App\Constants\ApplicationConstant;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'product_name',
        'category_id',
        'brand_id',
        'product_slug',
        'product_code',
        'product_quantity',
        'short_description',
        'long_description',
        'product_price',
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

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function productImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id' , 'id');
    }


}

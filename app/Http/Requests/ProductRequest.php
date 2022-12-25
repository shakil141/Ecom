<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => 'required|max:255',
            'category_id' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'product_slug' => 'required|max:255',
            'product_code' => 'required|max:255',
            'product_quantity' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'product_price' => 'required|max:255',
            'image_path' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'select category name',
            'brand_id.required' => 'select brand name'
        ];
    }

}

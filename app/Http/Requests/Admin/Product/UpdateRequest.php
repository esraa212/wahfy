<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => "required",
            'description' => "required",
            'price' => "required|numeric",
            'active' => "required",
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:2048',
            'product_category_id' => "required|exists:categories,id",
            'supplier_id' => "required|exists:suppliers,id",
        ];
    }
}

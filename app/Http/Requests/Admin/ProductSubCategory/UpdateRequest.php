<?php

namespace App\Http\Requests\Admin\ProductSubCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
    public function rules(Request $request)
    {
        return [
            'name' => "required|unique:product_sub_categories,name," . $request->segment(3),
            'product_category_id' => "required|exists:product_categories,id",
        ];
    }
}

<?php

namespace App\Http\Requests\Admin\Supplier;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateSupplierRequest extends FormRequest
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
            'name' => "required|unique:suppliers,name," . $request->segment(3),
            'category_id' => "required|exists:categories,id",
            'city_id' => "required|exists:cities,id",
            'industry_id' => "required|exists:industries,id",
            'address'=>'required',


        ];
    }
}

<?php

namespace App\Http\Requests\Admin\Attribute;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateAttributeRequest extends FormRequest
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
            'value' => 'required|unique:attributes,value,'.$request->segment(3),  
            'type' => "required"
        ];
    }
    public function messages()
    {
        return [
            'value.required'=>'Attribute value is required',
            'value.unique'=>' Attribute value is existed',
        ];
    }
}

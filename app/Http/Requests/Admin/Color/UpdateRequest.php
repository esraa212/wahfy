<?php

namespace App\Http\Requests\Admin\Color;

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
            'name' => 'required|unique:colors,name,'.$request->segment(3),  
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Attribute name is required',
            'name.unique'=>' Attribute name is existed',
        ];
    }
}

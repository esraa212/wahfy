<?php

namespace App\Http\Requests\Admin\Attribute;

use Illuminate\Foundation\Http\FormRequest;

class CreateAttributeRequest extends FormRequest
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
            'value' => "required|unique:attributes",
            'type' => "required"
        ];
    }
    public function messages()
    {
        return [
            'value.required'=>'attribute value is required',
            'value.unique'=>'attribute value is existed',
        ];
    }
}

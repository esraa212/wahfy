<?php

namespace App\Http\Requests\Admin\Advertisment;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'from'=>'required',
            'to'=>'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
          
        ];
    }
}

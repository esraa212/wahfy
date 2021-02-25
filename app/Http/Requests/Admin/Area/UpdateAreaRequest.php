<?php

namespace App\Http\Requests\Admin\Area;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateAreaRequest extends FormRequest
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
            'name' => 'required|unique:areas,name,'.$request->segment(3),
        
            'city_id' => "required|exists:cities,id"
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Area Name is required',
            'name.unique'=>' Area Name is existed',
        ];
    }
}

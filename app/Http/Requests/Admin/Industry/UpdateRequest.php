<?php

namespace App\Http\Requests\Admin\Industry;

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
            'name' => "required|unique:industries,name," . $request->segment(3),
        ];
    }
}

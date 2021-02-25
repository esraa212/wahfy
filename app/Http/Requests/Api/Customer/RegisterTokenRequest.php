<?php

namespace App\Http\Requests\Api\Customer;

use Illuminate\Foundation\Http\FormRequest;

class RegisterTokenRequest extends FormRequest
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
            'token'=>'required',
            'device_id'=>'required',
            'platform'=>'required|in:android,ios',
        ];
    }

    public function messages()
    {
        return [
            'token.required'=>'Token is required',
            'device_id.required'=>'Device ID is required',
            'platform.required'=>'Platform is required',
        ];
    }
}

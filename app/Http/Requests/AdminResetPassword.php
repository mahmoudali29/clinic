<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminResetPassword extends FormRequest
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
        $rules = array(
                    'password'              => 'required|confirmed|min:8',
                    'password_confirmation' => 'required',
            );
        return $rules;
    }

    public function messages()
    {
        return [
                'password.required'              => 'Password is required', 
                'password_confirmation.required' => 'Please repeat the password',
        ];
    }
}

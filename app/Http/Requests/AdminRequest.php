<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class AdminRequest extends FormRequest
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
        $rules = array();

        switch ($this->method()) {
            case 'POST':
            {
                $rules['name'] = 'required|max:255';
                $rules['email'] = 'required|unique:tbladmins';
                $rules['password'] = 'required|confirmed';
                $rules['password_confirmation'] = 'required';
                $rules['file'] = 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048';
            }
            case 'PUT':
            case 'PATCH':
            {
                $rules['name']  = 'required|max:255';
                $rules['email'] = 'required|unique:tbladmins,email,'.Request::segment(3);
                $rules['file']  = 'image|mimes:png,jpg,jpeg,gif,svg|max:2048';
            }
        }
        return $rules;
    }

    public function messages()
    {
        return [
                'name.required'        => 'Name is required',
                'email.required'       => 'Email is required',
                'email.unique'         => 'The email has already been taken.',
                'password.required'    => 'Password is required', 
                'password.confirmed'    => "Password don't match ", 
                'password_confirmation.required'   => 'Please, Confirm the password',
                'file.required'        => 'please, Upload the admin picture',
        ];
        
    }
}

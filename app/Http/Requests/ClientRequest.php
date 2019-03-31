<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
                'fldName'   => 'required',
                'fldURL'    => 'required',
                'file'      => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            );
        return $rules;
    }

    public function messages()
    {
        return [
                'fldName.required'     => 'Name is required',
                'fldURL.required'       => 'URL is required',
                'file.required'        => 'please, Upload the admin picture',
        ];
        
    }
}
